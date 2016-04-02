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
                <h3 class="panel-title">Identitas Toko Modern</h3>
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Toko <span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <input type="text" name="nama_toko" class="form-control" required="">
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
                <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-5">
                        <div class="form-group" style="border-color: #FFF !important; padding-top: 1px; padding-right: 15px; padding-left: 15px; margin-bottom: 0px;">
                            <label class="control-label" style="margin-top: 0px; margin-bottom: 3px;">Jalan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="alamat_jalan" required="" placeholder="Jalan">
                        </div>
                        <div class="form-group" style="border-color: #FFF !important; padding-top: 1px; padding-right: 15px; padding-left: 15px; margin-bottom: 0px;">
                            <label class="control-label" style="margin-top: 0px; margin-bottom: 3px;">Dusun  <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="alamat_dusun" required="" placeholder="Dusun">
                        </div>
                        <div class="form-group" style="border-color: #FFF !important; padding-top: 1px; padding-right: 15px; padding-left: 15px; margin-bottom: 0px;">
                            <label class="control-label" style="margin-top: 0px; margin-bottom: 3px;">Desa <span class="text-danger">*</span></label>
                            <select name="alamat_desa_id" class="form-control" required="">
                                <?php foreach($desa as $de){ ?>
                                    <option value="<?php echo $de['id_desa'] ?>"><?php echo $de['nama_desa'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </section>
   