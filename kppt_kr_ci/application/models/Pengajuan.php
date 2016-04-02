<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Pengajuan extends CI_Model {

	public function __construct(){
		$this->load->database();
	}


	public function SpermohonanIjin($pe){

		//update
		if (isset($pe['id_permohonan_ijin']) && $pe['id_permohonan_ijin'] != null){
			$this->db->where('id_permohonan_ijin', $pe['id_permohonan_ijin']);
			return $this->db->update('permohonan_ijin', $pe);
		}
		//insert
		else{
			$this->db->insert('permohonan_ijin', $pe);
			return $this->db->insert_id();
		}
	}

	public function hapusPemberitahuan($ar){
		return $this->db->delete('pemberitahuan_permohonan', array('id_permohonan_ijin' => $ar['id_permohonan_ijin'], 
			'id_jabatan_asal' => $ar['id_jabatan_asal'], 'id_jabatan_tujuan' => $ar['id_jabatan_tujuan']));
	}

	public function Pemberitahuan($ar){
		$this->hapusPemberitahuan($ar);
		$this->db->insert('pemberitahuan_permohonan', $ar);
		return $this->db->insert_id();
	}

	public function DataPermohon($pe){
		$nik = $pe['nik'];
		$this->db->where('nik', $nik);
		$query = $this->db->get('pemohon');
		$result = $query->result_array();
		if (sizeof($result) == 0){
			$this->InsertIdentitasPemohon($pe);
		}
		else{
			$this->UpdateIdentitasPemohon($pe);
		}
	}

	public function InsertIdentitasPemohon($pe){
		$this->db->insert('pemohon', $pe);
		return $this->db->insert_id();
	}

	public function UpdateIdentitasPemohon($pe){
		$this->db->where('nik', $pe['nik']);
		return $this->db->update('pemohon', $pe);
	}


	public function SsyaratIjin($id_permohonan_ijin, $id_jenis_ijin){
		$table = 'persyaratan_permohonan_ijin';
		$this->load->model('properties');

		$sya['id_permohonan_ijin'] = $id_permohonan_ijin;
		$folder_target = './resources/file-syarat/';
		$file = '';
		$newfilename = '';

		foreach ($this->input->post('check') as $key => $value) {
			$sya['id_syarat_ijin'] = $key;
			$sya['id_permohonan_ijin'] = $id_permohonan_ijin;
			
			$file = $_FILES['fileUpload'.$key];
			$temp = explode(".", $file["name"]);
			$newfilename = md5(date('Y-m-dh:i:d')).rand() . '.' . end($temp);

			if(move_uploaded_file($file["tmp_name"], $folder_target . $newfilename)){
				$sya['fname'] = $newfilename;
			}
			else{
				$sya['fname'] = '';
			}
			//insert ke table $table
			$this->db->insert($table, $sya);
		}


	}

	public function updateProgress($id_permohonan_ijin, $cond = 'plus'){
		if($cond == 'plus'){
			$this->db->query("UPDATE permohonan_ijin SET progress = progress + 1 WHERE id_permohonan_ijin =".$id_permohonan_ijin);
		}
		else{
			$this->db->query("UPDATE permohonan_ijin SET progress = progress - 1 WHERE id_permohonan_ijin =".$id_permohonan_ijin);
		}
		return $this->db->result();
	}

	public function Sdisposisi($array){
		$this->db->where('id_permohonan_ijin', $array['id_permohonan_ijin']);
		return $this->db->update('permohonan_ijin', $array);
	}

	public function resetNotifikasi($id_permohonan_ijin){
		$this->db->where('id_permohonan_ijin', $id_permohonan_ijin);
		$this->db->where('id_jabatan_tujuan', $this->session->userdata['pengguna']['id_jabatan']);
		$this->db->update('pemberitahuan_permohonan', array('dibaca' => 1));
	}

	public function deleteNotif($id_permohonan_ijin, $sumber, $target, $isi){
        return $this->db->delete('pemberitahuan_permohonan', array('id_permohonan_ijin' => $id_permohonan_ijin, 
        	'id_jabatan_asal' => $sumber, 'id_jabatan_tujuan' => $target));
	}
	public function resend($id_permohonan_ijin, $sumber, $target, $isi){
		$this->deleteNotif($id_permohonan_ijin, $sumber, $target, $isi);

		$ar = array(
				'id_permohonan_ijin' => $id_permohonan_ijin,
				'isi' => $isi,
				'id_jabatan_asal' => $sumber,
				'id_jabatan_tujuan' => $target,
				'dibaca' => 0,
				'waktu' => date('Y-m-d H:i:s')
			);

		$this->db->insert('pemberitahuan_permohonan', $ar);
		return $this->db->insert_id();
	}
}
