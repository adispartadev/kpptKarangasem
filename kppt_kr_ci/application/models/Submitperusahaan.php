<?php

/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 12:33
 */
class Submitperusahaan extends CI_Model
{
    public function submit($id_permohonan_ijin, $tabel_jenis){

        $this->load->model('properties');

        $perusahaan_field = array(
            'npwp',
            'nama_perusahaan',
            'alamat_perusahaan',
            'no_telp_perusahaan',
            'email_perusahaan',
            'akta_pendirian_nomor',
            'modal_usaha',
            'KBLI',
            'keterangan',
            'jenis_badan_usaha',
        );

        $perusahaan = array();
        foreach($perusahaan_field as $key => $value){
            $perusahaan[$value] = $this->input->post($value);
        }

        $perusahaan['akta_pendirian_tanggal'] = $this->properties->tanggalToDb($this->input->post('akta_pendirian_tanggal'));

        $this->db->insert('perusahaan', $perusahaan);
        $id_perusahaan =  $this->db->insert_id();

        if ($tabel_jenis == 1) // Ijin Pemanfaatan Ruang (ipr)
        {
            $this->insertIpr($id_permohonan_ijin);
        }
        //2 . Ijin Lingkungan == kosong
        if ($tabel_jenis == 3){ //Ijin Lokasi (lok)
            $this->insertLok($id_permohonan_ijin);
        }
        if ($tabel_jenis == 4){ //Ijin Penetapan Lokasi (pkl)
            $this->insertPkl($id_permohonan_ijin);
        }

        if ($tabel_jenis == 5){
            $this->insertLima($id_permohonan_ijin);
        }

        if ($tabel_jenis == 6){
            $this->insertEnam($id_permohonan_ijin);
        }

        if ($tabel_jenis == 7){
            $this->insertTujuh($id_permohonan_ijin);
        }
        if ($tabel_jenis == 8){
            $this->insertDelapan($id_permohonan_ijin);
        }
        if ($tabel_jenis == 9){
            $this->insertSembilan($id_permohonan_ijin);
        }
        if ($tabel_jenis == 20){
            $this->insertDuaPuluh($id_permohonan_ijin);
        }
        if ($tabel_jenis == 22){
            $this->insertDuaDua($id_permohonan_ijin);
        }
        if ($tabel_jenis == 23){
            $this->insertDuaTiga($id_permohonan_ijin);
        }

        if ($tabel_jenis == 24){
            $this->insertDuaEmpat($id_permohonan_ijin);
        }

        if ($tabel_jenis == 26){
            $this->insertDuaEnam($id_permohonan_ijin);
        }

        if ($tabel_jenis == 27){
            $this->insertDuaTujuh($id_permohonan_ijin);
        }
        if ($tabel_jenis == 28){
            $this->insertDuaDelapan($id_permohonan_ijin);
        }




        if ($tabel_jenis == 41){
            $this->insertEmpatSatu($id_permohonan_ijin);
        }
        if($tabel_jenis == 42){
            $this->insertEmpatDua($id_permohonan_ijin);
        }

        return $id_perusahaan;
    }

    /**
     * Insert Permohonan IJin Pemanfaatan Ruang
     */
    public function insertIpr($id_permohonan_ijin){

        $ipr_field = array(
            'luas',
            'alamat_jalan',
            'alamat_dusun',
            'alamat_desa_id',
            'status_tanah',
            'penggunaan_lahan_skrng',
            'jenis_ipr'
        );

        $ipr = array();
        foreach($ipr_field as $key => $value){
            $ipr[$value] = $this->input->post($value);
        }

        //upload file
        $folder_target = './resources/file-ipr/';
        $file = $_FILES['bukti_kepemilikan_file'];
        $temp = explode(".", $file["name"]);
        $newfilename = md5(date('Y-m-dh:i:d')).rand() . '.' . end($temp);
        if (move_uploaded_file($file["tmp_name"], $folder_target . $newfilename)){
            $ipr['bukti_kepemilikan'] = $newfilename;
        }
        else{
            $ipr['bukti_kepemilikan'] = '';
        }

        $ipr['created_at'] = date('Y-m-d H:i:s');
        $ipr['updated_at'] = date('Y-m-d H:i:s');
        $ipr['id_permohonan_ijin'] = $id_permohonan_ijin;

        $this->db->insert('ipr', $ipr);

    }

    /**
     * Insert Permohonan IJIn Lokasi
     */
    public function insertLok($id_permohonan_ijin){
        $ipr_field = array(
            'luas',
            'alamat_jalan',
            'alamat_dusun',
            'alamat_desa_id',
            'status_tanah',
            'penggunaan_lahan_skrng',
        );

        $ipr = array();
        foreach($ipr_field as $key => $value){
            $ipr[$value] = $this->input->post($value);
        }

        //upload file
        $folder_target = './resources/file-lok/';
        $file = $_FILES['bukti_kepemilikan_file'];
        $temp = explode(".", $file["name"]);
        $newfilename = md5(date('Y-m-dh:i:d')).rand() . '.' . end($temp);
        if (move_uploaded_file($file["tmp_name"], $folder_target . $newfilename)){
            $ipr['bukti_kepemilikan'] = $newfilename;
        }
        else{
            $ipr['bukti_kepemilikan'] = '';
        }

        $ipr['created_at'] = date('Y-m-d H:i:s');
        $ipr['updated_at'] = date('Y-m-d H:i:s');
        $ipr['id_permohonan_ijin'] = $id_permohonan_ijin;

        $this->db->insert('lok', $ipr);
    }

    /**
     * Insert Permohonan Ijin Penetapan Lokasi
     */
    public function insertPkl($id_permohonan_ijin){
        $folder_target = './resources/file-pkl/';

        $ipr_field = array(
            'luas',
            'alamat_jalan',
            'alamat_dusun',
            'alamat_desa_id',
            'status_tanah',
            'penggunaan_lahan_skrng',
        );

        $ipr = array();
        foreach($ipr_field as $key => $value){
            $ipr[$value] = $this->input->post($value);
        }

        //upload file
        $file = $_FILES['bukti_kepemilikan_file'];
        $temp = explode(".", $file["name"]);
        $newfilename = md5(date('Y-m-dh:i:d')).rand() . '.' . end($temp);
        if (move_uploaded_file($file["tmp_name"], $folder_target . $newfilename)){
            $ipr['bukti_kepemilikan'] = $newfilename;
        }
        else{
            $ipr['bukti_kepemilikan'] = '';
        }

        $ipr['created_at'] = date('Y-m-d H:i:s');
        $ipr['updated_at'] = date('Y-m-d H:i:s');
        $ipr['id_permohonan_ijin'] = $id_permohonan_ijin;

        $this->db->insert('pkl', $ipr);
    }

    /**
     * Insert Permohonan Ijin Mendirikan Bangunan
     */
    public function insertLima($id_permohonan_ijin){
        $field_data = array(
                'alamat_jalan',
                'alamat_dusun',
                'alamat_desa_id',
                'status_tanah',
                'sempadan_jalan',
                'sempadan_pantai',
                'sempadan_jurang',
                'sempadan_sungai',
                'dasar',
                'dinding',
                'sloof',
                'jumlah_lantai',
                'lantai',
                'plapond',
                'ring',
                'kap',
                'usuk',
                'atap',
            );
        $ipr = array();
        foreach($field_data as $key => $value){
            $ipr[$value] = $this->input->post($value);
        }
        $ipr['created_at'] = date('Y-m-d H:i:s');
        $ipr['updated_at'] = date('Y-m-d H:i:s');
        $ipr['id_permohonan_ijin'] = $id_permohonan_ijin;

        $this->db->insert('imb', $ipr);

    }

    /**
     * Insert Permohonan TEmpat IJIN USAHA SITU
     */
    public function insertEnam($id_permohonan_ijin){
        $field_data = array(
                'lokasi_kegiatan',
                'batas_utara',
                'batas_timur',
                'batas_selatan',
                'batas_barat'
            );
        $field = array();
        foreach($field_data as $key => $value){
            $field[$value] = $this->input->post($value);
        }
        $field['created_at'] = date('Y-m-d H:i:s');
        $field['updated_at'] = date('Y-m-d H:i:s');
        $field['id_permohonan_ijin'] = $id_permohonan_ijin;

        $this->db->insert('situ', $field);
    }

    /**
     * Permohonan IJin Gangguan HO
     */
    public function insertTujuh($id_permohonan_ijin){
        $field_data = array(
                'lokasi_kegiatan',
                'batas_utara',
                'batas_timur',
                'batas_selatan',
                'batas_barat'
            );
        $field = array();
        foreach($field_data as $key => $value){
            $field[$value] = $this->input->post($value);
        }
        $field['created_at'] = date('Y-m-d H:i:s');
        $field['updated_at'] = date('Y-m-d H:i:s');
        $field['id_permohonan_ijin'] = $id_permohonan_ijin;

        $this->db->insert('ho', $field);
    }

    /**
     * Permohonan IJin Gangguan HO
     */
    public function insertDelapan($id_permohonan_ijin){
        $field_data = array(
                'lokasi_kegiatan',
                'batas_utara',
                'batas_timur',
                'batas_selatan',
                'batas_barat'
            );
        $field = array();
        foreach($field_data as $key => $value){
            $field[$value] = $this->input->post($value);
        }
        $field['created_at'] = date('Y-m-d H:i:s');
        $field['updated_at'] = date('Y-m-d H:i:s');
        $field['id_permohonan_ijin'] = $id_permohonan_ijin;

        $this->db->insert('situ_mb', $field);
    }

    /**
     * Permohonan IJin Usaha Pertambangan
     */
    public function insertSembilan($id_permohonan_ijin){
        $field_data = array(
                'bahan_galian',
                'luas_wilayah',
                'atas_nama',
                'sppt_nomor',
                'letak_lokasi',
                'jangka_waktu',
                'batas_utara',
                'batas_timur',
                'batas_selatan',
                'batas_barat'
            );
        $field = array();
        foreach($field_data as $key => $value){
            $field[$value] = $this->input->post($value);
        }
        $field['created_at'] = date('Y-m-d H:i:s');
        $field['updated_at'] = date('Y-m-d H:i:s');
        $field['id_permohonan_ijin'] = $id_permohonan_ijin;

        $this->db->insert('iup', $field);
    }




    /**
     * Insert Apotik
     */
    public function insertDuaPuluh($id_permohonan_ijin){
        $field_data = array(
                'nama_apotek',
                'no_telp',
                'alamat_jalan',
                'alamat_dusun',
                'alamat_desa_id',
                'status_sarana',
                'nama_pemilik_sarana',
                'alamat_pemilik_sarana',
                'npwp_sarana',
            );
        $field = array();
        foreach($field_data as $key => $value){
            $field[$value] = $this->input->post($value);
        }
        $field['created_at'] = date('Y-m-d H:i:s');
        $field['updated_at'] = date('Y-m-d H:i:s');
        $field['id_permohonan_ijin'] = $id_permohonan_ijin;

        $this->db->insert('apt', $field);
    }

    /**
     * Insert permohonan ijin usaha toko modern
     */
    public function insertDuaDua($id_permohonan_ijin){
        $field_data = array(
                'nama_toko',
                'luas_tanah',
                'luas_bangunan',
                'luas_lantai_penjualan',
                'luas_lahan_parkir',
                'kapasitas_parkir',
                'alamat_jalan',
                'alamat_dusun',
                'alamat_desa_id'
            );
        $field = array();
        foreach($field_data as $key => $value){
            $field[$value] = $this->input->post($value);
        }
        $field['created_at'] = date('Y-m-d H:i:s');
        $field['updated_at'] = date('Y-m-d H:i:s');
        $field['id_permohonan_ijin'] = $id_permohonan_ijin;

        $this->db->insert('iutm', $field);
    }


    /**
     * Permohonan Pasar Tradisional
     */
    public function insertDuaTiga($id_permohonan_ijin){
        $field_data = array(
                'nama_pasar_tradisional',
                'luas_tanah',
                'luas_bangunan',
                'luas_lantai_penjualan',
                'luas_lahan_parkir',
                'kapasitas_parkir',
                'alamat_jalan',
                'alamat_dusun',
                'alamat_desa_id'
            );
        $field = array();
        foreach($field_data as $key => $value){
            $field[$value] = $this->input->post($value);
        }
        $field['created_at'] = date('Y-m-d H:i:s');
        $field['updated_at'] = date('Y-m-d H:i:s');
        $field['id_permohonan_ijin'] = $id_permohonan_ijin;

        $this->db->insert('iup2t', $field);
    }

    /**
     * Pusat Perbelanjaan
     */
    public function insertDuaEmpat($id_permohonan_ijin){
        $field_data = array(
                'nama_pusat_perbelanjaan',
                'luas_tanah',
                'luas_bangunan',
                'luas_lantai_penjualan',
                'luas_lahan_parkir',
                'kapasitas_parkir',
                'alamat_jalan',
                'alamat_dusun',
                'alamat_desa_id'
            );
        $field = array();
        foreach($field_data as $key => $value){
            $field[$value] = $this->input->post($value);
        }
        $field['created_at'] = date('Y-m-d H:i:s');
        $field['updated_at'] = date('Y-m-d H:i:s');
        $field['id_permohonan_ijin'] = $id_permohonan_ijin;

        $this->db->insert('iupp', $field);
    }

    /**
     * Pusat Eksplorasi ABT
     */
    public function insertDuaEnam($id_permohonan_ijin){


        $field_data = array(
               'lokasi',
               'kelurahan',
               'sumur',
               'diameter_sumur',
               'kedalaman_sumur',
               'debit_air_max',
            );
        $field = array();
        foreach($field_data as $key => $value){
            $field[$value] = $this->input->post($value);
        }
        $field['created_at'] = date('Y-m-d H:i:s');
        $field['updated_at'] = date('Y-m-d H:i:s');
        $field['id_permohonan_ijin'] = $id_permohonan_ijin;

        $this->db->insert('erabt', $field);
    }

    /**
     * Pusat Eskploitasi ABT
     */
    public function insertDuaTujuh($id_permohonan_ijin){

        $field_data = array(
               'lokasi',
               'kelurahan',
               'sumur',
               'diameter_sumur',
               'kedalaman_sumur',
               'debit_air_max',
            );
        $field = array();
        foreach($field_data as $key => $value){
            $field[$value] = $this->input->post($value);
        }
        $field['created_at'] = date('Y-m-d H:i:s');
        $field['updated_at'] = date('Y-m-d H:i:s');
        $field['id_permohonan_ijin'] = $id_permohonan_ijin;

        $this->db->insert('elabt', $field);
    }


    /**
     * Penurupan Mata Air
     */
    public function insertDuaDelapan($id_permohonan_ijin){

        $field_data = array(
               'lokasi',
               'kelurahan',
               'sumur',
               'diameter_sumur',
               'kedalaman_sumur',
               'debit_air_max',
            );
        $field = array();
        foreach($field_data as $key => $value){
            $field[$value] = $this->input->post($value);
        }
        $field['created_at'] = date('Y-m-d H:i:s');
        $field['updated_at'] = date('Y-m-d H:i:s');
        $field['id_permohonan_ijin'] = $id_permohonan_ijin;

        $this->db->insert('puma', $field);
    }

    /**
     * Permohonan Perkebunan Budaya
     */
    public function insertEmpatSatu($id_permohonan_ijin){
        $field_data = array(
               'luas_tanah'
            );
        $field = array();
        foreach($field_data as $key => $value){
            $field[$value] = $this->input->post($value);
        }
        $field['created_at'] = date('Y-m-d H:i:s');
        $field['updated_at'] = date('Y-m-d H:i:s');
        $field['id_permohonan_ijin'] = $id_permohonan_ijin;

        $this->db->insert('pbud', $field);
    }


    /**
     * Permohonan Perkebunan Pengolahan
     */
    public function insertEmpatDua($id_permohonan_ijin){
        $field_data = array(
               'luas_tanah'
            );
        $field = array();
        foreach($field_data as $key => $value){
            $field[$value] = $this->input->post($value);
        }
        $field['created_at'] = date('Y-m-d H:i:s');
        $field['updated_at'] = date('Y-m-d H:i:s');
        $field['id_permohonan_ijin'] = $id_permohonan_ijin;

        $this->db->insert('ppg', $field);
    }

}
