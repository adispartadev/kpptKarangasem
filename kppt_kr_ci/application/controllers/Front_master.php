<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 0:59
 */

/**
 * Class Front_master
 * Universal controller for all privilige
 */
class Front_master extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model('properties');
    }

    public function index(){
//        print_r($$this->session->userdata['pengguna']);
        if(!isset($this->session->userdata['pengguna'])){
            $this->session->set_flashdata('item', array('message' => 'Silahkan login untuk melanjutkan','class' => 'success'));
            redirect('login');
        }
        else{
            redirect($this->properties->halamanPengguna($this->session->userdata['pengguna']['id_jabatan']));
        }
    }

    public function login(){
        $this->load->view('partials/head');
        $this->load->view('login');
    }


    /**
     * Login action
     */
    public function login_action(){
        $this->load->model('user');
        $username = $this->input->post('username');
        $passwd = $this->input->post('passwd');

        $result = $this->user->login($username, $passwd);

        if ($result){

            $this->load->model('properties');
            $page = $this->properties->halamanPengguna($result[0]->id_jabatan);
            $sess_array = array();
            foreach($result as $row)
            {
                $sess_array = array(
                    'id' => $row->id_pengguna,
                    'username' => $row->username,
                    'id_jabatan' => $row->id_jabatan,
                    'NIP' => $row->NIP,
                    'nama' => $row->nama_lengkap
                );

                /**
                 * update last login user
                 */
                $this->user->update_login_time($row->id_pengguna);
                $this->session->set_userdata('pengguna', $sess_array);
            }
            // print_r($this->session->userdata['pengguna']);
            redirect($page);
        }
        else{
            $this->session->set_flashdata('item', array('message' => 'Maaf, kombinasi username dan password salah','class' => 'warning'));
            redirect('login');
        }
    }

    public function register(){
        $this->load->model('user');
        $this->user->register();
    }

    public function logout(){
        $sess_array = array();
        $this->session->unset_userdata('pengguna', $sess_array);
        $this->session->set_flashdata('item', array('message' => 'Anda berhasil logout, silahkan login untuk melanjutkan', 'class' => 'success'));
        redirect('login');
    }


    public function pengaturan_akun(){
        $index = 1;
        $this->properties->checkUserLogin($index);
        $data['user'] = $this->session->userdata['pengguna'];

        $this->load->view('partials/head');
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('universal/pengaturanProfil', $data);
        $this->load->view('partials/foot');
        
    }



    public function pengaturan_akun_submit(){
        $this->load->model('user');

        $user = $this->session->userdata['pengguna'];
        $password = md5($this->input->post('passwd'));

        if ($this->user->checkPassword($user['id'], $password)){
            
            
        }
        else{
            $this->session->set_flashdata('item', array('message' => 'Maaf, Password Salah', 'class' => 'warning'));
            redirect('pengaturan/akun');
        }

    }
}

