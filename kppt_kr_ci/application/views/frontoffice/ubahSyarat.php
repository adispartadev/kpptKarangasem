<?php
/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 4:12
 */
    
    $id_syarat_perpenuhi_ar = array();
    $i = 0;
    foreach ($syaratTerpenuhi as $key => $value) {
        $id_syarat_perpenuhi_ar[$i] = $value['id_syarat_ijin'];
        $i++;
    }
    
?>
<link rel="stylesheet" href="<?php echo base_url('resources/plugins/jquery-ui/css/jquery-ui.css') ?>">

<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">Permohonan Ijin</h4>
    </div>
</div>


<?php echo form_open_multipart('frontoffice/permohonan_ijin/ubah-data/syarat/'.$token.'/submit', 'class = "form-horizontal form-bordered" data-parsley-validate') ?>

    <section class="panel panel-default panel-border panel-shadow">
        <header class="panel-heading">
            <h3 class="panel-title">Ubah Pesyaratan Permohonan Ijin</h3>
        </header>
        <div class="panel-body">
            <table class="table">
                
                <?php 
                    foreach ($syarat as $key => $value) {
                ?>
                        <tr>
                            <td>
                                <?php 
                                    $k = array_search($value['id_syarat_ijin'], $id_syarat_perpenuhi_ar);
                                    if(false !== $k){
                                        echo '<input checked type="checkbox" class="chSyarat" value="'.$value['id_syarat_ijin'].'" name="check['.$value['id_syarat_ijin'].']">';
                                    }
                                    else{
                                        echo '<input type="checkbox" class="chSyarat" value="'.$value['id_syarat_ijin'].'" name="check['.$value['id_syarat_ijin'].']">';

                                    }
                                ?>
                            </td>
                            <td><?php echo $value['nama_syarat'] ?></td>
                        </tr>
                <?php                     
                    }
                ?>
            </table>
           
        </div>

        <br>
        <div class="btn-group">
            <button type="submit" name="type" class="btn btn-success btn-flat" ><i class="fa fa-save"></i> Simpan</button>
        </div>
    </section>


<script type="text/javascript" src="<?php echo base_url('resources/plugins/jquery-ui/js/jquery-ui.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('resources/plugins/inputmask/js/inputmask.js') ?>"></script>

<script>
    $(function(){
        $('.datepicker').datepicker({
            changeMonth: true,
            changeYear: true
        });
    });
</script>