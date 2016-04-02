<?php
/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 1:20
 */
?>
<link rel="stylesheet" href="<?php echo base_url('resources/plugins/select2/css/select2.css') ?>">

<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">Permohonan Ijin Baru</h4>
    </div>
</div>

<ul class="nav nav-tabs">
    <li class="active"><a href="javascript:void(0);" data-toggle="tab">1. Verifikasi Jenis Permohonan dan Syarat</a></li>
</ul>

<br>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Jenis Permohonan Ijin</h3>
    </div>
    <div class="panel-body">
        <div class="row">

            <div class="col-lg-6 col-lg-offset-1">

                <?php echo form_open('frontoffice/permohonan-ijin/daftar-syarat', 'id = "formPilihJenisIjin" class="form-bordered" data-parsley-validate') ?>

                    <div class="form-group">
                        <label class="control-label">Jenis Ijin</label>
                        <select class="form-control" name="id_jenis_ijin" required="">
                            <option></option>
                            <?php
                                foreach($jenis_ijin as $jenis){
                            ?>
                                <option value="<?php echo $jenis['id_jenis_ijin']; ?>"><?php echo $jenis['jenis_ijin']; ?></option>
                            <?php
                                }

                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Pilih Jenis Ijin</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<?php echo form_open_multipart('frontoffice/permohonan-ijin/ijin-baru/verifikasi-berkas/submit', 'class="form-horizontal" ') ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Persyaratan</h3>
        </div>
        <div class="panel-body" id="loadingTarget">



            <div id="syaratInfo">
                <div class="row">

                    <div class="col-lg-8">
                        <div class="alert alert-info fade in ">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4 class="semibold">Pemberitahuan</h4>
                            <p class="mb10">Daftar syarat yang dibutuhkan untuk melakukan permohonan ijin akan tampil setelah jenis ijin dipilih..</p>
                        </div>
                    </div>
                </div>
            </div>



            <div id="syaratDaftar" style="width: 100%; display: none; padding: 0 30px;">
                <div id="syaratTarget"></div>
                <div class="btn-group">
                    <button type="submit" class="btn btn-info btn-flat" name="type" value="0"><i class="fa fa-save"></i> Simpan Sebagai Draf</button>
                    <button type="submit" class="btn btn-success btn-flat" name="type" value="1"><i class="fa fa-chevron-right"></i> Selanjutnya</button>
                </div>
            </div>

        </div>
    </div>
<?php echo form_close(); ?>

<script src="<?php echo base_url('resources/plugins/select2/js/select2.js') ?>"></script>
<script>
    $(function(){
        $('select[name="id_jenis_ijin"]').select2({
            placeholder: 'Pilih Jenis Ijin'
        });
        $('#formPilihJenisIjin').ajaxForm({
            beforeSend : function(){
                $('#loadingTarget').prepend('<div id="syaratLoading"><div class="indicator show"><span class="spinner"></span></div>');
                $('#formPilihJenisIjin input[type=submit]').button('loading');
                // $('#syaratDaftar').hide();
                // $('#syaratLoading').show();
            },
            complete: function(xhr){
                $('#syaratInfo').hide();
                $('#syaratLoading').hide(function(){
                    $(this).remove();
                });
                $('#syaratDaftar #syaratTarget').html(xhr.responseText);
                $('#syaratDaftar').show();
                $('#formPilihJenisIjin input[type=submit]').button('reset');
            }
        });

    });

</script>
