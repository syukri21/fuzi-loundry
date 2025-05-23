<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Kasir extends CI_Controller {

	private $dataUser = array();

	public function __construct()
	{
		parent::__construct(); 
		$id = $this->session->userdata('id');
		if($id != '') {
			$data = $this->db->get_where('users', ['id' => $id])->result();
			foreach ($data as $val) {
				if($val->level != 'Kasir') {
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
		$where = "WHERE status_order = 'penjemputan' AND DATE(tanggal_order) = '$tgl' ";
		$data['notif'] = $this->db->query('SELECT * FROM v_order '.$where);
		$data['user'] = $this->dataUser;
		$this->load->view('kasir/dashboard',$data);
	}

	public function order()
	{
		$id_kurir = $this->session->userdata('id');
		$tgl = date('Y-m-d');
		$where = "WHERE status_order = 'penjemputan' AND DATE(tanggal_order) = '$tgl' ";
		$data['notif'] = $this->db->query('SELECT * FROM v_order '.$where);
		$data['user'] = $this->dataUser;
		$this->load->view('kasir/order',$data);
	}

	public function onlineOrder()
	{
		$id_kurir = $this->session->userdata('id');
		$tgl = date('Y-m-d');
		$where = "WHERE status_order = 'penjemputan' AND DATE(tanggal_order) = '$tgl' ";
		$data['notif'] = $this->db->query('SELECT * FROM v_order '.$where);
		$data['user'] = $this->dataUser;
		$this->load->view('kasir/transaksi/online_order',$data);
	}

	public function regulerOrder()
	{
		$id_kurir = $this->session->userdata('id');
		$tgl = date('Y-m-d');
		$where = "WHERE status_order = 'penjemputan' AND DATE(tanggal_order) = '$tgl' ";
		$data['notif'] = $this->db->query('SELECT * FROM v_order '.$where);
		$data['user'] = $this->dataUser;
		$this->load->view('kasir/transaksi/reguler_order',$data);
	}

	public function membership()
	{
		$id_kurir = $this->session->userdata('id');
		$tgl = date('Y-m-d');
		$where = "WHERE status_order = 'penjemputan' AND DATE(tanggal_order) = '$tgl' ";
		$data['notif'] = $this->db->query('SELECT * FROM v_order '.$where);
		$data['user'] = $this->dataUser;
		$this->load->view('kasir/membership',$data);
	}

	public function lihatJadwal($id)
	{
		$id_kurir = $this->session->userdata('id');
		$tgl = date('Y-m-d');
		$where = "WHERE status_order = 'penjemputan' AND DATE(tanggal_order) = '$tgl' ";
		$data['notif'] = $this->db->query('SELECT * FROM v_order '.$where);
		$data['user'] = $this->dataUser;
		$data['id_membership'] = $id;
		$this->load->view('kasir/lihat_jadwal',$data);
	}

}

/* End of file C_Kasir.php */
/* Location: ./application/controllers/C_Kasir.php */