<div id="loadingTarget">
	<section class="panel panel-white">
	    <header class="panel-heading">
	        <h3 class="panel-title">Ijin yang Telah Diperoleh</h3>
	    </header>
	    <div class="panel-body" id="ijinTarget">

	    </div>
	</section>	
</div>

<script>
	$(function(){
		$.get('<?php echo base_url('ajax/buat_permohonan_terpenuhi') ?>', function(e){
			$('#ijinTarget').html(e);
		})
	});
</script>