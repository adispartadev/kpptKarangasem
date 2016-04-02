<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 1:12
 */
class Permohonan_c extends CI_Controller
{
    /**
     * User login 
     */
    private $login_user = array();

    /**
     * Status poisisi awal permohonan ijin
     */
    private $start_status = 2;
    
    /**
     * Status posisi akhir permohonan ijin
     */
    private $end_status = 3;

    public function __construct(){
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('properties');
        $this->load->model('pengajuan');
        $this->load->helper('site');
        $index = 2; //frontoffice
        $this->properties->checkUserLogin($index);

        /**
         * Get the login user
         */
        $this->login_user = $this->session->userdata['pengguna'];
    }

    public function tampil_data(){
        

        $this->load->view('partials/head');
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar_kepalabagian');
        $this->load->view('kepalabagian/tampilPermohonan');
        $this->load->view('partials/foot');
    }

    public function lihat_data($token){

        $this->load->helper('site');
        $this->db->join('perusahaan', 'permohonan_ijin.id_perusahaan = perusahaan.id_perusahaan', 'left');
        $this->db->join('pemohon', 'permohonan_ijin.nik = pemohon.nik', 'left');
        $this->db->join('jenis_ijin', 'permohonan_ijin.id_jenis_ijin = jenis_ijin.id_jenis_ijin', 'left');
        $this->db->join('desa', 'pemohon.alamat_desa_id = desa.id_desa');
        $query = $this->db->get_where('permohonan_ijin', array('token' => $token));

        $data['permohonan_ijin'] = $query->row_array();
        $data['syarat'] = $this->properties->getSyaratTerpenuhi($data['permohonan_ijin']['id_permohonan_ijin']);

        if (sizeof($data['permohonan_ijin']) > 0){
            $this->pengajuan->resetNotifikasi($data['permohonan_ijin']['id_permohonan_ijin']);
           
            $this->load->view('partials/head');
            $this->load->view('partials/header');
            $this->load->view('partials/sidebar_kepalabagian');
            $this->load->view('kepalabagian/detailPermohonan', $data);
            $this->load->view('partials/foot');

        }
        else{
            $this->load->view('errors/404');
        }
    }  

    public function validasi_permohonan($token){
        $permohonan_ijin = $this->properties->permohonanIjin(null, $token);
        //update table permohonan_ijin
        $pe = array(
            'id_permohonan_ijin' => $permohonan_ijin['id_permohonan_ijin'],
            'posisi_permohonan_ijin' => $this->end_status,
            'catatan_to_kasi' => $this->input->post('catatan_to_kasi'),
            'progress' => 5
        );
        if ($this->pengajuan->Sdisposisi($pe)){
            $this->session->set_flashdata('item', array('message' => 'Permohonan ijin berhasil di validasi','class' => 'success'));
            redirect('kepalabagian/permohonan-ijin/lihat-data');
        }
    }

    public function tolak_permohonan($token){
        $permohonan_ijin = $this->properties->permohonanIjin(null, $token);
        //update table permohonan_ijin
        $pe = array(
            'id_permohonan_ijin' => $permohonan_ijin['id_permohonan_ijin'],
            'posisi_permohonan_ijin' => 1
        );
        $this->pengajuan->SpermohonanIjin($pe);

        // notif table
        $no = array(
            'id_permohonan_ijin' => $permohonan_ijin['id_permohonan_ijin'],
            'isi' => 2,
            'id_jabatan_asal' => 2,
            'id_jabatan_tujuan' => 1,
            'dibaca' => 0,
            'waktu' => date('Y-m-d h:i:s')
        );
        
        if ($this->pengajuan->Pemberitahuan($no)){
            $this->session->set_flashdata('item', array('message' => 'Permohonan ijin berhasil ditolak dan di kembalikan ke frontoffice','class' => 'success'));
            redirect('kepalabagian/permohonan-ijin/lihat-data');
        }
    }
}