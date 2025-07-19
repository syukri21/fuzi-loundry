<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class C_Order extends CI_Controller {

	private $serverKeySandbox = 'SB-Mid-server-c-qd_jjdocggL7_3tGUhdvwy';

	public function __construct()
	{
		parent::__construct(); 
		$id = $this->session->userdata('id');
		if($id != '') {
			$this->options = array(
			    'cluster' => 'ap1',
			    'useTLS' => true
			);

			$data = $this->db->get_where('users', ['id' => $id])->result();
			foreach ($data as $val) {  
				$pelanggan = $this->db->get_where('pelanggan', ['id' => preg_replace("/p/","", $val->id_karyawan)])->result();
				foreach ($pelanggan as $valpel) {
					$this->dataUser = array(
						'nama_lengkap' => $val->nama_lengkap,
						'email' => $val->email,
						'level' => $val->level,
						'alamat' => $valpel->alamat,
						'lokasi' => $valpel->lokasi,
						'no_wa' => $valpel->no_wa,
						'id' => $valpel->id,
					); 
				}
			} 
		} else {
			redirect(base_url('login'),'refresh');
		}
	}

	public function getAll()
	{
		$data = $this->db->get('v_order')->result();
		echo json_encode($data);
	}

	public function getOrderByPelanggan($id)
	{
		$this->db->where('id_pelanggan', $id);
		$data = $this->db->get('order')->result();
		echo json_encode($data);
	} 

	public function getOrderByStatus($status)
	{
		$where = array();
		if($status == 'pengembalian') {
			$where = "WHERE status_pembayaran = 'settlement' AND refund != ''";
		} else if($status == 'belum_bayar') {
			$where = "WHERE status_pembayaran = '$status' OR status_pembayaran = 'pending' OR status_pembayaran = 'expire' OR status_pembayaran = 'cancel' OR status_pembayaran = 'deny' ";
		} else if($status == 'kurir') {
			$id_kurir = $this->session->userdata('id');
			$where = "WHERE status_pembayaran = 'settlement' AND id_kurir = '$id_kurir' ";
		} else if($status == 'washing') {
			$id_washing = $this->session->userdata('id');
			$where = "WHERE status_pembayaran = 'settlement' AND id_washing = '$id_washing' ";
		} else {
			$where = "WHERE status_pembayaran = '$status' OR status_pembayaran = 'belum_bayar'";
		}

		$data = $this->db->query('SELECT * FROM v_order '.$where.' ORDER BY order_id DESC')->result(); 
		echo json_encode($data);
	}

	public function getOrderByStatusTransaksi($status,$transaksi)
	{
		$where = array();
		if($status == 'pengembalian') {
			$where = "WHERE status_pembayaran = 'settlement' AND refund != ''";
		} else if($status == 'belum_bayar') {
			$where = "WHERE kategori_order = '$transaksi' AND status_pembayaran = '$status' OR status_pembayaran = 'pending' OR status_pembayaran = 'expire' OR status_pembayaran = 'cancel' OR status_pembayaran = 'deny' ";
		} else if($status == 'kurir') {
			$id_kurir = $this->session->userdata('id');
			$where = "WHERE status_pembayaran = 'settlement' AND id_kurir = '$id_kurir' ";
		} else if($status == 'washing') {
			$id_washing = $this->session->userdata('id');
			$where = "WHERE status_pembayaran = 'settlement' AND id_washing = '$id_washing' ";
		} else {
			$where = "WHERE kategori_order = '$transaksi' AND status_pembayaran = '$status'";
		}

		$data = $this->db->query('SELECT * FROM v_order '.$where)->result(); 
		echo json_encode($data);
	}

	public function simpanHarga()
	{
		$data = array(
			'nama_laundry' => $this->input->post('nama_laundry'),
			'alamat_laundry' => $this->input->post('alamat_laundry'),
			'harga' => $this->input->post('harga'),
			'nama_pemilik' => $this->input->post('nama_pemilik'),
			'nama_bank' => $this->input->post('nama_bank'),
			'no_rekening' => $this->input->post('no_rekening'),
			'komisi_kurir_percent' => $this->input->post('komisi_kurir'),
			'komisi_washing_percent' => $this->input->post('komisi_washing'),
		);

		if(!empty($_FILES['file-0'])) {
			$config['upload_path']          = './assets/images/logo/';
			$config['file_name']          	= time();
			$config['allowed_types']        = 'jpg|png';
			// $config['max_size']             = 100;
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;
		 
			$this->load->library('upload', $config);
		 
			if ( ! $this->upload->do_upload('file-0')){
				$error = $this->upload->display_errors();
			}else{
				$data = $this->upload->data();

				$data = array(
					'nama_laundry' => $this->input->post('nama_laundry'),
					'alamat_laundry' => $this->input->post('alamat_laundry'),
					'harga' => $this->input->post('harga'),
					'nama_pemilik' => $this->input->post('nama_pemilik'),
					'nama_bank' => $this->input->post('nama_bank'),
					'no_rekening' => $this->input->post('no_rekening'),
					'komisi_kurir_percent' => $this->input->post('komisi_kurir'),
					'komisi_washing_percent' => $this->input->post('komisi_washing'),
					'logo' => $data['file_name']
				);
			}
		} 
		
		
		$this->db->where('id',$this->input->post('id'));
		if($this->db->update('order_setting', $data)) {
			echo json_encode(['status' => true]); 
		} else {
			echo json_encode(['status' => false]); 
		}

	}

	public function konfirmasiOrder()
	{
		$order_id = $this->input->post('order_id');
		$status = $this->input->post('status');
		$this->db->where('order_id',$order_id);
		if($this->db->update('order', array('status_pembayaran' => $status))) {
			echo json_encode(['status' => true]); 
		} else {
			echo json_encode(['status' => false]); 
		}

	}

	public function persetujuanOrder()
	{
		$order_id = $this->input->post('order_id');
		$persetujuan = $this->input->post('persetujuan');
		if($persetujuan == 'tolak') {
			$this->db->where('order_id',$order_id);
			if($this->db->update('order', array('refund' => 'tolak'))) {
				echo json_encode(['status' => true]); 
			} else {
				echo json_encode(['status' => false]); 
			}
		} else if($persetujuan == 'setuju') {

			/* Endpoint */
	        $url = 'https://api.sandbox.midtrans.com/v2/'.$order_id.'/refund';
	   
	        /* eCurl */
	        $curl = curl_init($url);
	   
	        /* Data */
	        $data = array(
	        	"refund_key" => time(),
				"amount" => $this->input->post('total_harga'),
				"reason" => $this->input->post('alasan')
	        );
	   
	        /* Set JSON data to POST */
	        curl_setopt($curl, CURLOPT_POSTFIELDS, array('refund_key: '.time(),'amount: '.$this->input->post('total_harga'), 'reason: '.$this->input->post('alasan')));
	            
	        /* Define content type */
	        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Accept: application/json', 'Authorization: Basic '.base64_encode($this->serverKeySandbox)));
	            
	        /* Return json */
	        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	            
	        /* make request */
	        $result = curl_exec($curl);
	             
	        /* close curl */
	        curl_close($curl);

			$this->db->where('order_id',$order_id);
			if($this->db->update('order', array('refund' => 'setuju'))) {
				echo json_encode(['status' => true, 'res' => $result]); 
			} else {
				echo json_encode(['status' => false]); 
			}
		} else {

		} 

	}

	public function persetujuanRefundOrder()
	{
		$order_id = $this->input->post('order_id');
		$alasan_refund = $this->input->post('alasan_refund');
		$this->db->where('order_id',$order_id);
		if($this->db->update('order', array('alasan_refund' => $alasan_refund, 'refund' => 'persetujuan'))) {
			echo json_encode(['status' => true]); 
		} else {
			echo json_encode(['status' => false]); 
		}
	}

	public function cancelOrder()
	{
		$order_id = $this->input->post('order_id'); 


		/* Endpoint */
        $url = 'https://api.sandbox.midtrans.com/v2/'.$order_id.'/cancel';
   
        /* eCurl */
        $curl = curl_init($url);
   
        /* Data */
        $data = array();
   
        /* Set JSON data to POST */
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            
        /* Define content type */
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Accept: application/json', 'Authorization: Basic '.base64_encode($this->serverKeySandbox)));
            
        /* Return json */
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            
        /* make request */
        $result = curl_exec($curl);
             
        /* close curl */
        curl_close($curl);


		$this->db->where('order_id',$order_id);
		if($this->db->update('order', array('status_pembayaran' => 'cancel'))) {
			echo json_encode(['status' => true, 'res' => $result]); 
		} else {
			echo json_encode(['status' => false]); 
		}

	}

	public function tambahOrder()
	{
		$berat = $this->input->post('berat');
		$harga = $this->input->post('harga');
		$t_harga = $this->input->post('t_harga');
		$id_pelanggan = $this->input->post('id_pelanggan');
		$order_id = $id_pelanggan.time().rand(1,9); 

		$dataForm = array();
		if($this->input->post('from') == 'admin') {
			$dataForm = array(
				'berat' => $berat,
				'harga' => $harga,
				'total_harga' => $t_harga,
				'id_pelanggan' => $this->input->post('id_pelanggan'),
				'id_paket_reguler' => $this->input->post('paket'),
				'nama_paket_reguler' => $this->input->post('nama_paket'),
				'harga_paket_reguler' => $this->input->post('harga_paket'),
				'tanggal_order' => date('Y-m-d h:i:s'),
				'status_pembayaran' => 'belum_bayar',
				'kategori_order' => 'reguler',
				'status_order' => 'pending',
				// 'snap_token' => $snapToken,
				'order_id' => $order_id,
			);
		} else {
			$id_kupon = $this->input->post('kupon');
			$status_pembayaran = '';
			if($id_kupon != '') {
				$status_pembayaran = 'settlement';
			} else {
				$status_pembayaran = 'belum_bayar';
			}

			$this->db->where('id', $id_kupon);
			$this->db->update('kupon',['status' => 'sudah_dipakai']);

			$dataForm = array(
				'berat' => $berat,
				'harga' => $harga,
				'total_harga' => $t_harga,
				'id_pelanggan' => $id_pelanggan,
				'tanggal_order' => date('Y-m-d h:i:s'),
				'status_pembayaran' => $status_pembayaran,
				'nama_paket_reguler' => $this->input->post('nama_paket'),
				'harga_paket_reguler' => $this->input->post('harga_paket'),
				'kategori_order' => 'online',
				'status_order' => 'pending',
				// 'snap_token' => $snapToken,
				'order_id' => $order_id,
			);
		}

		if($this->db->insert('order', $dataForm)) {
			echo json_encode(['status' => true]);
		} else {
			echo json_encode(['status' => false]);
		}
	}

	public function editOrder()
	{
		$berat = $this->input->post('berat');
		$harga = $this->input->post('harga');
		$t_harga = $this->input->post('t_harga');
		$id_pelanggan = $this->input->post('id_pelanggan'); 

		$dataForm = array(
			'berat' => $berat,
			'harga' => $harga,
			'total_harga' => $t_harga,
			'id_pelanggan' => $this->input->post('id_pelanggan'),
			'id_paket_reguler' => $this->input->post('paket'),
			'nama_paket_reguler' => $this->input->post('nama_paket'),
			'harga_paket_reguler' => $this->input->post('harga_paket'),
		); 


		$this->db->where('id', $this->input->post('id'));
		if($this->db->update('order', $dataForm)) {
			echo json_encode(['status' => true]);
		} else {
			echo json_encode(['status' => false]);
		}
	}

	public function hapusOrder()
	{
		$this->db->where('order_id',$this->input->post('order_id'));
		if($this->db->delete('order')) {
			echo json_encode(['status' => true]);
		} else {
			echo json_encode(['status' => false]);
		}
	}

	public function bayarOrder()
	{
		$this->db->where('order_id',$this->input->post('order_id'));
		if($this->db->update('order', ['status_pembayaran' => 'settlement'])) {
			echo json_encode(['status' => true]);
		} else {
			echo json_encode(['status' => false]);
		}
	}

	public function penjemputanOrder()
	{
		$this->db->where('order_id',$this->input->post('order_id'));
		if($this->db->update('order', ['status_order' => 'penjemputan', 'id_kurir' => $this->input->post('id_kurir')])) {
			$dataSetting = $this->db->get('order_setting')->result();
			$setting = null;
			foreach ($dataSetting as $valSetting) {
				$setting = $valSetting;			
			}

			$this->db->where('order_id',$this->input->post('order_id'));
			$dataOrder = $this->db->get('v_order')->result();
			$order = null;
			foreach ($dataOrder as $value) {
				$order = $value;				
			}


			$cek = $this->db->get_where('komisi_kurir', ['id_kurir' => $this->input->post('id_kurir')]);

			if($cek->num_rows() > 0) {
				$komisi = 0;
				foreach ($cek->result() as $vCek) {
					$komisi = $vCek->komisi + $setting->komisi_kurir_percent;
				}

				$update = [
					'id_kurir' => $this->input->post('id_kurir'),
					'order_id' => $this->input->post('order_id'),
					'komisi' => $komisi
				];

				$this->db->where('id_kurir', $this->input->post('id_kurir'));
				
				if($this->db->update('komisi_kurir', $update)) {
					echo json_encode(['status' => true]);
				} else {
					echo json_encode(['status' => false]);
				}
			} else {
				$komisi = $setting->komisi_kurir_percent;
				$dataInsert = [
					'id_kurir' => $this->input->post('id_kurir'),
					'order_id' => $this->input->post('order_id'),
					'komisi' => $komisi
				];
				
				if($this->db->insert('komisi_kurir', $dataInsert)) {
					echo json_encode(['status' => true]);
				} else {
					echo json_encode(['status' => false]);
				}
			}



		} else {
			echo json_encode(['status' => false]);
		}
	}

	public function pencucianOrder()
	{
		$this->db->where('order_id',$this->input->post('order_id'));
		if($this->db->update('order', ['status_order' => 'pencucian', 'id_washing' => $this->input->post('id_pencuci')])) {

			$dataSetting = $this->db->get('order_setting')->result();
			$setting = null;
			foreach ($dataSetting as $valSetting) {
				$setting = $valSetting;			
			}

			$this->db->where('order_id',$this->input->post('order_id'));
			$dataOrder = $this->db->get('v_order')->result();
			$order = null;
			foreach ($dataOrder as $value) {
				$order = $value;				
			}

			$cek = $this->db->get_where('komisi_washing', ['id_washing' => $this->input->post('id_pencuci')]);

			$komisiBaru = ($setting->komisi_washing_percent / 100) * ($order->berat * $order->harga);

			if($cek->num_rows() > 0) {
				$komisi = 0;
				foreach ($cek->result() as $vCek) {
					$komisi = $vCek->komisi + $komisiBaru;
				}

				$update = [
					'id_washing' => $this->input->post('id_pencuci'),
					'order_id' => $this->input->post('order_id'),
					'komisi' => $komisi
				];

				$this->db->where('id_washing', $this->input->post('id_pencuci'));
				
				if($this->db->update('komisi_washing', $update)) {
					echo json_encode(['status' => true]);
				} else {
					echo json_encode(['status' => false]);
				}
			} else {
				$komisi = $komisiBaru;
				$dataInsert = [
					'id_washing' => $this->input->post('id_pencuci'),
					'order_id' => $this->input->post('order_id'),
					'komisi' => $komisi
				];
				
				if($this->db->insert('komisi_washing', $dataInsert)) {
					echo json_encode(['status' => true]);
				} else {
					echo json_encode(['status' => false]);
				}
			}
		} else {
			echo json_encode(['status' => false]);
		}
	}

	public function selesaiCuciOrder()
	{
		$this->db->where('order_id',$this->input->post('order_id'));
		if($this->db->update('order', ['status_order' => 'selesai_cuci'])) {
			echo json_encode(['status' => true]);
		} else {
			echo json_encode(['status' => false]);
		}
	}

	public function pengantaranOrder()
	{
		$this->db->where('order_id',$this->input->post('order_id'));
		if($this->db->update('order', ['status_order' => 'pengantaran'])) {
			echo json_encode(['status' => true]);
		} else {
			echo json_encode(['status' => false]);
		}
	}

	public function selesaiPengantaranOrder()
	{
		$this->db->where('order_id',$this->input->post('order_id'));
		if($this->db->update('order', ['status_order' => 'selesai_pengantaran'])) {
			echo json_encode(['status' => true]);
		} else {
			echo json_encode(['status' => false]);
		}
	}

	public function getOrderByTanggal($status)
	{
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir'); 

		$this->db->where('status_pembayaran', $status);
		$this->db->where('tanggal_order >=', $tgl_awal);
		$this->db->where('tanggal_order <=', $tgl_akhir);
		$data = $this->db->get('v_order')->result();

		echo json_encode($data); 
	}

	public function getMembershipByTanggal($status)
	{
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir'); 
		$data = array();

		$this->db->where('status_pembayaran', $status);
		$this->db->where('tgl_beli >=', $tgl_awal);
		$this->db->where('tgl_beli <=', $tgl_akhir);

		if($status == 'sudah_bayar') {
			$data = $this->db->get('v_membership_kurir')->result();
		} else if($status == 'belum_bayar') {
			$data = $this->db->get('v_membership')->result();
		}
		
		echo json_encode($data); 
	}

	public function loadPendapatan()
	{
		$whereHari = [
			'Date(tanggal_order)' => date('Y-m-d'),
			'status_pembayaran' => 'settlement'
		];

		$whereBulan = [
			'MONTH(tanggal_order)' => date('m'),
			'status_pembayaran' => 'settlement'
		];
		
		$whereTahun = [
			'YEAR(tanggal_order)' => date('Y'),
			'status_pembayaran' => 'settlement'
		]; 
 
		$data['hari'] = $this->db->get_where('v_order', $whereHari)->result();
		$data['bulan'] = $this->db->get_where('v_order', $whereBulan)->result();
		$data['tahun'] = $this->db->get_where('v_order', $whereTahun)->result();
		echo json_encode($data);
	}

	public function loadKomisiKurir($id)
	{ 
		$data = $this->db->get_where('komisi_kurir', ['id_kurir' => $id])->result();
		echo json_encode($data);
	}

}

/* End of file C_Order.php */
/* Location: ./application/controllers/C_Order.php */
