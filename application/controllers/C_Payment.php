<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Payment extends CI_Controller {
	private $dataUser = array();
	private $serverKeyProduction = 'Mid-server-xEBvhzRy1KoDBDWmAYhymaQM';
	private $clientKeyProduction = 'Mid-client-iQTH6lhygeEb4gOn';
	private $serverKeySandbox = 'SB-Mid-server-c-qd_jjdocggL7_3tGUhdvwy';
	private $clientKeySandbox = 'SB-Mid-client-hCnc-G7Vc8crGNVH';
	private $options = null;
	private $pusher = null;

	public function __construct()
	{
		parent::__construct(); 
		$id = $this->session->userdata('id');
		if($id != '') {
			$this->options = array(
			    'cluster' => 'ap1',
			    'useTLS' => true
			);

			$this->pusher = new Pusher\Pusher(
			    '93cd4823970b1fb2ec93',
			    'ffdf3e561c3e2ac97512',
			    '1242350',
			    $this->options
			);

			$data = $this->db->get_where('users', ['id' => $id])->result();
			foreach ($data as $val) {
				if($val->level != 'Pelanggan') {
					redirect(base_url('login'),'refresh');
				}

				$this->dataUser = array(
					'nama_lengkap' => $val->nama_lengkap,
					'email' => $val->email,
					'level' => $val->level,
				);
			}
		} else {
			redirect(base_url('login'),'refresh');
		}
	}

	public function getSnap()
	{ 
		// Set your Merchant Server Key
		\Midtrans\Config::$serverKey = $this->serverKeySandbox;
		// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
		\Midtrans\Config::$isProduction = false;
		// Set sanitization on (default)
		\Midtrans\Config::$isSanitized = true;
		// Set 3DS transaction for credit card to true
		\Midtrans\Config::$is3ds = true;
		 
		$params = array(
		    'transaction_details' => array(
		        'order_id' => time(),
		        'gross_amount' => 1,
		    ),
		    'customer_details' => array(
		        'first_name' => 'Yoga Adi',
		        'last_name' => '',
		        'email' => 'mystorage17042002@gmail.com',
		        'phone' => '08111222333',
		    ),
		);
		 
		$snapToken = \Midtrans\Snap::getSnapToken($params);
		echo json_encode(['snapToken' => $snapToken]);
	}

	public function getStatus($order_id)
	{
		$url = "https://api.sandbox.midtrans.com/v2/".$order_id."/status";

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$headers = array(
		   "Accept: application/json",
		   "Content-Type: application/json",
		   "Authorization: Basic ".base64_encode($this->serverKeySandbox)

		);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		//for debug only!
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		curl_close($curl);
		echo $resp;

	}

	public function paymentAction()
	{
		$order_id = $this->input->get('order_id');
		$transaction_status = $this->input->get('transaction_status');

		$cek = $this->db->get_where('order', ['order_id' => $order_id]);
		if($cek->num_rows() > 0) {
			$cek = $this->db->get_where('order', ['order_id' => $order_id]);
			foreach ($cek->result() as $val) {
				$this->db->where('id',$val->id);
				$this->db->update('order', ['status_pembayaran' => $transaction_status]);
				$this->pusher->trigger('admin-order', 'load-data', ['status' => true]);
				redirect(base_url('pelanggan-order'),'refresh');
			}
		} else {
			$this->session->set_flashdata('status', 'error_cek');	
			redirect(base_url('pelanggan-order'),'refresh');
		}
	}

	public function ubahStatusPembayaran($order_id)
	{
		$this->db->where('order_id', $order_id);
		$this->db->update('order', ['status_pembayaran' => $this->input->post('status_pembayaran')]);
		$this->pusher->trigger('admin-order', 'load-data', ['status' => true]);
		echo json_encode(['status' => true]);
	}

	public function batalkanPesanan()
	{
		$id = $this->input->post('id');
		$this->db->where('id',$id);
		if($this->db->delete('membership')) {
			$this->pusher->trigger('admin-membership', 'load-data', ['status' => true]);
			$this->pusher->trigger('kasir-membership', 'load-data', ['status' => true]);
			echo json_encode(['status' => true]);
		} else {
			echo json_encode(['status' => false]);
		}
	}

	public function nonaktifkanMembership($id)
	{ 
		$this->db->where('id',$id);
		if($this->db->update('membership', ['status_paket' => 'berakhir'])) {
			$this->pusher->trigger('admin-membership', 'load-data', ['status' => true]);
			$this->pusher->trigger('kasir-membership', 'load-data', ['status' => true]);
			$this->pusher->trigger('kurir-membership', 'load-data', ['status' => true]);
			echo json_encode(['status' => true]);
		} else {
			echo json_encode(['status' => false]);
		}
	}

}

/* End of file C_Payment.php */
/* Location: ./application/controllers/C_Payment.php */