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
    private $start_status = 1;
    
    /**
     * Status posisi akhir permohonan ijin
     */
    private $end_status = 2;

    public function __construct(){
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('properties');
        $this->load->model('pengajuan');
        $index = 1; //frontoffice
        $this->properties->checkUserLogin($index);
        /**
         * Get the login user
         */
        $this->login_user = $this->session->userdata['pengguna'];
    }

    /**
     * redirect frontoffice/permohonan-ijin/ijin-baru
     * to
     * frontoffice/permohonan-ijin/ijin-baru/verifikasi-berkas
     */
    public function redirect(){
        redirect('frontoffice/permohonan-ijin/ijin-baru/verifikasi-berkas');
    }


    /**
     * Tampil form pilih jenis ijin
     * Tampil form syarat ijin
     */
    public function verifikasi_berkas(){
        $this->load->view('partials/head');
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $data['jenis_ijin'] = $this->properties->lihatJenisIjin();
        $this->load->view('frontoffice/verifikasiBerkas', $data);
        $this->load->view('partials/foot');
    }

    /**
     * Langkah 1
     * Submit verifikasi berkas
     */
    public function submit_verifikasi_berkas(){
        

        $token = $this->properties->token();
        $type = $this->input->post('type');
        $pe = array(
            'id_jenis_ijin' => $this->input->post('id_jenis_ijin'),
            'no_ijin' => $this->input->post('no_ijin'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'tgl_pengajuan' => date('Y-m-d H:i:s'),
            'type' => 0,
            'token' => $token,
            'jenis_permohonan' => 1,
            'posisi_permohonan_ijin' => $this->start_status,
            'progress' => 1
        );

        // insert ke table permohonan_ijin
        $id_permohonan_ijin = $this->pengajuan->SpermohonanIjin($pe);
        $this->pengajuan->SsyaratIjin($id_permohonan_ijin, $this->input->post('id_jenis_ijin'));
        
        if ($type == 0){ //disimpan sebagai draft
            $this->session->set_flashdata('item', array('message' => 'Permohonan ijin berhasil disimpan sebagai draft','class' => 'success'));
            redirect('frontoffice/permohonan-ijin/lihat-data/'. $token); //kembali ke halaman sebelumnya
        }
        else{
            $this->session->set_flashdata('item', array('message' => 'Permohonan ijin berhasil disimpan, silahkan melajutkan proses','class' => 'success'));
            redirect('frontoffice/permohonan-ijin/ijin-baru/identitas-pemohon/'.$token);
        }
    }


    /**
     * Menampilkan halaman input identitas pemohon
     */
    public function identitas_pemohon($token){
        $this->load->view('partials/head');
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->helper('site');

        $data['permohonan_ijin'] = $this->properties->permohonanIjin(null, $token);
        $data['desa'] = $this->properties->getDesa();
        $this->load->view('frontoffice/identitasPemohon', $data);

        $this->load->view('partials/foot');
    }

    /**
     * @param $token
     * Langkah 2
     * Submit Identitas Pemohon
     */
    public function submit_identitas_pemohon($token){
        $permohonan_ijin = $this->properties->permohonanIjin(null, $token);
        $type = $this->input->post('type');

        $mo = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->properties->tanggalToDb($this->input->post('tanggal_lahir')),
            'alamat_jalan' => $this->input->post('alamat_jalan'),
            'alamat_dusun' => $this->input->post('alamat_dusun'),
            'alamat_desa_id' => $this->input->post('alamat_desa_id'),
            'agama' => $this->input->post('agama'),
            'no_telp' => $this->input->post('no_telp'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->pengajuan->DataPermohon($mo);
        //update table permohonan_ijin
        $pe = array(
            'nik' => $this->input->post('nik'),
            'id_permohonan_ijin' => $permohonan_ijin['id_permohonan_ijin'],
            'progress' => 2
        );

        $this->pengajuan->SpermohonanIjin($pe);

        if ($type == 0){ //disimpan sebagai draft
            $this->session->set_flashdata('item', array('message' => 'Identitas pemohon berhasil disimpan sebagai draft','class' => 'success'));
            redirect('frontoffice/permohonan-ijin/lihat-data/'. $token); //kembali ke halaman sebelumnya
        }
        else{
            $this->session->set_flashdata('item', array('message' => 'Identitas pemohon berhasil disimpan, silahkan melanjutkan proses','class' => 'success'));
            redirect('frontoffice/permohonan-ijin/ijin-baru/data-perusahaan/'.$token);
        }
    }

    public function data_perusahaan($token){
        $permohonan_ijin = $this->properties->permohonanIjin(null, $token);

        $this->load->view('partials/head');
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');

        $data = $this->DataJenisPerusahaan($permohonan_ijin['id_jenis_ijin']);
        $data['desa'] = $this->properties->getDesa();
        $data['token'] = $token;
        $data['permohonan_ijin'] = $permohonan_ijin;

        $this->load->view('frontoffice/dataPerusahaan', $data);
        

        $this->load->view('partials/foot');
    }


    public function DataJenisPerusahaan($id_jenis_ijin){
        $data['page'] = $this->properties->getRowJenisIjin($id_jenis_ijin)['singkatan'];

        if ($id_jenis_ijin == 1 || $id_jenis_ijin == 5){
            $data['ipr_jenis'] = $this->properties->getDataProperties('ipr_jenis');
        }

        return $data;
    }


    public function submit_data_perusahaan($token){
        $this->load->model('submitperusahaan');
        $permohonan_ijin = $this->properties->permohonanIjin(null, $token);
        
        $id_perusahaan = $this->submitperusahaan->submit($permohonan_ijin['id_permohonan_ijin'], $permohonan_ijin['id_jenis_ijin']);

        $type = $this->input->post('type');

        //update table permohonan_ijin
        $pe = array(
            'id_perusahaan' => $id_perusahaan,
            'id_permohonan_ijin' => $permohonan_ijin['id_permohonan_ijin'],
            'progress' => 3
        );
        $this->pengajuan->SpermohonanIjin($pe);

        if ($type == 0){ //disimpan sebagai draft
            $this->session->set_flashdata('item', array('message' => 'Data perusahaan berhasil disimpan sebagai draft','class' => 'success'));
            redirect('frontoffice/permohonan-ijin/lihat-data/'. $token); //kembali ke halaman sebelumnya
        }
        else{
            $this->session->set_flashdata('item', array('message' => 'Data perusahaan berhasil disimpan, silahkan melanjutkan proses','class' => 'success'));
            redirect('frontoffice/permohonan-ijin/ijin-baru/disposisi/'. $token);
        }

    }

    public function disposisi($token){
        $data['token'] = $token;
        $this->load->view('partials/head');
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('frontoffice/disposisi', $data);
        $this->load->view('partials/foot');
    }


    public function submit_disposisi($token){
        $this->db->join('perusahaan', 'permohonan_ijin.id_perusahaan = perusahaan.id_perusahaan');
        $this->db->join('pemohon', 'permohonan_ijin.nik = pemohon.nik');
        $query = $this->db->get_where('permohonan_ijin', array('token' => $token));
        $permohonan_ijin = $query->row_array();


        //update table permohonan_ijin
        $pe = array(
            'id_permohonan_ijin' => $permohonan_ijin['id_permohonan_ijin'],
            'progress' => 4,
            'posisi_permohonan_ijin' => $this->end_status,
            'type' => 1,
            'catatan_to_kepalabagian' => $this->input->post('catatan_to_kepalabagian')
        );

        if ($this->pengajuan->Sdisposisi($pe)){

            // notif table
            $no = array(
                'id_permohonan_ijin' => $permohonan_ijin['id_permohonan_ijin'],
                'isi' => 1,
                'id_jabatan_asal' => 1,
                'id_jabatan_tujuan' => 2,
                'dibaca' => 0,
                'waktu' => date('Y-m-d H:i:s')
            );
            $this->pengajuan->Pemberitahuan($no);

            $this->session->set_flashdata('item', array('message' => 'Disposisi berhasil dikirim','class' => 'success'));
            redirect('frontoffice/permohonan-ijin/ijin-baru/summary/'. $token);
        }
    }

    public function summary($token){

        $this->db->join('perusahaan', 'permohonan_ijin.id_perusahaan = perusahaan.id_perusahaan');
        $query = $this->db->get_where('permohonan_ijin', array('token' => $token));
        
        $data['permohonan_ijin'] = $query->row_array();

        $this->load->view('partials/head');
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('frontoffice/summary', $data);
        $this->load->view('partials/foot');
    }


    public function tampil_data(){
        $this->load->helper('site');
        
        $this->load->view('partials/head');
        $this->load->view('partials/header');
        $this->load->view('partials/sidebar');
        $this->load->view('frontoffice/tampilPermohonan');
        $this->load->view('partials/foot');
    }

    

    public function lihat_data($token){
        $this->load->helper('site');
       $this->db->select('*, permohonan_ijin.created_at as permohonan_ijin_created');

        $this->db->join('pemohon', 'permohonan_ijin.nik = pemohon.nik', 'left');
        $this->db->join('perusahaan', 'permohonan_ijin.id_perusahaan = perusahaan.id_perusahaan', 'left');
        $this->db->join('jenis_ijin', 'permohonan_ijin.id_jenis_ijin = jenis_ijin.id_jenis_ijin', 'left');
        $this->db->join('desa', 'pemohon.alamat_desa_id = desa.id_desa', 'left');
        $query = $this->db->get_where('permohonan_ijin', array('token' => $token));

        $data['permohonan_ijin'] = $query->row_array();
        $data['syarat'] = $this->properties->getSyaratTerpenuhi($data['permohonan_ijin']['id_permohonan_ijin']);
        $data['pesan'] = $this->properties->getPermohonanLinkPesanProgress($data['permohonan_ijin']);
        $data['kelengkapan'] = $this->properties->getKelengkapanPermohonan($data['permohonan_ijin']['id_jenis_ijin'], $data['permohonan_ijin']['id_permohonan_ijin'], $data['permohonan_ijin']['singkatan']); 
        $data['desa'] = $this->properties->getDesa();
        if (sizeof($data['permohonan_ijin']) > 0){

            $this->pengajuan->resetNotifikasi($data['permohonan_ijin']['id_permohonan_ijin']);
            

            $this->load->view('partials/head');
            $this->load->view('partials/header');
            $this->load->view('partials/sidebar');
            $this->load->view('frontoffice/detailPermohonan', $data);
            $this->load->view('partials/foot');

        }
        else{
            $this->load->view('errors/404');
        }
    }  


    public function cetak($token){
       $this->load->library('ciqrcode');

       $this->db->join('perusahaan', 'permohonan_ijin.id_perusahaan = perusahaan.id_perusahaan');
       $this->db->join('pemohon', 'permohonan_ijin.nik = pemohon.nik');
       $this->db->join('jenis_ijin', 'permohonan_ijin.id_jenis_ijin = jenis_ijin.id_jenis_ijin');
       $query = $this->db->get_where('permohonan_ijin', array('token' => $token));
       $data['permohonan_ijin'] = $query->row_array();

       //qrcode
       $qrname = './resources/code/'.$data['permohonan_ijin']['id_permohonan_ijin'].'.png';
       $params['data'] = $token;
       $params['level'] = 'H';
       $params['size'] = 10;
       $params['savename'] = $qrname;
       $this->ciqrcode->generate($params);

       $imtype = pathinfo($qrname, PATHINFO_EXTENSION);
       $imdata = file_get_contents($qrname);
       $data['base64'] = 'data:image/' . $imtype . ';base64,' . base64_encode($imdata);

       $data['syarat'] = $this->properties->getSyaratTerpenuhi($data['permohonan_ijin']['id_permohonan_ijin']);

       $this->load->helper(array('dompdf', 'file'));
       $html = $this->load->view('frontoffice/cetak', $data, true);
       // $html = $this->load->view('frontoffice/cetak', $data);

       $filename = str_replace('/', '-', $data['permohonan_ijin']['no_ijin']);
       pdf_create($html, $filename, 'A4', 'portrait');
   }


    public function resend($token){
        $permohonan_ijin = $this->properties->permohonanIjin(null, $token);
        $target = 2;
        $sumber = 1;
        $isi = 1;
        if ($this->pengajuan->resend($permohonan_ijin['id_permohonan_ijin'], $sumber, $target, $isi)){

            //update permohonan ijin
            $pe = array(
                'id_permohonan_ijin' => $permohonan_ijin['id_permohonan_ijin'],
                'posisi_permohonan_ijin' => 2 //kirim ke kepalabagian
            );
            $this->pengajuan->SpermohonanIjin($pe);


            $this->session->set_flashdata('item', array('message' => 'Permohonan ijin berhasil dikirim kembali ke kepala bagian','class' => 'success'));
            redirect('frontoffice/permohonan-ijin/lihat-data/'. $token);
        }

    }

    public function cetak_persetujuan($token){
         $this->db->join('perusahaan', 'permohonan_ijin.id_perusahaan = perusahaan.id_perusahaan', 'left');
        $this->db->join('pemohon', 'permohonan_ijin.nik = pemohon.nik', 'left');
        $this->db->join('jenis_ijin', 'permohonan_ijin.id_jenis_ijin = jenis_ijin.id_jenis_ijin', 'left');
        $this->db->join('desa', 'pemohon.alamat_desa_id = desa.id_desa');
        $query = $this->db->get_where('permohonan_ijin', array('token' => $token));
        $data['permohonan_ijin'] = $query->row_array();

        $this->load->helper(array('dompdf', 'file', 'site'));

        $logo = './resources/icons/logo.png';
        $imtype = pathinfo($logo, PATHINFO_EXTENSION);
        $imdata = file_get_contents($logo);
        $data['logo'] = 'data:image/' . $imtype . ';base64,' . base64_encode($imdata);


        $data['dasar'] = $this->properties->get_dasar_permohonan($data['permohonan_ijin']['id_jenis_ijin']);

        // $html = $this->load->view('frontoffice/cetakPersetujuan', $data);
        $html = $this->load->view('frontoffice/cetakPersetujuan', $data, true);

        $filename = 'persetujuan-permohonan-'.str_replace('/', '-', $data['permohonan_ijin']['no_ijin']);
        pdf_create($html, $filename, 'F4', 'portrait');

    }
}
