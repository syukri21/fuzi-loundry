<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Home extends CI_Controller {

	public function index()
	{
		$this->load->view('home', []);
	}

	public function getOrderById($id)
	{
		$this->db->where('order_id', $id);
		$data = $this->db->get('v_order')->result();
		echo json_encode($data);
	}

	public function print()
	{
		$this->load->view('admin/print');
	}

	public function getDataPaketById($id)
	{
		$data = $this->db->get_where('paket_reguler', ['id' => $id])->result();
		echo json_encode($data);
	}

}

/* End of file C_Home.php */
/* Location: ./application/controllers/C_Home.php */
