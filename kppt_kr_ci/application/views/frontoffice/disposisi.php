<?php
/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 12:57
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
    <li class="active"><a href="javascript:void(0);" data-toggle="tab">4. Disposisi</a></li>
</ul><br>


<section class="panel panel-default">
    <header class="panel-heading">
        <h3 class="panel-title">Disposisi</h3>
    </header>
    <div class="panel-body">
        <?php echo form_open_multipart('frontoffice/permohonan-ijin/ijin-baru/disposisi/'.$token.'/submit', 'class = "form-horizontal"') ?>

        <div class="form-group">
            <label class="col-sm-2 control-label">Disposisi Kepada</label>
            <div class="col-sm-5">
                <input type="text" name="" disabled="" class="form-control" value="Kepala Kantor">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Catatan</label>
            <div class="col-sm-5">
                <textarea name="catatan_to_kepalabagian" rows="5" class="form-control">
Mohon ditindaklanjuti
                </textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-5">
                <button type="submit" onclick="submitChange()" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <?php form_close(); ?>
    </div>
</section>


<script>
    var submited = false;

    window.onbeforeunload = function() {
        if (!submited){
            return 'Langkah pengajuan permohonan ijin belum selesai. Apabila anda keluar data akan disimpan sebagai draft. Apakah anda yakin?';
        }
    };

    function submitChange(){
        submited = true;
    }

</script>