<?php
/**
 * Created by PhpStorm.
 * User: Spartan
 * Date: 2/26/2016
 * Time: 11:38 AM
 */

/**
 * Class Master_c
 * Universal controller for frontoffice
 */
class Master_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('properties');
        $index = 1; //frontoffice
        $this->properties->checkUserLogin($index);
    }


    /**
     * Menampilkan halaman dashboard frontoffice
     */
    public function index(){
        $this->load->view('partials/head');
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('frontoffice/dashboard');
        $this->load->view('partials/foot');
    }

}