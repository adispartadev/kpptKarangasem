<?php
/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 0:48
 */
?>
        </div>
        <a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
    </section>
</body>

<?php
$parent = $this->uri->segment(2);
if ($parent == ''){
    $parent = 'dashboard';
}

$child = $this->uri->segment(3);
if ($child == ''){
    $child = 'dashboard';
}
?>
<!-- START modal -->
<div id="deleteConfirmModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <div class=" ico-trash mb15 mt15" style="font-size:36px;"></div>
                <h3 class="semibold modal-title text-danger">Hapus Data</h3>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin untuk menghapus data ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="trueDelete">Hapus</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--/ END modal -->
<script>
    function confirmDelete(hrefTarget){
        $('#deleteConfirmModal').modal("show");
        $('#trueDelete').on("click", function(){
            window.location.href = hrefTarget;
        });
    }

    $(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
        $('.selectize').selectize();
        $('.sidebar .<?php echo $parent ?>').addClass('active open');
        $('.sidebar .<?php echo $parent ?> .submenu').addClass('in');
        $('.sidebar .<?php echo $parent ?> .<?php echo $child ?>').addClass('active');
    });

    toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "progressBar": false,
		  "positionClass": "toast-top-full-width",
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
	};

    <?php
        if($this->session->flashdata('item') != null) {
            $message = $this->session->flashdata('item');
            ?>
                toastr.<?php echo $message['class'] ?>("<strong><?php echo $message['message'] ?></strong>");
            <?php
        }
    ?>
</script>

<script>
    var id_jabatan = <?php echo $this->session->userdata['pengguna']['id_jabatan']; ?>;
    $(function(){
        $.ajax({
            'data' : {id_jabatan},
            'url' : '<?php echo base_url() ?>ajax/lihat_jumlah_notif',
            'type' : 'POST',
            success : function(e){
                if (e > 0){
                    $('#header-dd-notification .hasnotification').show();
                }
            }
        })
    });

    function lihat_notif(){
        $.ajax({
            'data' : {id_jabatan},
            'url' : '<?php echo base_url() ?>ajax/lihat_notif',
            'type' : 'POST',
            success : function(e){
                $('#notif_loading').fadeOut();
                $('#notif_target').html(e);
            }
        })
    }
</script>


</html>
