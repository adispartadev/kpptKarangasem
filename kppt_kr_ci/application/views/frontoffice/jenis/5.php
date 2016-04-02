<?php
/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 2:11
 */
?>


        <section class="panel panel-white" >
            <header class="panel-heading">
                <h3 class="panel-title">Lokasi Bangunan Yang Dimohonkan</h3>
            </header>
            <div class="panel-body">

				<div class="form-group">
				    <label class="col-sm-2 control-label">Jalan <span class="text-danger">*</span></label>
				    <div class="col-sm-5">
				        <input type="text" name="alamat_jalan" class="form-control">
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-sm-2 control-label">Dusun <span class="text-danger">*</span></label>
				    <div class="col-sm-5">
				        <input type="text" name="alamat_dusun" class="form-control">
				    </div>
				</div>

				<div class="form-group">
				    <label class="col-sm-2 control-label">Desa <span class="text-danger">*</span></label>
				    <div class="col-sm-5">
				        <select name="alamat_desa_id" class="form-control" required="">
                            <?php foreach($desa as $de){ ?>
                                <option value="<?php echo $de['id_desa'] ?>"><?php echo $de['nama_desa'] ?></option>
                            <?php } ?>
                        </select>
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-sm-2 control-label">Status Tanah <span class="text-danger">*</span></label>
				    <div class="col-sm-5">
				        <input type="text" name="status_tanah" class="form-control">
				    </div>
				</div>
            </div>
       	</section>

       	<section class="panel panel-white" >
       	    <header class="panel-heading">
       	        <h3 class="panel-title">Letak Bangunan Terhadap Garis-garis Sempadan</h3>
       	    </header>
       	    <div class="panel-body">
				<div class="form-group">
				    <label class="col-sm-2 control-label">Sempadan Jalan <span class="text-danger">*</span></label>
				    <div class="col-sm-3">
				        <input type="text" name="sempadan_jalan" class="form-control" data-parsley-type="number" required="">
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-sm-2 control-label">Sempadan Pantai <span class="text-danger">*</span></label>
				    <div class="col-sm-3">
				        <input type="text" name="sempadan_pantai" class="form-control" data-parsley-type="number" required="">
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-sm-2 control-label">Sempadan Jurang <span class="text-danger">*</span></label>
				    <div class="col-sm-3">
				        <input type="text" name="sempadan_jurang" class="form-control" data-parsley-type="number" required="">
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-sm-2 control-label">Sempadan Sungai <span class="text-danger">*</span></label>
				    <div class="col-sm-3">
				        <input type="text" name="sempadan_sungai" class="form-control" data-parsley-type="number" required="">
				    </div>
				</div>

       	    </div>
       	</section>

       	<section class="panel panel-white" >
       	    <header class="panel-heading">
       	        <h3 class="panel-title">Konstruksi Bangunan</h3>
       	    </header>
       	    <div class="panel-body">
				<div class="form-group">
				    <label class="col-sm-2 control-label">Dasar / Pondasi <span class="text-danger">*</span></label>
				    <div class="col-sm-3">
				        <input type="text" name="dasar" class="form-control" required="">
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-sm-2 control-label">Dinding <span class="text-danger">*</span></label>
				    <div class="col-sm-3">
				        <input type="text" name="dinding" class="form-control" required="">
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-sm-2 control-label">Sloof <span class="text-danger">*</span></label>
				    <div class="col-sm-3">
				        <input type="text" name="sloof" class="form-control" required="">
				    </div>
				</div>
				
				<div class="form-group">
				    <label class="col-sm-2 control-label">Jumlah Lantai <span class="text-danger">*</span></label>
				    <div class="col-sm-3">
				        <input type="text" name="jumlah_lantai" class="form-control" data-parsley-type="number" required="">
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-sm-2 control-label">Lantai <span class="text-danger">*</span></label>
				    <div class="col-sm-3">
				        <input type="text" name="lantai" class="form-control" required="">
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-sm-2 control-label">Plapond <span class="text-danger">*</span></label>
				    <div class="col-sm-3">
				        <input type="text" name="plapond" class="form-control" required="">
				    </div>
				</div>

				<div class="form-group">
				    <label class="col-sm-2 control-label">Ring <span class="text-danger">*</span></label>
				    <div class="col-sm-3">
				        <input type="text" name="ring" class="form-control" required="">
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-sm-2 control-label">Kap <span class="text-danger">*</span></label>
				    <div class="col-sm-3">
				        <input type="text" name="kap" class="form-control" required="">
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-sm-2 control-label">Usuk <span class="text-danger">*</span></label>
				    <div class="col-sm-3">
				        <input type="text" name="usuk" class="form-control" required="">
				    </div>
				</div>
				<div class="form-group">
				    <label class="col-sm-2 control-label">Atap <span class="text-danger">*</span></label>
				    <div class="col-sm-3">
				        <input type="text" name="atap" class="form-control" required="">
				    </div>
				</div>


       	    </div>
       	</section>

    