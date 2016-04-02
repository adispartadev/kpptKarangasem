<?php
	$db_host = 'localhost';
	$db_name = 'kpptkr_ng';
	$db_user = 'root';
	$db_password = '';


	try{
		$db = new PDO("mysql:host=".$db_host."; dbname=".$db_name, $db_user, $db_password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
		die();
	}
	$record = '';
	$file = 'desa.csv';
	$handle = fopen($file, "r");
	$i = 1;
	echo '<pre>';
	while($data = fgetcsv($handle, 1000, ",", "'")){

		$record .= "(";		
		$record .= "'".$data[0]."',";					
		$record .= "'".$data[1]."',";									
		$record .= "'".$data[2]."'";																	
		$record .= "),";
		$i++;
	}

	$record = rtrim($record, ",");
	$sql = "INSERT INTO desa (id_desa, nama_desa, id_kecamatan) VALUES ".$record;
	$query = $db->query($sql);

?>