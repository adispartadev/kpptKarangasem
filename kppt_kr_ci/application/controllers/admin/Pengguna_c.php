<?php

class Pengguna_c extends CI_Controller{
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('properties');
	    $index = 4; //admin
	    $this->properties->checkUserLogin($index);
	}


	public function index(){

		$this->db->join('jabatan', 'jabatan.id_jabatan = pengguna.id_jabatan');
		$this->db->from('pengguna');
		$query = $this->db->get();
		$data['pengguna'] = $query->result_array();

		$this->load->view('partials/head');
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar_admin');
		$this->load->view('admin/daftarPengguna', $data);
		$this->load->view('partials/foot');
	}

	public function detail($id_pengguna){
		$this->db->join('jabatan', 'jabatan.id_jabatan = pengguna.id_jabatan');
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->from('pengguna');

		$query = $this->db->get();
		$data['pengguna'] = $query->row_array();

		$this->load->view('partials/head');
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar_admin');
		$this->load->view('admin/detailPengguna', $data);
		$this->load->view('partials/foot');
	}

	public function tambah(){

		$this->db->from('jabatan');
		$query = $this->db->get();
		$data['jabatan'] = $query->row_array();

		$this->load->view('partials/head');
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar_admin');
		$this->load->view('admin/addPengguna', $data);
		$this->load->view('partials/foot');

	}
}