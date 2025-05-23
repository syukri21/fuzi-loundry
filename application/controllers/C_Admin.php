<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller {
	private $dataUser = array();

	public function __construct()
	{
		parent::__construct(); 
		$id = $this->session->userdata('id');
		if($id != '') {
			$data = $this->db->get_where('users', ['id' => $id])->result();
			foreach ($data as $val) {
				if($val->level != 'Admin') {
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
		$this->load->view('admin/dashboard',['user' => $this->dataUser]);
	}

	public function order()
	{
		$this->load->view('admin/order',['user' => $this->dataUser]);
	}

	public function regulerOrder()
	{
		$this->load->view('admin/transaksi/reguler_order',['user' => $this->dataUser]);
	}

	public function onlineOrder()
	{
		$this->load->view('admin/transaksi/online_order',['user' => $this->dataUser]);
	}
 
	public function membership()
	{
		$this->load->view('admin/membership',['user' => $this->dataUser]);
	}
 
	public function komisiKurir()
	{
		$this->load->view('admin/komisi_kurir',['user' => $this->dataUser]);
	}
 
	public function komisiWashing()
	{
		$this->load->view('admin/komisi_washing',['user' => $this->dataUser]);
	}

	public function kinerjaPegawai()
	{
		$this->load->view('admin/kinerja_pegawai',['user' => $this->dataUser]);
	}

	public function outlet()
	{
		$this->load->view('admin/master_data/outlet',['user' => $this->dataUser]);
	}

	public function pelanggan()
	{
		$this->load->view('admin/master_data/pelanggan',['user' => $this->dataUser]);
	}

	public function paketLaundry()
	{
		$this->load->view('admin/master_data/paket_laundry',['user' => $this->dataUser]);
	}

	public function karyawan()
	{
		$this->load->view('admin/master_data/karyawan',['user' => $this->dataUser]);
	}

	public function laporanOrder()
	{
		$this->load->view('admin/laporan/order',['user' => $this->dataUser]);
	}

	public function laporanMembership()
	{
		$this->load->view('admin/laporan/membership',['user' => $this->dataUser]);
	}

	public function laporanPendapatan()
	{
		$this->load->view('admin/laporan/pendapatan',['user' => $this->dataUser]);
	}

	public function undangTeman()
	{
		$this->load->view('admin/undang_teman',['user' => $this->dataUser]);
	} 

	public function aturPaketReguler()
	{
		$this->load->view('admin/atur_paket_reguler',['user' => $this->dataUser]);
	} 

	public function loadKomisiKurir()
	{
		$data = $this->db->get('v_komisi_kurir')->result();
		echo json_encode($data);
	}

	public function loadKomisiWashing()
	{ 
		$data = $this->db->get('v_komisi_washing')->result();
		echo json_encode($data);
	}

	public function aksiPaketReguler()
	{
		$aksi = $this->input->post('aksi');
		$id = $this->input->post('id_paket');
		$nama_paket = $this->input->post('nama_paket');
		$harga_paket = $this->input->post('harga_paket');
		
		$data = array(
			'nama_paket' => $nama_paket,
			'harga_paket' => $harga_paket,
		);

		if($aksi == 'tambah') {
			if($this->db->insert('paket_reguler',$data)) {
				echo json_encode(['status' => true, 'aksi' => 'tambah']);
			} else {
				echo json_encode(['status' => false]);
			}
		} else if($aksi == 'edit') {
			$this->db->where('id',$id);
			if($this->db->update('paket_reguler',$data)) {
				echo json_encode(['status' => true, 'aksi' => 'edit']);
			} else {
				echo json_encode(['status' => false]);
			}
		} else {
			echo json_encode(['status' => false]);
		}
	}

	public function hapusPaketReguler()
	{ 
		$id = $this->input->post('id_paket');  

		$this->db->where('id',$id);
		if($this->db->delete('paket_reguler')) { 
			echo json_encode(['status' => true]); 
		} else {
			echo json_encode(['status' => false]);
		}
	}

}

/* End of file C_Admin.php */
/* Location: ./application/controllers/C_Admin.php */