<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Kurir extends CI_Controller {

	private $dataUser = array();

	public function __construct()
	{
		parent::__construct(); 
		$id = $this->session->userdata('id');
		if($id != '') {
			$data = $this->db->get_where('users', ['id' => $id])->result();
			foreach ($data as $val) {
				if($val->level != 'Kurir') {
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

	public function index()
	{
		$id_kurir = $this->session->userdata('id');
		$tgl = date('Y-m-d');
		$where = "WHERE status_pembayaran = 'settlement' AND id_kurir = '$id_kurir' AND DATE(tanggal_order) = '$tgl' ";
		$data['notif'] = $this->db->query('SELECT * FROM v_order '.$where);
		$data['user'] = $this->dataUser;
		$this->load->view('kurir/dashboard',$data);
	} 

	public function order()
	{
		$id_kurir = $this->session->userdata('id');
		$tgl = date('Y-m-d');
		$where = "WHERE status_pembayaran = 'settlement' AND id_kurir = '$id_kurir' AND DATE(tanggal_order) = '$tgl' ";
		$data['notif'] = $this->db->query('SELECT * FROM v_order '.$where);
		$data['user'] = $this->dataUser;
		$this->load->view('kurir/order',$data);
	} 

	public function membership()
	{
		$id_kurir = $this->session->userdata('id');
		$tgl = date('Y-m-d');
		$where = "WHERE status_pembayaran = 'settlement' AND id_kurir = '$id_kurir' AND DATE(tanggal_order) = '$tgl' ";
		$data['notif'] = $this->db->query('SELECT * FROM v_order '.$where);
		$data['user'] = $this->dataUser;
		$this->load->view('kurir/membership',$data);
	} 

	public function loadMembershipPembayaranKurir()
	{ 
		$where = array('status_pembayaran' => 'sudah_bayar', 'id_kurir' => $this->session->userdata('id'));
		$data = $this->db->get_where('v_membership_kurir',$where)->result(); 

		echo json_encode($data);
	}

}

/* End of file C_Kurir.php */
/* Location: ./application/controllers/C_Kurir.php */