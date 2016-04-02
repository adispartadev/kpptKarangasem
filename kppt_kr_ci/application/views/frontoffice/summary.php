<?php
/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 05/03/16
 * Time: 1:04
 */
?>


<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">Permohonan Ijin Baru</h4>
    </div>
    <div class="page-header-section">
        <!-- Toolbar -->
        <div class="toolbar">
            <ol class="breadcrumb breadcrumb-transparent nm">
                <li><a href="javascript:void(0);">Component</a></li>
                <li class="active">Tabs &amp; accordion</li>
            </ol>
        </div>
        <!--/ Toolbar -->
    </div>
</div>

<ul class="nav nav-tabs">
    <li class=""><a href="javascript:void(0);" data-toggle="tab">1. Verifikasi Jenis Permohonan dan Syarat</a></li>
    <li class=""><a href="javascript:void(0);" data-toggle="tab">2. Identitas Pemohon</a></li>
    <li class=""><a href="javascript:void(0);" data-toggle="tab">3. Data Perusahaan</a></li>
    <li class=""><a href="javascript:void(0);" data-toggle="tab">4. Disposisi</a></li>
    <li class="active"><a href="javascript:void(0);" data-toggle="tab">5. Summary</a></li>
</ul><br>

<section class="panel panel-default">
    <header class="panel-heading">
        <h3 class="panel-title">Summary</h3>
    </header>
    <div class="panel-body">
		<div class="row">
			<div class="col-md-8">
                <div class="alert alert-info fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4 class="semibold">Pemberitahuan!</h4>
                    <p class="mb10">Pemohonan Berhasil di proses</p>
                </div>
            </div>
		</div>

        <dl class="dl-horizontal">
            <dt>No. Registrasi</dt>
            <dd><?php echo $permohonan_ijin['no_ijin']; ?></dd>
            <dt>Nama Perusahaan</dt>
            <dd><?php echo $permohonan_ijin['nama_perusahaan']; ?></dd>
        </dl>

        <br>
        <div class="btn-group">
            <a href="" class="btn btn-info">Halaman depan</a>
            <a href="<?php echo base_url('frontoffice/permohonan-ijin/cetak/'.$permohonan_ijin['token']) ?>" target="_BLANK" class="btn btn-success">Cetak</a>
        </div>
    </div>
</section>