<?php
/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 16:32
 */
?>
<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">Profil Pengguna <i class="ico ico-cog4"></i></h4>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Profil Pengguna</h3>
    </div>
    
    <div class="panel-body">
        
        <?php echo form_open('pengaturan/akun/submit', 'class = "form-horizontal form-bordered" data-parsley-validate') ?>

            <div class="form-group">
                <label class="col-sm-2 control-label">Username <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="text" name="username" class="form-control" id="username" required="" value="<?php echo $user['username']; ?>">
                    <p class="help-block" id="username_help">Username anda untuk login</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Nama Lengkap <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="text" name="username" class="form-control" required="" value="<?php echo $user['nama']; ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">NIP <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="text" name="NIP" class="form-control" required="" value="<?php echo $user['NIP']; ?>">
                </div>
            </div>
            <div class="form-group" id="field_pass" style="display: none;">
                <label class="col-sm-2 control-label">Password <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="password" name="passwd" class="form-control" value="">
                    <p class="help-block">Masukan Password Anda Untuk Verifikasi</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-5">
                    <button type="submit" id="btn-submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>

        <?php echo form_close(); ?>

    </div>
</div>

<script>
var submited = false;
$(function(){
    $('form').on("submit", function(e){
        if(submited == false){
            e.preventDefault();
            $('#field_pass').slideDown();
            $('#field_pass input').attr('required', true);
            submited = true;
        }
    });
    $('#username').on('keyup', function(e){
        var username = $(this).val();
        $.ajax({
            type : "POST",
            data : {username},
            url : "<?php echo base_url('ajax/lihat_username') ?>",
            success : function(e){
                if(e > 0){
                    $('#btn-submit').attr('disabled', true);
                    $('#username_help').addClass('text-danger');
                }
                else{
                    $('#btn-submit').attr('disabled', false);
                    $('#username_help').removeClass('text-danger');
                }
            }
        })
    });
})
</script>