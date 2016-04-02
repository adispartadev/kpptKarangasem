<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Spartan
 * Date: 2/23/2016
 * Time: 9:12 PM
 */
class Properties extends CI_Model
{
    public function __construct(){
        $this->load->database();
    }

    public function lihatJenisIjin(){
        $query = $this->db->get('jenis_ijin');
        return $query->result_array();
    }
    /**
     * @param $id_jenis_ijin
     * @return mixed
     * Melihat daftar syarat berdasarkan ijin
     */
    public function lihatSyarat($id_jenis_ijin){
        $this->db->select('mandatory, id_syarat_ijin,syarat AS nama_syarat');
        $this->db->from('syarat_ijin');
        $this->db->where('id_jenis_ijin', $id_jenis_ijin);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function buatListSyarat($id_jenis_ijin, $syarat){
        $result = '
            <div class="form-group">
                <label class="col-sm-2 control-label" style="text-align:left">No. Registrasi</span></label>
                <div class="col-sm-5">
                    <input type="text" readonly="" name="no_ijin" value="'.$this->lihatNoRegistrasi($id_jenis_ijin).'" class="form-control">
                    <input type="hidden" name="id_jenis_ijin" value="'.$id_jenis_ijin.'">
                </div>
            </div>
            <table class="table" style="border-width: 0px;">
        ';
        foreach($syarat as $key => $value){
            if ($value['mandatory'] == 1){
                $blabel = '<strong>';
                $label = '</strong><span class="text-danger"> required*</span>';
            }
            else{
                $blabel = '';
                $label = '';
            }
            $result .= '<tr>';
            $result .= '<td>';
            $result .= '<input type="checkbox" class="chSyarat" value="'.$value['id_syarat_ijin'].'" name="check['.$value['id_syarat_ijin'].']">';
            $result .= '</td>';
            $result .= '<td>';
            $result .= $blabel. $value['nama_syarat'] . $label;
            $result .= '</td>';
            $result .= '<td style="width: 250px;">';



            $result .= '<input id="files'.$value['id_syarat_ijin'].'" type="file" class="file_in" name="fileUpload'.$value['id_syarat_ijin'].'">';
                

            $result .= '</td>';
            $result .= '</tr>';
        }

        return $result;
    }


    public function lihatSyaratTerpenuhi($id_permohonan_ijin){
        $this->db->select('*');
        $this->db->from('persyaratan_permohonan_ijin');
        $this->db->where('id_permohonan_ijin', $id_permohonan_ijin);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * @return int
     * Membuat nomor registrasi
     */
    public function lihatNoRegistrasi($id_jenis_ijin){
        // 503/01/IPR/2016
        $query = $this->db->get_where('jenis_ijin', array('id_jenis_ijin' => $id_jenis_ijin));
        $jenis_ijin = $query->row_array(); 
        $kode = $jenis_ijin['kode'];
        $namaJenis = $jenis_ijin['singkatan'];
        $tahun = date('Y');
        //membuat nomor
        $query = $this->db->query("SELECT no_ijin FROM permohonan_ijin WHERE id_jenis_ijin = ". $id_jenis_ijin ." ORDER BY created_at DESC LIMIT 1");
        $no = $query->result_array();
        if (sizeof($no) > 0){
            $no_ijin = $no[0]['no_ijin'];
            $ar = explode('/', $no_ijin);
            $nom = (int)$ar[1] + 1; 
        }
        else{
            $nom = 1;
        }

        if (strlen($nom) == 1){
            $nom = '0'.$nom;
        }
        return $kode.'/'.$nom.'/'.$namaJenis.'/'.$tahun;
    }

    public function token(){
        $this->load->library('encrypt');
        $code = rand().date('Y-m-d h:i:s');
        $encrypted_string = $this->encrypt->encode($code);
        $encrypted_string = str_replace('\/', '', $encrypted_string);
        $encrypted_string = str_replace('+', '', $encrypted_string);
        $encrypted_string = str_replace('=', '', $encrypted_string);
        return str_replace('/', '',$encrypted_string);
    }

    public function permohonanIjin($id_permohonan_ijin, $token){
        if ($id_permohonan_ijin != null){
            $query = $this->db->get_where('permohonan_ijin', array('id_permohonan_ijin' => $id_permohonan_ijin));
            return $query->row_array();
        }
        else{
            $query = $this->db->get_where('permohonan_ijin', array('token' => $token));
            return $query->row_array();
        }
    }

    public function permohonanIjinDetail($id_permohonan_ijin, $token){
        if ($id_permohonan_ijin != null){
            $this->db->from('permohonan_ijin');
            $this->db->where('id_permohonan_ijin',$id_permohonan_ijin);
            $this->db->join('jenis_ijin', 'jenis_ijin.id_jenis_ijin = permohonan_ijin.id_jenis_ijin');
            $query = $this->db->get();
            return $query->row_array();
        }
        else{
            $this->db->from('permohonan_ijin');
            $this->db->where('token',$token);
            $this->db->join('jenis_ijin', 'jenis_ijin.id_jenis_ijin = permohonan_ijin.id_jenis_ijin');
            $query = $this->db->get();
            return $query->row_array();
        }
    }

    public function getDesa(){
        $this->db->where('id_desa !=', 1);
        $query = $this->db->get('desa');
        return $query->result_array();
    }

    public function pemohon($nik){
        if ($nik == 1){
            return null;
        }
        else{
            $query = $this->db->get_where('pemohon', array('nik' => $nik));
            return $query->row_array();
        }
    }

    public function getDataProperties($table){
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function tipe_permohonan($type){
        if ($type == 1){
            return '<label class="label label-primary">1</label>';
        }
        return '<label class="label label-info">Draft</label>';
    }


    public function halamanPengguna($index){
        $pengguna = array('', 'frontoffice',
            'kepalabagian',
            'kasi', 'admin');
        return $pengguna[$index];
    }

    // void
    public function checkUserLogin($index){
        
        if(!isset($this->session->userdata['pengguna'])){
            $this->session->set_flashdata('item', array('message' => 'Silahkan login untuk melanjutkan','class' => 'success'));
            redirect('login');
        }
        else{
            $page = $this->halamanPengguna($index);
            if ($index != $this->session->userdata['pengguna']['id_jabatan']){
                redirect($page);
            }
        }
    }


    public function tanggalToDb($tgl){
        $a = explode('/', $tgl);
        return $a[2].'-'.$a[0].'-'.$a[1];
    }

    // posisi
    public function status_permohonan_ijin($id_status){
        $st = array(
                '',
                'Front Office',
                'Kepala Bagian',
                'KASI'
            );
        return $st[$id_status];
    }

    public function getSyaratTerpenuhi($id_permohonan_ijin){
        $this->db->join('syarat_ijin', 'persyaratan_permohonan_ijin.id_syarat_ijin = syarat_ijin.id_syarat_ijin');
        $query = $this->db->get_where('persyaratan_permohonan_ijin', array('id_permohonan_ijin' => $id_permohonan_ijin));
        $syarat = $query->result_array();
        return $syarat;
    }

    //progress
    public function progress_permohonan($i){
        $progress = array(
                'Kosong',
                'Telah melakukan verifikasi berkas',
                'Telah memasukan data pemohon',
                'Telah memasukan data perusahaan',
                'Direview ke kepala bagian',
                'Divalidasi oleh kepala bagian',
                'Direview oleh KASI',
                'Divalidasi oleh KASI',
                'Menunggu jadwal peninjauan lapangan',
                'Sedang proses peninjauan',
                'Putusan ijin'
            );
    }

    // status notifikasi
    public function status_notif($index){
        $stat = array(
                array('isi' => '', 'icon' => ''),
                array('isi' => 'Permohonan ijin baru', 'icon' => 'ico-file-plus', 'color' => 'info'),
                array('isi' => 'Permohonan ijin ditolak kepala bagian', 'icon' => 'ico-close', 'color' => 'danger'),
                array('isi' => 'Permohonan ijin diterima kepala bagian', 'icon' => 'ico-file-check', 'color' => 'success'),
                array('isi' => 'Permohonan ijin ditolak oleh KASI', 'icon' => 'ico-close', 'color' => 'danger'),
                array('isi' => 'Permohonan ijin diterima oleh KASI', 'icon' => 'ico-file-check', 'color' => 'success')
            );
        return $stat[$index];
    }

    public function get_dasar_permohonan($id_jenis_ijin){
        $this->db->from('dasar_uu');
        $this->db->where('id_jenis_ijin', $id_jenis_ijin);
        $this->db->order_by('no_urut', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getRowJenisIjin($id_jenis_ijin){
        $this->db->from('jenis_ijin');
        $this->db->where('id_jenis_ijin', $id_jenis_ijin);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function getPermohonanLinkPesanProgress($permohonan_ijin){
        

        if ($permohonan_ijin['nik'] == null){
            $isi = 'Lanjutkan ke proses pemasukan data pemohon';
            $btn  = '<a href="'.base_url('frontoffice/permohonan-ijin/ijin-baru/identitas-pemohon/'.$permohonan_ijin['token']).'" class="btn btn-info">Lanjut Proses</a>';     
        }
        elseif ($permohonan_ijin['id_perusahaan'] == null) {
            $isi = 'Lanjutkan ke proses pemasukan data perusahaan';
            $btn  = '<a href="'.base_url('frontoffice/permohonan-ijin/ijin-baru/data-perusahaan/'.$permohonan_ijin['token']).'" class="btn btn-info">Lanjut Proses</a>';     
        }
        else{
            if ($permohonan_ijin['catatan_to_kepalabagian'] != null){
                $isi = 'Data permohonan ijin telah terpenuhi';
                $btn  = '<a target="_BLANK" href="'.base_url('frontoffice/permohonan-ijin/cetak/'.$permohonan_ijin['token']).'" class="btn btn-info">Cetak</a>';   
            }
            else{
                $isi = 'Kirim permohonan Ijin ke Kepala Bagian';
                $btn  = '<a href="'.base_url('frontoffice/permohonan-ijin/ijin-baru/disposisi/'.$permohonan_ijin['token']).'" class="btn btn-info">Lanjut Proses</a>';
            }
        }

        $pesan = '<div class="alert alert-info fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4 class="semibold">Status Kelengkapan Data Permohonan</h4>
                    <p class="mb10">'.$isi.'</p>
                    '.$btn.'
                </div>';

        return $pesan;

    }

    public function getKelengkapanPermohonan($id_jenis_ijin = null, $id_permohonan_ijin, $singkatan){
        if ($this->db->table_exists(strtolower($singkatan))){

            $this->db->where('id_permohonan_ijin', $id_permohonan_ijin);
            // $this->db->where('id_jenis_ijin', $id_jenis_ijin);
            $this->db->from(strtolower($singkatan));
            $query = $this->db->get();
            return $query->row_array();
        }

        return array();
    }
}
