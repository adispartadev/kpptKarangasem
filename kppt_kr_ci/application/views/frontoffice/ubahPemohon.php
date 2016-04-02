
<?php
/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 3:19
 */
?>
<link rel="stylesheet" href="<?php echo base_url('resources/plugins/jquery-ui/css/jquery-ui.css') ?>">
<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">Permohonan Ijin</h4>
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
    <li class="active"><a href="javascript:void(0);" data-toggle="tab">Ubah Identitas Pemohon</a></li>
</ul><br>


<section class="panel panel-default">
    <header class="panel-heading">
        <h3 class="panel-title">Data Pemohon Ijin</h3>
    </header>
    <div class="panel-body">

        <?php echo form_open_multipart('frontoffice/permohonan-ijin/ubah-data/pemohon/'.$permohonan_ijin['token'].'/submit', 'class = "form-horizontal form-bordered" data-parsley-validate') ?>

            <div class="form-group">
                <label class="col-sm-2 control-label">NIK <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="text" name="nik" readonly="" class="form-control" required id="nik_autocomplete" value="<?php echo $pemohon['nik']; ?>">
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-2 control-label">Nama Lengkap <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama" required id="nama" value="<?php echo $pemohon['nama']; ?>">
                </div>
            </div>



            <div class="form-group">
                <label class="col-sm-2 control-label">Tempat Lahir <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required="" value="<?php echo $pemohon['tempat_lahir']; ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Lahir <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="text" class="datepicker form-control" id="tanggal_lahir" name="tanggal_lahir" required="">
                </div>
            </div>

        
            <div class="form-group">
                <label class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-5">
                    <div class="form-group" style="border-color: #FFF !important; padding-top: 1px; padding-right: 15px; padding-left: 15px; margin-bottom: 0px;">
                        <label class="control-label" style="margin-top: 0px; margin-bottom: 3px;">Jalan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="alamat_jalan" required="" placeholder="Jalan" id="alamat_jalan" value="<?php echo $pemohon['alamat_jalan']; ?>">
                    </div>
                    <div class="form-group" style="border-color: #FFF !important; padding-top: 1px; padding-right: 15px; padding-left: 15px; margin-bottom: 0px;">
                        <label class="control-label" style="margin-top: 0px; margin-bottom: 3px;">Dusun  <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="alamat_dusun" required="" placeholder="Dusun" id="alamat_dusun" value="<?php echo $pemohon['alamat_dusun']; ?>">
                    </div>
                    <div class="form-group" style="border-color: #FFF !important; padding-top: 1px; padding-right: 15px; padding-left: 15px; margin-bottom: 0px;">
                        <label class="control-label" style="margin-top: 0px; margin-bottom: 3px;">Desa <span class="text-danger">*</span></label>
                        <select name="alamat_desa_id" class="form-control" required="">
                            <?php 
                                $cl = '';
                                foreach($desa as $de){ 
                                    if ($pemohon['id_desa'] == $de['id_desa']){
                                        $cl = 'selected';
                                    }
                                    else{
                                        $cl = '';
                                    }
                                ?>

                                <option <?php echo $cl; ?> value="<?php echo $de['id_desa'] ?>"><?php echo $de['nama_desa'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
           
            <?php
                $agama = agama();
            ?>

            <div class="form-group">
                <label class="col-sm-2 control-label">Agama</label>
                <div class="col-sm-5">
                    <select name="agama" class="form-control">
                        <?php
                            $cl = '';
                            foreach($agama as $key => $value){ 
                                if ($pemohon['agama'] == $value){
                                    $cl = 'selected';
                                }
                                else{
                                    $cl = '';
                                }
                        ?>
                            <option <?php echo $cl; ?> value="<?php echo $value; ?>"><?php echo $value; ?></option>
                        <?php
                            }
                        ?>

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label label-light">No. Telp <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="no_telp" required="" data-parsley-type="number" id="no_telp" value="<?php echo $pemohon['no_telp'] ?>">
                </div>
            </div>
            <br>
            <div class="btn-group">
                <button type="submit" name="type" class="btn btn-success btn-flat" ><i class="fa fa-save"></i> Simpan</button>
            </div>
        <?php form_close(); ?>

<script type="text/javascript" src="<?php echo base_url('resources/plugins/jquery-ui/js/jquery-ui.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('resources/plugins/inputmask/js/inputmask.js') ?>"></script>


<script>
    $(function(){
        $('.datepicker').datepicker({
            changeMonth: true,
            changeYear: true
        });
    });

</script>