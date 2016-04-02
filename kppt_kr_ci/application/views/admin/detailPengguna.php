<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">
            <i class="ico ico-users"></i>  Detail Pengguna
        </h4>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Daftar Pengguna</h3>
    </div>
    <table class="table">
		<tr>
			<td>Username</td>
			<td><?php echo $pengguna['username']; ?></td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td><?php echo $pengguna['nama_lengkap']; ?></td>
		</tr>
		<tr>
			<td>Jabatan</td>
			<td><?php echo $pengguna['nama_jabatan']; ?></td>
		</tr>
		<tr>
			<td>Login Terakhir</td>
			<td><?php echo $pengguna['last_login']; ?></td>
		</tr>
    </table>
</div>
