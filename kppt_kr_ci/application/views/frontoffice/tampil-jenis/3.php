<?php
	if ($kelengkapan['id_lok'] != null){
?>

		<table class="table">
		    <tr>
		        <td>Luas</td>
		        <td><?php echo tampil_data_exc($kelengkapan['luas']); ?></td>
		    </tr>
		    <tr>
		        <td>Bukti Kepemilikan</td>
		        <td>
					<a target="_BLANK" href="<?php echo base_url('resources/upload/'.$kelengkapan['bukti_kepemilikan']) ?>">Lihat File</a>
		        </td>
		    </tr>
		    <tr>
		        <td>Alamat</td>
		        <td>
		        	<?php echo 'Jalan '.$kelengkapan['alamat_jalan'].', Kelurahan '.$kelengkapan['alamat_dusun']; ?>
		        </td>
		    </tr>
			<tr>
			    <td>Status Tanah</td>
			    <td><?php echo tampil_data_exc($kelengkapan['status_tanah']); ?></td>
			</tr>
			<tr>
			    <td>Pengguna Lahan Sekarang</td>
			    <td><?php echo tampil_data_exc($kelengkapan['penggunaan_lahan_skrng']); ?></td>
			</tr>

		</table>

<?php
	}
	else{
		echo '<p><span class="text-danger">*</span> Data kelengkapan permohonan masih kosong</p>';
	}
?>