<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class C_Master extends CI_Controller {

	private $options = null;
	private $pusher = null;

	public function __construct()
	{
		parent::__construct();
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
	}

	public function getUsers($level)
	{
		$data = $this->db->query("SELECT * FROM users WHERE level = '$level' ")->result();
		echo json_encode($data);
	}

	public function get($table)
	{
		$data = $this->db->get($table)->result();
		echo json_encode($data);
	}

	public function getById($table,$id)
	{
		$data = $this->db->get_where($table,['id' => $id])->result();
		echo json_encode($data);
	}

	public function loadKinerjaKurir()
	{
		$data = $this->db->query("SELECT * FROM users WHERE level = 'Kurir' ")->result(); 
		$result = array();
		foreach ($data as $val) {
			$id = $val->id;
			$jumlah = $this->db->get_where('order',['id_kurir' => $id])->num_rows();
			array_push($result, array(
				'id' => $val->id,
				'email' => $val->email,
				'nama_lengkap' => $val->nama_lengkap,
				'jumlah' => $jumlah,
			));
		}

		echo json_encode($result);
	}

	public function loadKinerjaWashing()
	{
		$data = $this->db->query("SELECT * FROM users WHERE level = 'Washing' ")->result(); 
		$result = array();
		foreach ($data as $val) {
			$id = $val->id;
			$jumlah = $this->db->get_where('order',['id_washing' => $id])->num_rows();
			array_push($result, array(
				'id' => $val->id,
				'email' => $val->email,
				'nama_lengkap' => $val->nama_lengkap,
				'jumlah' => $jumlah,
			));
		}

		echo json_encode($result);
	}

	public function insert($table)
	{
		$formData = array();
		$pSubscribe = null;
		if($table == 'outlet') {
			$pSubscribe = 'admin-outlet';
			$formData = array(
				'nama_outlet' => $this->input->post('nama_outlet'),
				'kontak' => $this->input->post('kontak'),
				'alamat' => $this->input->post('alamat'),
			);
		} else if($table == 'pelanggan') {
			$pSubscribe = 'admin-pelanggan';
			$formData = array(
				'nama_pelanggan' => $this->input->post('nama_pelanggan'),
				'no_wa' => $this->input->post('no_wa'),
				'alamat' => $this->input->post('alamat'),
				'lokasi' => $this->input->post('lokasi'),
				'email' => $this->input->post('email'),  
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),  
			);
		} else if($table == 'paket_laundry') {
			$pSubscribe = 'admin-paket-laundry';
			$formData = array(
				'nama_paket' => $this->input->post('nama_paket'),
				'harga_paket' => $this->input->post('harga_paket'),
				'durasi' => $this->input->post('durasi'), 
				'pengambilan' => $this->input->post('pengambilan'), 
				'keterangan_paket' => $this->input->post('keterangan_paket'), 
			);
		}  else if($table == 'karyawan') {
			$pSubscribe = 'admin-karyawan';
			$formData = array(
				'nama_karyawan' => $this->input->post('nama_karyawan'),
				'kontak' => $this->input->post('kontak'),
				'alamat' => $this->input->post('alamat'), 
				'kategori' => $this->input->post('kategori'),  
				'email' => $this->input->post('email'),  
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),  
			); 
		} 

		if($this->db->insert($table,$formData)) {
			if($table == 'karyawan') {
				$users = array(
					'nama_lengkap' => $formData['nama_karyawan'], 
					'level' => $formData['kategori'], 
					'email' => $formData['email'], 
					'password' => $formData['password'], 
					'id_karyawan' => $this->db->insert_id()
				);

				$this->db->insert('users', $users);
			} else if($table == 'pelanggan') {
				$users = array(
					'nama_lengkap' => $formData['nama_pelanggan'], 
					'level' => 'Pelanggan', 
					'email' => $formData['email'], 
					'password' => $formData['password'], 
					'id_karyawan' => 'p'.$this->db->insert_id()
				);

				$this->db->insert('users', $users);

				$id_pengundang = $this->input->get('u');
				if($id_pengundang != '') {
					$dataUndang = [
						'id_pengundang' => $id_pengundang,
						'id_pendaftar' => $this->db->insert_id(),
						'tgl_bergabung' => date('Y-m-d h:i:s')
					];
					$this->pusher->trigger('pelanggan-undang-teman', 'load-data', ['status' => true]);
					$this->db->insert('undang_teman', $dataUndang);
				}
			}

			echo json_encode(['status' => true]);
			$this->pusher->trigger($pSubscribe, 'load-data', ['status' => true]);
		} else {
			echo json_encode(['status' => false]);
		}
	}

	public function update($table)
	{
		$formData = array();
		$where = array();
		if($table == 'outlet') {
			$pSubscribe = 'admin-outlet';
			$where = array('id' => $this->input->post('id'));
			$formData = array(
				'nama_outlet' => $this->input->post('nama_outlet'),
				'kontak' => $this->input->post('kontak'),
				'alamat' => $this->input->post('alamat'),
			);
		} else if($table == 'pelanggan') {
			$pSubscribe = 'admin-pelanggan';
			$where = array('id' => $this->input->post('id')); 
			$formData = array(
				'nama_pelanggan' => $this->input->post('nama_pelanggan'),
				'no_wa' => $this->input->post('no_wa'),
				'alamat' => $this->input->post('alamat'),
				'lokasi' => $this->input->post('lokasi'),
				'email' => $this->input->post('email'), 
			);

			$users = array(
				'nama_lengkap' => $this->input->post('nama_pelanggan'), 
				'level' => 'Pelanggan', 
				'email' => $this->input->post('email'), 
			); 

			if($this->input->post('password') != '') {
				$formData = array(
					'nama_pelanggan' => $this->input->post('nama_pelanggan'),
					'no_wa' => $this->input->post('no_wa'),
					'alamat' => $this->input->post('alamat'),
					'lokasi' => $this->input->post('lokasi'),
					'email' => $this->input->post('email'), 
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), 
				);

				$users = array(
					'nama_lengkap' => $this->input->post('nama_pelanggan'), 
					'level' => 'Pelanggan', 
					'email' => $this->input->post('email'), 
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), 
				); 
			}   

			$this->db->where('id_karyawan', 'p'.$this->input->post('id'));
			$this->db->update('users', $users);    

		} else if($table == 'paket_laundry') {
			$pSubscribe = 'admin-paket-laundry';
			$where = array('id' => $this->input->post('id'));
			$formData = array(
				'nama_paket' => $this->input->post('nama_paket'),
				'harga_paket' => $this->input->post('harga_paket'),
				'durasi' => $this->input->post('durasi'), 
				'pengambilan' => $this->input->post('pengambilan'), 
				'keterangan_paket' => $this->input->post('keterangan_paket'), 
			);
		}  else if($table == 'karyawan') {
			$pSubscribe = 'admin-karyawan';
			$where = array('id' => $this->input->post('id')); 
			$formData = array(
				'nama_karyawan' => $this->input->post('nama_karyawan'),
				'kontak' => $this->input->post('kontak'),
				'alamat' => $this->input->post('alamat'), 
				'kategori' => $this->input->post('kategori'), 
				'email' => $this->input->post('email'), 
			);

			$users = array(
				'nama_lengkap' => $this->input->post('nama_karyawan'), 
				'level' => $this->input->post('kategori'), 
				'email' => $this->input->post('email'), 
			); 

			if($this->input->post('password') != '') {
				$formData = array(
					'nama_karyawan' => $this->input->post('nama_karyawan'),
					'kontak' => $this->input->post('kontak'),
					'alamat' => $this->input->post('alamat'), 
					'kategori' => $this->input->post('kategori'), 
					'email' => $this->input->post('email'), 
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), 
				);

				$users = array(
					'nama_lengkap' => $this->input->post('nama_karyawan'), 
					'level' => $this->input->post('kategori'), 
					'email' => $this->input->post('email'), 
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), 
				); 
			}   

			$this->db->where('id_karyawan', $this->input->post('id'));
			$this->db->update('users', $users);  
		} 

		$this->db->where($where);
		if($this->db->update($table,$formData)) {
			echo json_encode(['status' => true]);
			$this->pusher->trigger($pSubscribe, 'load-data', ['status' => true]);
		} else {
			echo json_encode(['status' => false]);
		}
	}

	public function delete($table)
	{ 
		$where = array();
		if($table == 'outlet') {
			$pSubscribe = 'admin-outlet';
			$where = array('id' => $this->input->post('id')); 
		} else if($table == 'pelanggan') {
			$pSubscribe = 'admin-pelanggan';
			$where = array('id' => $this->input->post('id')); 

			$this->db->where('id_karyawan','p'.$this->input->post('id'));
			$this->db->delete('users');
		} else if($table == 'paket_laundry') {
			$pSubscribe = 'admin-paket-laundry';
			$where = array('id' => $this->input->post('id')); 
		} else if($table == 'karyawan') {
			$pSubscribe = 'admin-karyawan';
			$where = array('id' => $this->input->post('id')); 

			$this->db->where('id_karyawan',$this->input->post('id'));
			$this->db->delete('users');
		}

		$this->db->where($where);
		if($this->db->delete($table)) {
			echo json_encode(['status' => true]);
			$this->pusher->trigger($pSubscribe, 'load-data', ['status' => true]);
		} else {
			echo json_encode(['status' => false]);
		}
	}

	public function loadMembershipPembayaran($status)
	{ 
		$where = array('status_pembayaran' => $status);
		$data = null;
		if($status == 'belum_bayar') {
			$data = $this->db->get_where('v_membership',$where)->result();
		} else if($status == 'sudah_bayar') {
			$data = $this->db->get_where('v_membership_kurir',$where)->result();
		} else {
			$data = null;
		}

		echo json_encode($data);
	}

	public function sudahBayarMembership()
	{
		$id = $this->input->post('id');
		$id_kurir = $this->input->post('id_kurir');
		$dataUpdate = [
			'id_kurir' => $id_kurir,
			'status_paket' => 'aktif',
			'status_pembayaran' => 'sudah_bayar',
			'tgl_aktif' => date('Y-m-d'),
		];
		$this->db->where('id', $id);
		if($this->db->update('membership',$dataUpdate)) {
			$this->pusher->trigger('admin-membership', 'load-data', ['status' => true]);
			$this->pusher->trigger('kasir-membership', 'load-data', ['status' => true]);
			$this->pusher->trigger('kurir-membership', 'load-data', ['status' => true]);
			$this->pusher->trigger('pelanggan-membership', 'load-data', ['status' => true]);
			echo json_encode(['status' => true]);
		} else {
			echo json_encode(['status' => false]);
		}
	}

	public function getAllUndangTeman()
	{
		$this->db->distinct();

		$this->db->select('id_pengundang, nama_lengkap_pengundang');
		$data = $this->db->get("v_undang_teman")->result();
		$result = [];
		foreach ($data as $key => $value) {
			$jumlah = $this->db->get_where('v_undang_teman', ['id_pengundang' => $value->id_pengundang])->num_rows();
			array_push($result, [
				'nama_lengkap_pengundang' => $value->nama_lengkap_pengundang,
				'jumlah' => $jumlah,
			]);
		}

		echo json_encode($result);
	}

	public function getMembershipById($id)
	{
		$this->db->where('id', $id);
		$data = $this->db->get('v_membership')->result();
		echo json_encode($data);
	}

}

/* End of file C_Master.php */
/* Location: ./application/controllers/C_Master.php */