<?php
/**
 * Created by PhpStorm.
 * User: Spartan
 * Date: 3/15/2016
 * Time: 10:19 PM
 */


class Ubah_permohonan_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('properties');
        $index = 1; //frontoffice
        $this->properties->checkUserLogin($index);
        $this->load->helper('site');
    }

    public function data_pemohon($token){
        $data['permohonan_ijin'] = $this->properties->permohonanIjin(null, $token);

        $this->db->where('nik', $data['permohonan_ijin']['nik']);
        $this->db->from('pemohon');
        $query = $this->db->get();
        $data['pemohon'] = $query->row_array();
        $data['desa'] = $this->properties->getDesa();

        $this->load->view('partials/head');
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('frontoffice/ubahPemohon', $data);
        $this->load->view('partials/foot');
    }


    public function submit_data_pemohon($token){
        $mo = array(
            'nama' => $this->input->post('nama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->properties->tanggalToDb($this->input->post('tanggal_lahir')),
            'alamat_jalan' => $this->input->post('alamat_jalan'),
            'alamat_dusun' => $this->input->post('alamat_dusun'),
            'alamat_desa_id' => $this->input->post('alamat_desa_id'),
            'agama' => $this->input->post('agama'),
            'no_telp' => $this->input->post('no_telp'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->db->where('nik', $this->input->post('nik'));
        if ($this->db->update('pemohon', $mo)){
            $this->session->set_flashdata('item', array('message' => 'Identitas pemohon berhasil diubah','class' => 'success'));
            redirect('frontoffice/permohonan-ijin/lihat-data/'. $token);
        }
    }

    public function data_perusahaan($token){
        $data['permohonan_ijin'] = $this->properties->permohonanIjin(null, $token);
        $this->db->where('id_perusahaan', $data['permohonan_ijin']['id_perusahaan']);
        $this->db->from('perusahaan');
        $query = $this->db->get();
        $data['perusahaan'] = $query->row_array();

        $this->load->view('partials/head');
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('frontoffice/ubahPerusahaan', $data);
        $this->load->view('partials/foot');   

    }


    public function submit_data_perusahaan($token){
        $this->session->set_flashdata('item', array('message' => 'Data perusahaan berhasil diubah','class' => 'success'));
        redirect('frontoffice/permohonan-ijin/lihat-data/'. $token);
    }


    public function data_syarat($token){
        $permohonan_ijin = $this->properties->permohonanIjin(null, $token);

        $data['syarat'] = $this->properties->lihatSyarat($permohonan_ijin['id_jenis_ijin']);

        $data['syaratTerpenuhi'] = $this->properties->lihatSyaratTerpenuhi($permohonan_ijin['id_permohonan_ijin']);

        $data['token'] = $token;
        $this->load->view('partials/head');
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('frontoffice/ubahSyarat', $data);
        $this->load->view('partials/foot');
        
    }


}