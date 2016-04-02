<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 1:48
 */

class Ajax extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('properties');
    }

    public function daftar_syarat(){
        $id_jenis_ijin = $this->input->post('id_jenis_ijin');
        $syarat = $this->properties->lihatSyarat($id_jenis_ijin);
        echo $this->properties->buatListSyarat($id_jenis_ijin, $syarat);
    }

    public function getDataTable(){

        $target = 'frontoffice';
        if (isset($_GET['status']) && $_GET['status'] == 2){
            $target  = 'kepalabagian';
            $posisi = 2;
        }

        if (isset($_GET['status']) && $_GET['status'] == 3){
            $target  = 'kasi';
            $posisi = 3;
        }

        
        $this->load->library('Datatables');
        
        $this->datatables->select('token, no_ijin, 
            nama as nama_pemohon, nama_perusahaan, jenis_ijin, jenis_permohonan, permohonan_ijin.created_at, permohonan_ijin.type, progress');
        $this->datatables->from('permohonan_ijin');
        $this->datatables->join('pemohon', 'pemohon.nik = permohonan_ijin.nik', 'left');
        $this->datatables->join('perusahaan', 'perusahaan.id_perusahaan = permohonan_ijin.id_perusahaan', 'left');
        $this->datatables->join('jenis_ijin', 'permohonan_ijin.id_jenis_ijin = jenis_ijin.id_jenis_ijin');
        
        
        if ($target != 'frontoffice'){
            $this->datatables->where('posisi_permohonan_ijin', $posisi);
        }

        $this->datatables->add_column('aksi', 
                    '<td class="text-center">
                        <div class="toolbar">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-default">Aksi</button>
                                <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" style="z-index:1000000;">
                                    <li><a href="' . base_url() . $target.'/permohonan-ijin/lihat-data/$1"><i class="icon ico-pencil"></i>Lihat</a></li>
                                    <li><a href="javascript:void(0)" onclick=\'confirmDelete("' . base_url() . $target. '/permohonan-ijin/hapus-data/$1")\'  class="text-danger link-danger"><i class="icon ico-remove3"></i>Hapus</a></li>
                                </ul>
                            </div>
                        </div>
                    </td>',
                    'token');


        $this->datatables->order('permohonan_ijin.created_at', 'desc');
        
        $permohonan_ijin = $this->datatables->generate();

        echo $permohonan_ijin;
    }

    public function nikAutocomplete(){
        $nik = $this->input->get('term');
        $nik = str_replace('_', '', $nik);

        $this->db->select('*, nik as label');
        $this->db->like('nik', $nik);
        $res = $this->db->get('pemohon');
        $result = $res->result_array();
        echo json_encode($result);
    }

    public function kbli_autocomplete(){
        $kbli = $this->input->get('term');
        $this->db->select('*, kbli as label');
        $this->db->like('kbli', $kbli);
        $res = $this->db->get('ls_kbli');
        $result = $res->result_array();
        echo json_encode($result);
    }

    public function lihat_jumlah_notif(){
        $id_jabatan = $this->input->post('id_jabatan');
        $this->db->select('count(*) as jml');
        $this->db->join('permohonan_ijin', 'permohonan_ijin.id_permohonan_ijin = pemberitahuan_permohonan.id_permohonan_ijin');
        $this->db->where('id_jabatan_tujuan', $id_jabatan);
        $this->db->where('dibaca', 0);
        $query = $this->db->get('pemberitahuan_permohonan');
        $res = $query->row_array();
        echo $res['jml'];
    }


    public function lihat_notif(){
        $id_jabatan = $this->input->post('id_jabatan');
        $jabatan = $this->properties->halamanPengguna($this->session->userdata['pengguna']['id_jabatan']);

        $this->db->join('permohonan_ijin', 'pemberitahuan_permohonan.id_permohonan_ijin = permohonan_ijin.id_permohonan_ijin');
        $this->db->order_by('waktu', 'desc');
        $this->db->limit(7);
        $query = $this->db->get_where('pemberitahuan_permohonan', array('id_jabatan_tujuan' => $id_jabatan));
        $pemberitahuan = $query->result_array();
        $isi = '';
        $color = '';
        $isi_notif = '';

        foreach ($pemberitahuan as $key => $value) {
            $notif = $this->properties->status_notif($value['isi']);
            if ($value['dibaca'] == 0){
                $icon_color = 'bgcolor-'.$notif['color'];
            }
            else{
                $icon_color = 'bgcolor-default';
            }
            $isi .='<a href="'.base_url($jabatan.'/permohonan-ijin/lihat-data/'.$value['token']).'" class="media read border-dotted">
                        <span class="media-object pull-left">
                            <i class="'.$notif['icon'].' '.$icon_color.'"></i>
                        </span>
                        <span class="media-body">
                            <span class="media-text"><span class="text-'.$notif['color'].' semibold">Pemberitahuan</span> <br>'.$notif['isi'].'</span>
                            <!-- meta icon -->
                            <br>
                            <span class="media-meta pull-right">'.$value['waktu'].'</span>
                            <!--/ meta icon -->
                        </span>
                    </a>';
        }
        echo $isi;
    }

    public function checkUserNameExists(){
        $user = $this->session->userdata['pengguna'];
        $username = $this->input->post('username');
        
        $this->db->from('pengguna');
        $this->db->where('username', $username);
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        echo $rowcount;
    }

    public function buat_permohonan_terpenuhi(){
        $jenis_permohonan = $this->properties->lihatJenisIjin();
        $result = '<table class="table">';

        foreach ($jenis_permohonan as $key => $value) {
            $result .= '<tr>    
                            <td><input type="checkbox" onchange="checkIjin('.$value['id_jenis_ijin'].')" class="chJenis" value="'.$value['id_jenis_ijin'].'" name="check['.$value['id_jenis_ijin'].']"></td>
                            <td>'.$value['jenis_ijin'].'</td>
                            <td><input type="text" class="form-control" style="display:none;" id="inputJenis'.$value['id_jenis_ijin'].'"></td>
                        </tr>';    
        }

        $result .= '</table>';
        $result .= '
            <script>
                function checkIjin(e){
                    $("#inputJenis"+e).fadeIn();
                    $("#inputJenis"+e).attr("required", true);
                }
            </script>
        ';

        echo $result;
    }

}