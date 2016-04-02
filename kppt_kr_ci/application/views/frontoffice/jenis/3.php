<?php
/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 2:11
 */
?>


        <div class="form-group">
            <label class="col-sm-2 control-label">Luas <span class="text-danger">*</span></label>
            <div class="col-sm-3">
                <input type="text" name="luas" class="form-control" data-parsley-type="number" required="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Bukti Kepemilikan <span class="text-danger">*</span></label>
            <div class="col-sm-5">
                <input type="file" name="bukti_kepemilikan_file" class="">
            </div>
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


        <div class="form-group">
            <label class="col-sm-2 control-label">Status Tanah <span class="text-danger">*</span></label>
            <div class="col-sm-5">
                <input type="text" name="status_tanah" class="form-control" required="">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Penggunaan Lahan Sekarang <span class="text-danger">*</span></label>
            <div class="col-sm-5">
                <input type="text" name="penggunaan_lahan_skrng" class="form-control" required="">
            </div>
        </div>
   