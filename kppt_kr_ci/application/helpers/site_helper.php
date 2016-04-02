<?php
/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 3:26
 */


function agama(){
    return array('Hindu', 'Islam', 'Kristen', 'Katolik', 'Budha');
}

function status($type){
    if ($type == 1){
        return '<label class="label label-primary">Terdata</div>';
    }
    else{
        return '<label class="label label-info">Draft</div>';
    }
}

function getDateTime($dateTime){
	$ar_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	$times = explode(' ', $dateTime);
	$dates = explode('-', $times[0]);
	return (int)$dates[2]. ' '.$ar_bulan[(int)$dates[1]]. ' '.$dates[0].' '.$times[1];
}

function getDates($date){
    if ($date != ''){

        $ar_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $dates = explode('-', $date);
        return (int)$dates[2]. ' '.$ar_bulan[(int)$dates[1]]. ' '.$dates[0];
    }
    return '';
}

function dateDatabaseToView($date){
    if ($date == null){
        return '';
    }
    $ar = explode('-', $date);
    return $ar[1].'/'.$ar[2].'/'.$ar[0];
}

function progress_permohonan(){
    $progress = array(
            'Kosong',
            'Telah melakukan verifikasi berkas',
            'Telah memasukan data pemohon',
            'Telah memasukan data perusahaan',
            'Dikirim ke kepala bagian',
            'Divalidasi oleh kepala bagian',
            'Divalidasi oleh kasi'
        );
   	return $progress;
}


function jenis_permohonan($index = null){
    $sr = array(
            'Belum terdata',
            'Pengajuan baru',
            'Perpanjangan',
            'Perubahan',
            'Perluasan'
        );
    if ($index != null){
        return $sr[$index];
    }
    else{
        return $sr;
    }
}

function tampil_data_exc($isi){
    if ($isi == null || $isi == ''){
        return '<label class="label label-danger">Data belum terisi</label>';
    }
    else{
        return $isi;
    }
}

function tampilJenis($ar_sumber, $ar_except, $isFull = true, $isAddress = false){

    echo array_search('id_lok', $ar_except);

    $table = '';
    if ($isFull == true){
        $table .= '<table class="table">';
    }
    if ($isAddress){
        $a = sizeof($ar_except);
        $ar_except[$a] = 'alamat_dusun';   
        $ar_except[$a+1] = 'alamat_desa_id';   
    }

   

    foreach ($ar_sumber as $key => $value) {

        $k = array_search($key, $ar_except);

        
        if (true != $k){

            if ($isAddress == true && $key == 'alamat_jalan'){
                $table .= '<tr>
                    <td>Alamat</td>
                    <td>
                        Jalan '.$ar_sumber['alamat_jalan'].', Kelurahan '.$ar_sumber['alamat_dusun'] .'
                    </td>
                    </tr>';
            }

            $table .= '<tr>
                        <td>'.$key.'</td>
                        <td>'.$value.'</td>
                    </tr>';
        }
    }
    
    if ($isFull == true){
        $table .= '</table>';
    }
    return $table;
}
