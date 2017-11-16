<?php
include('conexion.php');

if ($_FILES['csv']['size'] > 0) {

	$csv = $_FILES['csv']['tmp_name'];

	$handle = fopen($csv,'r');

	while ($data = fgetcsv($handle,1000,",","'")){

		if ($data[0]) { 

	        mysql_query("INSERT INTO persona(email, nombre, apellido, codigo) VALUES('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."') ");
		
		}

	}

	echo 'OK';

}
?>