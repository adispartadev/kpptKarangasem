<style type="text/css">
	.text-center{
		text-align: center;
	}
</style>
<h1 class="text-center">Tanda Terima Berkas</h1>
<h2 class="text-center"><?php echo $permohonan_ijin['jenis_ijin'] ?></h2>
<hr>

<table style="width: 100%">
	<tr>	
		<td>Jenis Permohonan</td>
		<td>:</td>
		<td>BARU</td>
	</tr>
	<tr>	
		<td>No. Registrasi</td>
		<td>:</td>
		<td><?php echo $permohonan_ijin['no_ijin'] ?></td>
	</tr>
	<tr>	
		<td>Tanggal Terima</td>
		<td>:</td>
		<td><?php echo $permohonan_ijin['created_at']; ?></td>
	</tr>
	<tr>	
		<td>Nama Pemohon</td>
		<td>:</td>
		<td><?php echo $permohonan_ijin['nama'] ?></td>
	</tr>
	<tr>	
		<td>No Permohonan</td>
		<td>:</td>
		<td>-</td>
	</tr>
	<tr>	
		<td>Tanggal Permohonan</td>
		<td>:</td>
		<td><?php echo $permohonan_ijin['tgl_pengajuan']; ?></td>
	</tr>
	<tr>	
		<td>Nama Perusahaan</td>
		<td>:</td>
		<td><?php echo $permohonan_ijin['nama_perusahaan']; ?></td>
	</tr>
	<tr>	
		<td>NPWP</td>
		<td>:</td>
		<td><?php echo $permohonan_ijin['npwp']; ?></td>
	</tr>
	<tr>	
		<td>Kelengkapan Administrasi</td>
		<td>:</td>
		<td></td>
	</tr>
</table>
<table style="width: 100%">
	<?php foreach ($syarat as $key => $value) {
		?>
			<tr>
				<td><?php echo $key + 1; ?></td>
				<td><?php echo $value['syarat'] ?></td>
			</tr>
		<?php
	} ?>
</table>
<br>
<br>
<br>
<br>
<img style="width: 100px;" src="<?php echo $base64; ?>">
<br>
<br>

<table style="text-align: center;">
	<tr>
		<td colspan="2"></td>
		<td class="text-center">Amplapura, 23 Pebruary 2016</td>
	</tr>
	<tr>
		<td class="text-center">Pemohon</td>
		<td style="color: #FFF;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
		</td>
		<td class="text-center">Penerima</td>
	</tr>
	<tr>
		<td colspan="3">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
		</td>
	</tr>
	<tr>
		<td class="text-center"><?php echo strtoupper($permohonan_ijin['nama']) ?></td>
		<td></td>
		<td class="text-center"><?php echo $this->session->userdata['pengguna']['nama']; ?></td>
	</tr>
	<tr>
		<td>Catatan : </td>
		<td></td>
		<td>NIP : <?php echo $this->session->userdata['pengguna']['NIP']; ?></td>
	</tr>
</table>
