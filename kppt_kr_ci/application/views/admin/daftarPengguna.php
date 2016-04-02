<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">
            <i class="ico ico-users"></i>  Daftar Pengguna
        </h4>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Daftar Pengguna</h3>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Login Terakhir</th>
                <th>Jabatan</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php  
                foreach ($pengguna as $key => $value) {
                    echo '<tr>
                            <td>'.$value['nama_lengkap'].'</td>
                            <td>'.$value['username'].'</td>
                            <td>'.$value['last_login'].'</td>
                            <td>'.$value['nama_jabatan'].'</td>
                            <td class="text-center">
                                <div class="toolbar">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-default">Aksi</button>
                                        <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" style="z-index:1000000;">
                                            <li><a href="'.base_url('admin/pengguna/lihat/'.$value['id_pengguna']).'"><i class="icon ico-pencil"></i>Lihat</a></li>
                                            <li><a href="javascript:void(0)" onclick=\'confirmDelete()\'  class="text-danger link-danger"><i class="icon ico-remove3"></i>Hapus</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>';
                }
            ?>
        </tbody>
    </table>

</div>