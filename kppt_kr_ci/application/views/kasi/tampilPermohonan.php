<?php
/**
 * Created by PhpStorm.
 * User: spartan
 * Date: 24/02/16
 * Time: 16:32
 */
?>
<link rel="stylesheet" href="<?php  echo base_url('resources/plugins/datatables/css/datatables.css') ?>">
<link rel="stylesheet" href="<?php  echo base_url('resources/plugins/datatables/css/tabletools.css') ?>">
<script type="text/javascript" src="<?php  echo base_url('resources/plugins/datatables/js/jquery.dataTables.js') ?>"></script>
<script type="text/javascript" src="<?php  echo base_url('resources/plugins/datatables/js/datatables-bs3.js') ?>"></script>


<div class="page-header page-header-block">
    <div class="page-header-section">
        <h4 class="title semibold">Daftar Permohonan Ijin</h4>
    </div>
    <div class="page-header-section">
        <!-- Toolbar -->
        <div class="toolbar">
            <ol class="breadcrumb breadcrumb-transparent nm">
                <li><a href="javascript:void(0);">Component</a></li>
                <li class="active">Tabs &amp; accordion</li>
            </ol>
        </div>
        <!--/ Toolbar -->
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Daftar Ijin</h3>
    </div>
    <table id="permohonanIjinTable" class="table">
        <thead>
        <tr>
            <td>No. Ijin</td>
            <td>Tanggal Pengajuan</td>
            <td>Jenis Permohonan</td>
            
            <td>Pemohon</td>
            <td>Perusahaan</td>

            <td>Status</td>
            <td>Proggres</td>
            <td></td>
        </tr>
        </thead>
    </table>
</div>
<?php
    $pr = '[';
    foreach (progress_permohonan() as $key => $value) {
        $pr .= "'".$value."',";
    }
    $pr = rtrim($pr, ',');
    $pr .= ']';

    $jenis_permohonan = '[';
    foreach (jenis_permohonan(null) as $key => $value) {
        $jenis_permohonan .= "'". $value . "',";
    }
    $jenis_permohonan = rtrim($jenis_permohonan, ',');
    $jenis_permohonan .=']';
?>
<script>
    $(function(){
        
        var progress_stat = <?php echo $pr; ?>;
        var jenis_permohonan = <?php echo $jenis_permohonan; ?>;
        var date_options = {
            weekday: "long", year: "numeric", month: "short",
            day: "numeric", hour: "2-digit", minute: "2-digit"
        };

        $('#permohonanIjinTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url" : "<?php echo base_url('frontoffice/permohonan-ijin/ambil-data?status=3') ?>",
                "type" : "POST"
            },
            "fnDrawCallback": function (oSettings) {
                $('[data-toggle="tooltip"]').tooltip(); 
            },
            columns : [
                {data : "no_ijin"},
                {
                    data : "tgl_pengajuan",
                    render : function(data, type, full, meta){
                        var date = new Date(data);
                        return date.toLocaleTimeString("id", date_options);
                    }
                },
                {
                    data : "jenis_permohonan",
                    render : function(data, type, full, meta){
                        return jenis_permohonan[data];
                        // return data;
                    }
                },
                {
                    data : "nama_pemohon",
                    render : function(data, type, full, meta){
                        if (data == null || data == ''){
                            return '<label class="label label-danger">Belum terdata</label>';
                        }
                        return '<label class="label label-success">Sudah terdata</label>';
                    }
                },
                {
                    data : "nama_perusahaan",
                    render : function(data, type, full, meta){
                        if (data == '' || data == null){
                            return '<label class="label label-danger">Belum terdata</label>';
                        }
                        return '<label class="label label-success">Sudah terdata</label>';
                    }
                },
                {
                    data : "type",
                    render : function(data, type, full, meta){
                        if (data == 1){
                            return '<label class="label label-primary">Selesai</label>';
                        }
                        else{
                            return '<label class="label label-info">Draft</label>';
                        }
                    }
                },
                {
                    data : "progress",
                    render : function(data, type, full, meta){
                        return '<a data-toggle="tooltip" title="'+progress_stat[data]+'"><div class="progress progress-xs nm"><div class="progress-bar progress-bar-info" style="width:'+ (data / 6) * 100  +'%;"></div></div></a>';
                    }
                },
                {data :  "aksi"}
            ]

        });
    });
</script>