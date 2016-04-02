<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">
            <i class="ico ico-users"></i>  Tambah Pengguna Sistem
        </h4>
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
                    <input type="text" name="username" class="form-control" id="username" required="">
                    <p class="help-block" id="username_help">Username anda untuk login</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Nama Lengkap <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="text" name="username" class="form-control" required="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">NIP <span class="text-danger"></span></label>
                <div class="col-sm-5">
                    <input type="text" name="NIP" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Password <span class="text-danger">*</span></label>
                <div class="col-sm-5">
                    <input type="text" name="passwd" class="form-control" value="<?php echo rand(); ?>">
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