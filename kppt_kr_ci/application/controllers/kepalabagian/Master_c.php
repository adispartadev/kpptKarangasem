<?php
/**
 * Created by PhpStorm.
 * User: Spartan
 * Date: 3/5/2016
 * Time: 2:13 PM
 */

/**
 * Class Master_c
 * Universal controller for kepalabagian
 */
class Master_c extends CI_Controller{
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('properties');
	    $index = 2; //kepala bagian
	    $this->properties->checkUserLogin($index);
	}

	public function index(){
		$this->load->view('partials/head');
		$this->load->view('partials/header');
		$this->load->view('partials/sidebar_kepalabagian');
		$this->load->view('kepalabagian/dashboard');
		$this->load->view('partials/foot');
	}
}