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