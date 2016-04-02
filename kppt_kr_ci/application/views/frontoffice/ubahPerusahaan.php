<?php
/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 4:12
 */
?>
<link rel="stylesheet" href="<?php echo base_url('resources/plugins/jquery-ui/css/jquery-ui.css') ?>">

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
    <li class="active"><a href="javascript:void(0);" data-toggle="tab">Data Perusahaan</a></li>
</ul><br>

<?php echo $perusahaan['akta_pendirian_tanggal'] ?>

<?php echo form_open_multipart('frontoffice/permohonan_ijin/ubah-data/perusahaan/'.$permohonan_ijin['token'].'/submit', 'class = "form-horizontal form-bordered" data-parsley-validate') ?>

    <section class="panel panel-default panel-border panel-shadow">
        <header class="panel-heading">
            <h3 class="panel-title">Data Perusahaan</h3>
        </header>
        <div class="panel-body">

            <div class="form-group">
                <label class="col-sm-2 control-label">NPWP <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="text" name="npwp" class="form-control" required="" data-parsley-type="number" value="<?php echo $perusahaan['npwp'] ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Nama Perusahaan <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="text" name="nama_perusahaan" class="form-control" required="" value="<?php echo $perusahaan['nama_perusahaan'] ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Alamat Perusahaan <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="text" name="alamat_perusahaan" class="form-control" required="" value="<?php echo $perusahaan['alamat_perusahaan'] ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">No Telp. Perusahaan <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="text" name="no_telp_perusahaan" class="form-control" required="" data-parsley-type="number" value="<?php echo $perusahaan['no_telp_perusahaan'] ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-5">
                    <input type="email" name="email_perusahaan" class="form-control" data-parsley-type="email" value="<?php echo $perusahaan['email_perusahaan'] ?>"
>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Nomor Akta Pendirian <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="text" name="akta_pendirian_nomor" class="form-control" required="" value="<?php echo $perusahaan['akta_pendirian_nomor'] ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Akta Pendirian <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="text" name="akta_pendirian_tanggal" class="form-control datepicker" required="" value="<?php echo dateDatabaseToView($perusahaan['akta_pendirian_tanggal']); ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Modal Usaha <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="text" name="modal_usaha" class="form-control" required="" data-parsley-type="number" value="<?php echo $perusahaan['modal_usaha'] ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">KBLI</label>
                <div class="col-sm-5">
                    <input type="text" name="KBLI" id="KBLI" class="form-control" value="<?php echo $perusahaan['KBLI'] ?>">
                </div>
            </div>
            <div class="form-group-separator"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Keterangan</label>
                <div class="col-sm-5">
                    <input type="text" name="keterangan" class="form-control" value="<?php echo $perusahaan['keterangan'] ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Badan Usaha <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="text" name="jenis_badan_usaha" class="form-control" required="" value="<?php echo $perusahaan['jenis_badan_usaha'] ?>">
                </div>
            </div>

            <br>
            <div class="btn-group">
                <button type="submit" name="type" class="btn btn-success btn-flat" ><i class="fa fa-save"></i> Simpan</button>
            </div>
            
        </div>
    </section>
<?php echo form_close(); ?>

<script type="text/javascript" src="<?php echo base_url('resources/plugins/jquery-ui/js/jquery-ui.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('resources/plugins/inputmask/js/inputmask.js') ?>"></script>

<script>
    $(function(){
        $('.datepicker').datepicker({
            changeMonth: true,
            changeYear: true
        });
        $('#KBLI').autocomplete({
            source : "<?php echo base_url('ajax/kbli_autocomplete') ?>",
            // minLength : 3,
            create: function () {
                $(this).data('ui-autocomplete')._renderItem = function (ul, item) {
                    return $('<li>')
                        .append('<a>' + item.label + '<br>' + item.bidang_usaha +' -- '+ item.jenis_kegiatan_usaha + '</a>')
                        .appendTo(ul);
                };
            },
            select: function( event, ui ) {
                var result = ui.item;
                
            }
        });
    });

</script>