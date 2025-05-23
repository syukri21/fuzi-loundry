<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Washing extends CI_Controller {

	private $dataUser = array();

	public function __construct()
	{
		parent::__construct(); 
		$id = $this->session->userdata('id');
		if($id != '') {
			$data = $this->db->get_where('users', ['id' => $id])->result();
			foreach ($data as $val) {
				if($val->level != 'Washing') {
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
		$this->load->view('washing/dashboard',['user' => $this->dataUser]);
	}

	public function order()
	{
		$this->load->view('washing/order',['user' => $this->dataUser]);
	}

}

/* End of file C_Washing.php */
/* Location: ./application/controllers/C_Washing.php */