<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class C_Pelanggan extends CI_Controller
{

	private $dataUser = array();
	private $options = null;

	public function __construct()
	{
		parent::__construct();
		$id = $this->session->userdata('id');
		if ($id != '') {
			$this->options = array(
				'cluster' => 'ap1',
				'useTLS' => true
			);

			$data = $this->db->get_where('users', ['id' => $id])->result();
			foreach ($data as $val) {
				if ($val->level != 'Pelanggan') {
					redirect(base_url('login'), 'refresh');
				}

				$pelanggan = $this->db->get_where('pelanggan', ['id' => preg_replace("/p/", "", $val->id_karyawan)])->result();
				foreach ($pelanggan as $valpel) {
					$this->dataUser = array(
						'nama_lengkap' => $val->nama_lengkap,
						'level' => $val->level,
						'alamat' => $valpel->alamat,
						'no_wa' => $valpel->no_wa,
						'id' => $valpel->id,
						'id_user' => $id,
					);
				}
			}
		} else {
			redirect(base_url('login'), 'refresh');
		}
	}

	public function index()
	{
		$data = $this->db->get('paket_laundry')->result();
		$this->load->view('pelanggan/dashboard', ['user' => $this->dataUser, 'paket' => $data]);
	}

	public function order()
	{
		$this->load->view('pelanggan/order', ['user' => $this->dataUser]);
	}

	public function profile()
	{
		$this->load->view('pelanggan/profile', ['user' => $this->dataUser]);
	}

	public function undangTeman()
	{
		$this->load->view('pelanggan/undang_teman', ['user' => $this->dataUser]);
	}

	public function updateProfile()
	{
		$id_user = $this->input->post('id_user');
		$id_pelanggan = $this->input->post('id_pelanggan');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$no_wa = $this->input->post('no_wa');
		$alamat = $this->input->post('alamat');
		$password = $this->input->post('password');

		$updateUser = array(
			'nama_lengkap' => $nama_lengkap,
		);

		$updatePelanggan = array(
			'nama_pelanggan' => $nama_lengkap,
			'no_wa' => $no_wa,
			'alamat' => $alamat,
		);

		if ($password != null) {
			$updateUser = array(
				'nama_lengkap' => $nama_lengkap,
				'password' => password_hash($password, PASSWORD_DEFAULT),
			);

			$updatePelanggan = array(
				'nama_pelanggan' => $nama_lengkap,
				'no_wa' => $no_wa,
				'alamat' => $alamat,
			);
		}

		$this->db->where('id', $id_user);
		if ($this->db->update('users', $updateUser)) {
			$this->db->where('id', $id_pelanggan);
			if ($this->db->update('pelanggan', $updatePelanggan)) {
				$this->session->set_flashdata('status', 'success');
			} else {
				$this->session->set_flashdata('status', 'error');
			}
		} else {
			$this->session->set_flashdata('status', 'error');
		}
		redirect(base_url('pelanggan-profile'), 'refresh');
	}

	public function pesanMembership()
	{
		$id_pelanggan = $this->input->post('id_pelanggan');
		$id_paket_laundry = $this->input->post("id_paket");

		$dataInsert = array(
			'id_paket_laundry' => $id_paket_laundry,
			'id_pelanggan' => $id_pelanggan,
			'status_paket' => '',
			'status_paket' => 'belum_aktif',
			'tgl_beli' => date('Y-m-d'),
			'status_pembayaran' => 'belum_bayar',
		);

		if ($this->db->insert('membership', $dataInsert)) {
			echo json_encode(['status' => true]);
		} else {
			echo json_encode(['status' => false]);
		}
	}

	public function getMembership()
	{
		$id = $this->dataUser['id'];
		$data = $this->db->query("SELECT * FROM v_membership WHERE id_pelanggan = '$id' AND status_paket != 'berakhir' ")->result();
		echo json_encode($data);
	}

	public function getUndangTeman($id)
	{
		$data = $this->db->query("SELECT * FROM v_undang_teman WHERE id_pengundang = '$id'")->result();
		echo json_encode($data);
	}

	public function masukKode()
	{
		$id_pengundang = $this->input->post('id_pengundang');
		$id_pendaftar = $this->input->post('id_pendaftar');

		$cek = $this->db->get_where('undang_teman', ['id_pendaftar' => $id_pendaftar]);
		if ($cek->num_rows() > 0) {
			echo json_encode(['status' => 'registered']);
		} else {
			$dataInsert = array(
				'id_pengundang' => $id_pengundang,
				'id_pendaftar' => $id_pendaftar,
				'tgl_bergabung' => date('Y-m-d h:i:s'),
			);
			if ($this->db->insert('undang_teman', $dataInsert)) {
				echo json_encode(['status' => 'success']);
			} else {
				echo json_encode(['status' => 'error']);
			}
		}
	}

	public function ambilKupon($id)
	{
		if ($this->db->insert('kupon', ['id_pelanggan' => $id, 'tgl_ambil' => date('Y-m-d h:i:s'), 'status' => 'belum_dipakai'])) {
			echo json_encode(['status' => true]);
		} else {
			echo json_encode(['status' => false]);
		}
	}

	public function getKupon($id)
	{
		$data = $this->db->get_where('kupon', ['id_pelanggan' => $id])->result();
		echo json_encode($data);
	}
}

/* End of file C_Pelanggan.php */
/* Location: ./application/controllers/C_Pelanggan.php */
