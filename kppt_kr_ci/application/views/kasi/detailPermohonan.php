<?php
/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 5:04
 */
?>
<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">Detail Permohonan Ijin</h4>
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
                        <td><?php echo getDateTime($permohonan_ijin['created_at']); ?></td>
                    </tr>
                    <tr>
                        <td>No Telp.</td>
                        <td><?php echo $permohonan_ijin['no_telp']; ?></td>
                    </tr>
                    

                </table>

            </div>

        </section>

    </div>
    <div class="col-md-12">
        <section class="panel panel-default">
            <header class="panel-heading">
                <h3 class="panel-title">Data Diri Pemohon</h3>
            </header>

            <div class="panel-body">

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
                            <?php echo $permohonan_ijin['alamat_jalan'].', '.$permohonan_ijin['alamat_dusun'].', '.$permohonan_ijin['nama_desa']; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </section>
    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <section class="panel panel-default">
            <header class="panel-heading">
                <h3 class="panel-title">Data Perusahaan</h3>
            </header>

            <div class="panel-body">
                    <table class="table">
                        <tr>
                            <td>NPWP</td>
                            <td><?php echo $permohonan_ijin['npwp']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Perusahaan</td>
                            <td><?php echo $permohonan_ijin['nama_perusahaan']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat Perusaahaan</td>
                            <td><?php echo $permohonan_ijin['alamat_perusahaan']; ?></td>
                        </tr>
                        <tr>
                            <td>No telp.</td>
                            <td><?php echo $permohonan_ijin['no_telp_perusahaan']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $permohonan_ijin['email_perusahaan']; ?></td>
                        </tr>
                        <tr>
                            <td>No Akta Pendirian</td>
                            <td><?php echo $permohonan_ijin['akta_pendirian_nomor']; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Akta Pendirian</td>
                            <td><?php echo getDates($permohonan_ijin['akta_pendirian_tanggal']); ?></td>
                        </tr>
                        <tr>
                            <td>Modal Usaha</td>
                            <td><?php echo $permohonan_ijin['modal_usaha']; ?></td>
                        </tr>
                        <tr>
                            <td>KBLI</td>
                            <td><?php echo $permohonan_ijin['KBLI']; ?></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td><?php echo $permohonan_ijin['keterangan']; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Badan Usaha</td>
                            <td><?php echo $permohonan_ijin['jenis_badan_usaha']; ?></td>
                        </tr>
                    </table>
            </div>
        </section>
    </div>
    <div class="col-md-12">
        <section class="panel panel-default">
            <header class="panel-heading">
                <h3 class="panel-title">Data </h3>
            </header>

            <div class="panel-body">

            </div>
        </section>
    </div>
</div>




    <section class="panel panel-default">
        <header class="panel-heading">
            <h3 class="panel-title">Persyaratan Permohonan</h3>
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
                                        echo '<span class="ico-file-minus" style="color : #ed5466;"></span>';
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
        <div class="panel-footer">
            <a href="javascript:void(0);" class="btn btn-info" data-toggle="modal" data-target="#bs-modal">Validasi</a>
            <a href="javascript:void(0);" class="btn btn-danger" data-toggle="modal" data-target="#bs-modal-tolak">Tolak</a>
        </div>
    </section>

    <!-- START modal -->
        <div id="bs-modal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <div class="ico-check mb15 mt15" style="font-size:36px;"></div>
                        <h3 class="semibold modal-title text-info">Validasi Permohonan Ijin</h3>
                    </div>
                <?php echo form_open_multipart('kasi/permohonan-ijin/validasi/'.$permohonan_ijin['token'].'/submit', 'class = "form-horizontal"') ?>
                    <div class="modal-body">
                        <p>Setujui permohonan ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Validasi</button>
                    </div>
                <?php echo form_close(); ?>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <!--/ END modal -->
        <!-- START modal -->
            <div id="bs-modal-tolak" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <div class="ico-check mb15 mt15" style="font-size:36px;"></div>
                            <h3 class="semibold modal-title text-info">Tolak Permohonan Ijin</h3>
                        </div>
                    <?php echo form_open_multipart('kasi/permohonan-ijin/tolak/'.$permohonan_ijin['token'].'/submit', 'class = "form-horizontal"') ?>

                        <div class="modal-body">
                            <p>Apabila permohonan ditolak, maka permohonan akan dikirim kembali ke frontofice untuk di proses kembali. Apakah anda yakin untuk menolak permohonan ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tolak</button>
                        </div>
                    <?php echo form_close(); ?>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <!--/ END modal -->

<script type="text/javascript">
    $(function(){
        $('.readmore').readmore({
            moreLink: '<a href="#" class="label label-primary" style="width: auto !important;">Lihat Selengkapnya</a>',
            lessLink: '<a href="#" class="label label-danger" style="width: auto !important;">Tutup</a>'
        });
    });
</script>