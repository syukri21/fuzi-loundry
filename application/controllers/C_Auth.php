<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Auth extends CI_Controller {

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

		if($cek->num_rows() > 0) {

			foreach ($cek->result() as $key => $value) {
				if(password_verify($password, $value->password)) {
					$array = array(
						'id' => $value->id
					);
					
					$this->session->set_userdata( $array );
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
		redirect(base_url(),'refresh');
	}

}

/* End of file C_Auth.php */
/* Location: ./application/controllers/C_Auth.php */