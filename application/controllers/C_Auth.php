<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Load PHPMailer
require_once FCPATH . 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once FCPATH . 'vendor/phpmailer/phpmailer/src/SMTP.php';
require_once FCPATH . 'vendor/phpmailer/phpmailer/src/Exception.php';



class C_Auth extends CI_Controller
{

	public function index()
	{
		$this->load->view('auth/login');
	}

	public function register()
	{
		$this->load->view('auth/register');
	}

	public function loginAct()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$cek = $this->db->get_where('users', ['email' => $email]);

		if ($cek->num_rows() > 0) {

			foreach ($cek->result() as $key => $value) {
				if (password_verify($password, $value->password)) {
					$array = array(
						'id' => $value->id
					);

					$this->session->set_userdata($array);
					echo json_encode(array('status' => true, 'level' => $value->level));
				} else {
					echo json_encode(array('status' => 'invalid_password'));
				}
			}
		} else {
			echo json_encode(array('status' => 'invalid_email'));
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}

	public function forgotPassword()
	{
		$this->load->view('auth/forgot_password');
	}

	public function resetPassword()
	{
		$email = $this->input->post('email');
		$validateCode = $this->input->post('validate_code');
		$password = $this->input->post('password');

		$cek = $this->db->get_where('users', ['email' => $email]);

		if ($cek->num_rows() > 0) {
			$isValid = $this->validateResetCode($email, $validateCode);
			if (!$isValid) {
				echo json_encode(array('status' => false, 'message' => 'Invalid or expired reset code.'));
				return;
			}
			// Hash the new password
			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
			// Update the user's password in the database
			// Assuming 'password' is the column name for storing user password_hash
			$this->db->where('email', $email);
			$this->db->update('users', [
				'password' => $hashedPassword,
				'reset_code' => null, // Clear reset code after successful reset
				'reset_code_expiry' => null // Clear expiry time
			]);

			echo json_encode(array('status' => true, 'message' => 'Reset password successfully.'));
		} else {
			echo json_encode(array('status' => false, 'message' => 'Email not found.'));
		}
	}


	public function sendResetPasswordEmail()
	{
		// Get email from POST request
		$email = $this->input->post('email');

		// Check if email exists in database before proceeding
		$user = $this->db->get_where('users', ['email' => $email])->row();
		if (!$user) {
			echo json_encode(['status' => false, 'message' => 'Email not found.']);
			return;
		}

		// Create a new PHPMailer instance
		$mail = new PHPMailer\PHPMailer\PHPMailer(true);

		try {
			// Configure SMTP settings
			$this->configureMailer($mail);

			// Set recipient
			$mail->setFrom(env("EMAIL_FROM_EMAIL"), 'Password Reset');
			$mail->addAddress($email);

			// Generate reset code and store in database
			$resetCode = $this->generateAndStoreResetCode($email);

			// Set email content
			$mail->isHTML(true);
			$mail->Subject = 'Password Reset Code';
			$mail->Body = $this->getHTMLEmailBody($resetCode);
			$mail->AltBody = $this->getPlainTextEmailBody($resetCode);

			// Send email
			$mail->send();

			echo json_encode(['status' => true, 'message' => 'Reset code sent to your email.']);
		} catch (Exception $e) {
			echo json_encode(['status' => false, 'message' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo]);
		}
	}

	/**
	 * Configure PHPMailer with SMTP settings
	 */
	private function configureMailer($mail)
	{
		$mail->SMTPDebug = 0;
		$mail->isSMTP();
		$mail->Host       = env("EMAIL_SMTP_HOST");
		$mail->SMTPAuth   = true;
		$mail->Username   = env("EMAIL_SMTP_USERNAME");
		$mail->Password   = env("EMAIL_SMTP_PASSWORD");
		$mail->SMTPSecure = 'tls';
		$mail->Port       = env("EMAIL_SMTP_PORT");
	}

	/**
	 * Generate and store reset code in database
	 * @return string The generated reset code
	 */
	private function generateAndStoreResetCode($email)
	{
		// Generate a 6-digit reset code
		$resetCode = sprintf("%06d", mt_rand(1, 999999));

		// Store in database with expiry time
		$this->db->where('email', $email);
		$this->db->update('users', [
			'reset_code' => $resetCode,
			'reset_code_expiry' => date('Y-m-d H:i:s', strtotime('+1 hour'))
		]);

		return $resetCode;
	}

	/**
	 * Validate reset code for the given email
	 * @return bool True if valid, false otherwise
	 */
	private function validateResetCode($email, $resetCode)
	{
		$this->db->where('email', $email);
		$this->db->where('reset_code', $resetCode);
		$this->db->where('reset_code_expiry >', date('Y-m-d H:i:s'));
		$query = $this->db->get('users');
		return $query->num_rows() > 0;
	}

	/**
	 * Get HTML email body with reset code
	 */
	private function getHTMLEmailBody($resetCode)
	{
		return '
		<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #e4e4e4; border-radius: 5px;">
			<h2 style="color: #333; text-align: center;">Password Reset</h2>
			<p style="color: #555;">Hello,</p>
			<p style="color: #555;">We received a request to reset your password. Please use the verification code below to complete the process:</p>
			<div style="background-color: #f7f7f7; padding: 15px; text-align: center; margin: 20px 0; border-radius: 4px;">
				<h1 style="letter-spacing: 5px; color: #4a6ee0; margin: 0;">' . $resetCode . '</h1>
			</div>
			<p style="color: #555;">If you did not request this password reset, please ignore this email.</p>
			<p style="color: #555;">Thank you,<br>Your Application Team</p>
		</div>';
	}

	/**
	 * Get plain text email body with reset code
	 */
	private function getPlainTextEmailBody($resetCode)
	{
		return 'Hello, We received a request to reset your password. Please use this verification code to complete the process: ' . $resetCode . '. If you did not request this password reset, please ignore this email. Thank you, Your Application Team';
	}
}

/* End of file C_Auth.php */
/* Location: ./application/controllers/C_Auth.php */
