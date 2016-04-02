<?php
/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/112
 * Time: 5:04
 */
?>
<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">
            Detail Permohonan Ijin
            <?php
                if ($permohonan_ijin['type'] == 0){
                    echo '<i data-toggle="tooltip" title="Draft" class="ico ico-save"></i>';
                }
                else{
                    echo '<i data-toggle="tooltip" title="Selesai" class="ico ico-check"></i>';
                }
            ?>
            
        </h4>
    </div>
</div>



<ul class="nav nav-tabs">
    <li class="active"><a href="javascript:void(0);" data-toggle="tab">Detail Permohonan</a></li>
</ul><br>



<div class="row">
    <div class="col-md-12">
        <section class="panel panel-default">
            <header class="panel-heading">
                <h3 class="panel-title">Data Umum Permohonan</h3>
            </header>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8">
                        <?php echo $pesan; ?>

                        <?php
                            if ($permohonan_ijin['progress'] == 6){
                                ?>
                                <div class="alert alert-info fade in">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4 class="semibold">Pemberitahuan</h4>
                                    <p class="mb10">Permohonan telah diterima oleh Kasi</p>
                                    <a target="_BLANK" href="<?php echo base_url('frontoffice/permohonan-ijin/cetak-persetujuan/'.$permohonan_ijin['token']) ?>" class="btn btn-info">Cetak Surat Persetujuan</a>
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>


                <table class="table">
                    <tr>
                        <td>No. Ijin</td>
                        <td><?php echo $permohonan_ijin['no_ijin']; ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Permohonan</td>
                        <td><?php echo $permohonan_ijin['jenis_ijin']; ?> (<?php echo $permohonan_ijin['singkatan']; ?>)</td>
                    </tr>
                    <tr>
                        <td>Tanggal Pengajuan</td>
                        <td><?php echo getDates($permohonan_ijin['tgl_pengajuan']); ?> </td>
                    </tr>
                    <tr>
                        <td>Terdata Tanggal</td>
                        <td><?php echo getDateTime($permohonan_ijin['permohonan_ijin_created']); ?></td>
                    </tr>
                </table>
            </div>
        </section>
    </div>
    
    <div class="col-md-12">
        <section class="panel panel-default">
            <header class="panel-heading">
                <h3 class="panel-title">Data Diri Pemohon</h3>
                <?php
                    if ($permohonan_ijin['nik'] != null){
                ?>
                <div class="panel-toolbar text-right">
                    <div class="option">
                        <a class="btn" data-toggle="tooltip" title="ubah" href="<?php echo base_url('frontoffice/permohonan_ijin/ubah-data/pemohon/'.$permohonan_ijin['token']) ?>"><i class="ico-pencil"></i></a>
                    </div>
                </div>
                <?php 
                    }
                ?>
            </header>

            <div class="panel-body">
                <?php
                    if ($permohonan_ijin['nik'] != null){
                ?>
                    <table class="table">
                        <tr>
                            <td>NIK</td>
                            <td><?php echo $permohonan_ijin['nik']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td><?php echo $permohonan_ijin['nama']; ?></td>
                        </tr>
                        <tr>
                            <td>TTL</td>
                            <td><?php echo $permohonan_ijin['tempat_lahir']; ?>, <?php echo $permohonan_ijin['tanggal_lahir']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>
                                <?php echo 'Jalan '.$permohonan_ijin['alamat_jalan'].', Kelurahan '.$permohonan_ijin['alamat_dusun'].', Desa '.$permohonan_ijin['nama_desa']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>No Telp.</td>
                            <td><?php echo $permohonan_ijin['no_telp']; ?></td>
                        </tr>
                    </table>
                <?php
                }
                else{
                    echo '<p><span class="text-danger">*</span> Data pemohon masih kosong</p>';
                }
                ?>
            </div>
        </section>
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <section class="panel panel-default">
            <header class="panel-heading">
                <h3 class="panel-title">Data Perusahaan</h3>
                <?php
                    if ($permohonan_ijin['id_perusahaan'] != null){
                ?>
                <div class="panel-toolbar text-right">
                    <div class="option">
                        <a class="btn" data-toggle="tooltip" title="ubah" href="<?php echo base_url('frontoffice/permohonan_ijin/ubah-data/perusahaan/'.$permohonan_ijin['token']) ?>"><i class="ico-pencil"></i></a>
                    </div>
                </div>
                <?php
                }
                ?>
            </header>

            <div class="panel-body">
                <?php
                    if ($permohonan_ijin['id_perusahaan'] != null){
                    ?>

                    <table class="table">
                        <tr>
                            <td>NPWP</td>
                            <td><?php echo tampil_data_exc($permohonan_ijin['npwp']); ?></td>
                        </tr>
                        <tr>
                            <td>Nama Perusahaan</td>
                            <td><?php echo tampil_data_exc($permohonan_ijin['nama_perusahaan']); ?></td>
                        </tr>
                        <tr>
                            <td>Alamat Perusaahaan</td>
                            <td><?php echo tampil_data_exc($permohonan_ijin['alamat_perusahaan']); ?></td>
                        </tr>
                        <tr>
                            <td>No telp.</td>
                            <td><?php echo tampil_data_exc($permohonan_ijin['no_telp_perusahaan']); ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo tampil_data_exc($permohonan_ijin['email_perusahaan']); ?></td>
                        </tr>
                        <tr>
                            <td>No Akta Pendirian</td>
                            <td><?php echo tampil_data_exc($permohonan_ijin['akta_pendirian_nomor']); ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Akta Pendirian</td>
                            <td><?php echo getDates($permohonan_ijin['akta_pendirian_tanggal']); ?></td>
                        </tr>
                        <tr>
                            <td>Modal Usaha</td>
                            <td><?php echo tampil_data_exc($permohonan_ijin['modal_usaha']); ?></td>
                        </tr>
                        <tr>
                            <td>KBLI</td>
                            <td><?php echo tampil_data_exc($permohonan_ijin['KBLI']); ?></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td><?php echo tampil_data_exc($permohonan_ijin['keterangan']); ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Badan Usaha</td>
                            <td><?php echo tampil_data_exc($permohonan_ijin['jenis_badan_usaha']); ?></td>
                        </tr>
                    </table>
                    <?php
                    }
                    else{
                        echo '
                            <p><span class="text-danger">*</span> Data perusahaan masih kosong</p>
                            ';
                    }
                ?>
            </div>
        </section>
    </div>
    <div class="col-md-12">
        <section class="panel panel-default">
            <header class="panel-heading">
                <h3 class="panel-title">Data Pendukung Permohonan Ijin</h3>
            </header>

            <div class="panel-body">
                <?php include ('tampil-jenis/'.$permohonan_ijin['id_jenis_ijin'].'.php') ?>
            </div>
        </section>
    </div>
</div>




<section class="panel panel-default">
    <header class="panel-heading">
        <h3 class="panel-title">Persyaratan Permohonan</h3>
        <div class="panel-toolbar text-right">
            <div class="option">
                <a class="btn" data-toggle="tooltip" title="ubah" href="<?php echo base_url('frontoffice/permohonan_ijin/ubah-data/syarat/'.$permohonan_ijin['token']) ?>"><i class="ico-pencil"></i></a>
            </div>
        </div>
    </header>

    <div class="panel-body">

        <table class="table">
            <thead>
                <tr>
                    <td></td>
                    <td>Nama Syarat</td>
                    <td>Berkas Syarat</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($syarat as $key => $value) {
                ?>
                    <tr>
                        <td>
                            <?php
                                if ($value['fname'] == ''){
                                    echo '<span class="ico-file-minus" style="color : #ed541212;"></span>';
                                }
                                else{
                                    echo '<span class="ico-file-check" style="color : #8ac448;"></span>';
                                }
                            ?>
                        </td>
                        <td>
                            <?php echo $value['syarat']; ?>
                        </td>
                        <td>
                            <?php
                                if ($value['fname'] == ''){
                                    echo '';
                                }
                                else{
                                    echo '<a href="'.base_url('resources/file-syarat/'.$value['fname']).'" target="_BLANK">Lihat file</a>';
                                }
                            ?>
                        </td>
                    </tr>
                <?php
                    }
                ?>  
            </tbody>
        </table>
    </div>
</section>

<?php
    if ($permohonan_ijin['posisi_permohonan_ijin'] == 1 && $permohonan_ijin['id_perusahaan'] != null && $permohonan_ijin['progress'] != 6){
?>


<section class="panel panel-default">
    <header class="panel-heading">
        <h3 class="panel-title">Aksi Permohonan Ijin</h3>
    </header>
    
    <div class="panel-body">
        <a class="btn btn-primary" href="<?php echo base_url('frontoffice/permohonan_ijin/kirim-ulang/'.$permohonan_ijin['token']); ?>">
            Kirim ke Kepala Bagian 
        </a>
    </div>
</section>

<?php
    }
?>