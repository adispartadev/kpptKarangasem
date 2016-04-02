        <section class="panel panel-white" >
            <header class="panel-heading">
                <h3 class="panel-title">Lokasi Bangunan Yang Dimohonkan</h3>
            </header>
            <div class="panel-body">
				<table class="table">
					<tr>
				    <td>Jalan</td>
				    <td>
				        <?php echo tampil_data_exc($kelengkapan['alamat_jalan']) ?>
				    </td>
				</tr>
					<tr>
				    <td>Dusun</td>
				    <td>
				        <?php echo tampil_data_exc($kelengkapan['alamat_dusun']) ?>
				    </td>
				</tr>
				</tr>
					<tr>
				    <td>Status Tanah</td>
				    <td>
				        <?php echo tampil_data_exc($kelengkapan['status_tanah']) ?>
				    </td>
				</tr>

				</table>
            </div>
       	</section>

       	<section class="panel panel-white" >
       	    <header class="panel-heading">
       	        <h3 class="panel-title">Letak Bangunan Terhadap Garis-garis Sempadan</h3>
       	    </header>
       	    <div class="panel-body">
       	    	<table class="table">
					<tr>
						<td>Sempadan Jalan</td>
						<td><?php echo tampil_data_exc($kelengkapan['sempadan_jalan']) ?></td>
					</tr>
					<tr>
						<td>Sempadan Pantai</td>
						<td><?php echo tampil_data_exc($kelengkapan['sempadan_pantai']) ?></td>
					</tr>
					<tr>
						<td>Sempadan Jurang</td>
						<td><?php echo tampil_data_exc($kelengkapan['sempadan_jurang']) ?></td>
					</tr>
					<tr>
						<td>Sempadan Sungai</td>
						<td><?php echo tampil_data_exc($kelengkapan['sempadan_sungai']) ?></td>
					</tr>
       	    	</table>
       	    </div>
       	</section>

       	<section class="panel panel-white" >
       	    <header class="panel-heading">
       	        <h3 class="panel-title">Konstruksi Bangunan</h3>
       	    </header>
       	    <div class="panel-body">
       	    <table class="table">
				<tr>
				    <td>Dasar / Pondasi </td>
				    <td>
				        <?php echo tampil_data_exc($kelengkapan['dasar']) ?>
				    </td>
				</tr>
				<tr>
				    <td>Dinding </td>
				    <td>
				        <?php echo tampil_data_exc($kelengkapan['dinding']) ?>
				    </td>
				</tr>
				<tr>
				    <td>Sloof </td>
				    <td>
				        <?php echo tampil_data_exc($kelengkapan['sloof']) ?>
				    </td>
				</tr>
				
				<tr>
				    <td>Jumlah Lantai </td>
				    <td>
				        <?php echo tampil_data_exc($kelengkapan['jumlah_lantai']) ?>
				    </td>
				</tr>
				<tr>
				    <td>Lantai </td>
				    <td>
				        <?php echo tampil_data_exc($kelengkapan['lantai']) ?>
				    </td>
				</tr>
				<tr>
				    <td>Plapond </td>
				    <td>
				        <?php echo tampil_data_exc($kelengkapan['plapond']) ?>
				    </td>
				</tr>

				<tr>
				    <td>Ring </td>
				    <td>
				        <?php echo tampil_data_exc($kelengkapan['ring']) ?>
				    </td>
				</tr>
				<tr>
				    <td>Kap </td>
				    <td>
				        <?php echo tampil_data_exc($kelengkapan['kap']) ?>
				    </td>
				</tr>
				<tr>
				    <td>Usuk </td>
				    <td>
				        <?php echo tampil_data_exc($kelengkapan['usuk']) ?>
				    </td>
				</tr>
				<tr>
				    <td>Atap </td>
				    <td>
				        <?php echo tampil_data_exc($kelengkapan['atap']) ?>
				    </td>
				</tr>
			</table>

       	    </div>
       	</section>