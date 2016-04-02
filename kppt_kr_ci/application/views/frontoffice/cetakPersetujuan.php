<style type="text/css">
	.body{
		font-size: 0.8em;
	}
	h1, h2, h3, h4, p{
		line-height: 10px;
	}
	h1{
		font-size: 1.4em;
	}
	h2{
		font-size: 1.3em;
	}
	h3{
		font-size: 1em;
	}
	h4{
		font-size: 1em;
	}

	.panel{
		border: 1px solid #000;
		padding: 10px; 
		margin: 30px 10px;
	}

	.panel .panel-heading{
		margin-top: -20px;
		background: #FFF;
		width: auto;
		display: inline-block;
		padding: 0 6px;
	}
	table{
		width: 100%;
	}
	table td{
		padding: 0;
		margin: 0;
		text-align: left;
	}
</style>
<div class="body">
<table style="width: 100%;">
	<tr>
		<td width="70px;">
			<img style="width: 100%;" src="<?php echo $logo ?>">
		</td>
		<td>
			<center>
				<h2>PEMERINTAH KABUPATEN KARANGASEM</h2>
				<h1>KANTOR PELAYANAN PERIZINAN TERPADU</h1>
				<i style="line-height: 0">Gedung Unit 11 Civic Centre 1, Jln. Kapten Jaya Tirta-Amlapura, Telp/Fax (0362) 23564</i>
			</center>
		</td>
	</tr>
</table>
<hr>

<center>
	<h3>SURAT IZIN BUPATI KARANGASEM<h3>
	<h2>NOMOR : 01/KPPT/2015</h2>
	<h3>TENTANG</h3>
	<h3><?php echo $permohonan_ijin['jenis_ijin'] ?></h3>
</center>

Dasar :
	<ol>
		<?php 
			foreach ($dasar as $key => $value) {
				echo '<li>'.$value['isi'].';</li>';
			}
			echo '<li>'.ucwords(strtolower($permohonan_ijin['jenis_ijin'])).'&nbsp;
						Nomor: '.$permohonan_ijin['no_ijin'].'&nbsp;
						Tanggal '.getDates($permohonan_ijin['tgl_pengajuan']).'&nbsp;
						atas nama '.$permohonan_ijin['nama'].'&nbsp;
						yang di daftarkan di KPPT Pada Tanggal '.getDates($permohonan_ijin['tgl_pengajuan']).'.</li>';

		?>
		
	</ol>

	<br>
	<center>MENGIZINKAN</center>
	<br>

Kepada:
<br>

<div class="panel">
	<div class="panel-heading" style="width: 150px;">
		PENANGGUNG JAWAB
	</div>
	<div class="panel-body">
		<table style="width: 100%">
			<tr>
				<td style="width: 200px;">Nama</td>
				<td style="width: 10px;">:</td>
				<td><?php echo strtoupper($permohonan_ijin['nama']); ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?php 
						echo 'Jalan '. $permohonan_ijin['alamat_jalan']
								.', Kelurahan '.$permohonan_ijin['alamat_dusun'].', Kecamatan '.$permohonan_ijin['nama_desa']
								.', Kabupaten Karangasem'; ?>
				</td>
			</tr>
		</table>
	</div>
</div>


<div class="panel">
	<div class="panel-heading" style="width: 100px;">
		PERUSAHAAN 
	</div>
	<div class="panel-body">
		<table style="width: 100%">
			<tr>
				<td style="width: 200px;">Nama Badan Usaha</td>
				<td style="width: 10px;">:</td>
				<td><?php echo strtoupper($permohonan_ijin['nama_perusahaan']); ?></td>
			</tr>

			<tr>
				<td>Nama Usaha</td>
				<td>:</td>
				<td><?php echo strtoupper($permohonan_ijin['nama_perusahaan']); ?></td>
			</tr>
			<tr>
				<td>KBLI</td>
				<td>:</td>
				<td><?php echo $permohonan_ijin['KBLI']; ?></td>
			</tr>


			<tr>
				<td>Lokasi</td>
				<td>:</td>
				<td><?php 
						echo $permohonan_ijin['alamat_perusahaan']; ?>
				</td>
			</tr>


		</table>
	</div>
</div>

Izin Wajib Di Daftar Ulang Pada Tanggal : 15 Januari 2016<br>
Ketentuan lain : Ada Pada Halaman Belakang


<table style="text-align: center;">
	<tr>
		<td>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</td>
		<td>
			Ditetapkan di : Amlapura<br>
			Pada Tanggal : <br>
			a.n BUPATI KARANGASEM<br>
			Kepala Kantor Pelayanan Perizinan Terpadu<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<center>
				<h3><strong style="border-bottom: 1px solid #000;">Ir. I KETUT SUMANTRA</strong></h3>
				<p style="line-height: 0px;">Pembina Tingkat I</p>
				NIP. 1961110010199003 1 010
			</center>
		</td>
	</tr>
</table>
</div>