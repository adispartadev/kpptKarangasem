<?php
/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 2:11
 */
?>

            
        <section class="panel panel-white">
            <header class="panel-heading">
                <h3 class="panel-title">Identitas Pasar</h3>
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Pasar Tradisional <span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <input type="text" name="nama_pasar_tradisional" class="form-control" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Luas Tanah<span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="text" name="luas_tanah" class="form-control" data-parsley-type="number" required="">
                    </div>
                    <label class="col-sm-2 control-label" style="text-align: left">M<sup>2</sup></label>
                    
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Luas Bangunan<span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="text" name="luas_bangunan" class="form-control" data-parsley-type="number" required="">
                    </div>
                    <label class="col-sm-2 control-label" style="text-align: left">M<sup>2</sup></label>

                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Luas Lantai Penjualan<span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="text" name="luas_lantai_penjualan" class="form-control" data-parsley-type="number" required="">
                    </div>
                    <label class="col-sm-2 control-label" style="text-align: left">M<sup>2</sup></label>

                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Luas Lahan Parkir<span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="text" name="luas_lahan_parkir" class="form-control" data-parsley-type="number" required="">
                    </div>
                    <label class="col-sm-2 control-label" style="text-align: left">M<sup>2</sup></label>

                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Kapasitas Parkir<span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <input type="text" name="kapasitas_parkir" class="form-control" data-parsley-type="number" required="">
                    </div>
                    <label class="col-sm-2 control-label" style="text-align: left">Roda empat</label>
                </div>
                <?php include('tools/alamat.php'); ?>
            </div>
        </section>
   