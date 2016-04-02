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
                <h3 class="panel-title">Apotek</h3>
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Apotek <span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <input type="text" name="nama_apotek" class="form-control" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">No. Telp <span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <input type="text" name="no_telp" class="form-control" required="">
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
            </div>
        </section>

        <section class="panel panel-white">
            <header class="panel-heading">
                <h3 class="panel-title">Sarana</h3>
            </header>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Sarana <span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <select name="status_sarana" onchange="getVal(this)" class="form-control" required="">
                            <option value="Milik Sendiri">Milik Sendiri</option>
                            <option value="Milik Pihak Lain">Milik Pihak Lain</option>
                        </select>
                    </div>
                </div>

                <div id="ket_sarana" style="display:none;">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Pemilik Sarana <span class="text-danger">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" name="nama_pemilik_sarana" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat <span class="text-danger">*</span></label>
                        <div class="col-sm-5">
                            <input type="text" name="alamat_pemilik_sarana" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">NPWP <span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <input type="text" name="npwp_sarana" class="form-control">
                    </div>
                </div>
            </div>

        </section>

   

<script type="text/javascript">
    function getVal(sel){
        var value = sel.value;
        if (value == 'Milik Pihak Lain'){
            $('#ket_sarana').slideDown();
            $('#ket_sarana input').each(function(){
                $(this).attr("required", "true");
            });
        }
        else{
            $('#ket_sarana').slideUp();
            $('#ket_sarana input').each(function(){
                $(this).attr("required", "false");
            });
        }
    }
</script>