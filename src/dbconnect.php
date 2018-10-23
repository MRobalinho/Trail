<?php
// - Conexao DB em https://files.000webhost.com/
$databaseHost = 'localhost';
$databaseName = 'id4371750_canyons';
$databaseUsername = 'id4371750_root';
$databasePassword = 'upt2017';
//  Conexão a BD em PC Local
$databaseHost = 'localhost';
$databaseName = 'canyons';
$databaseUsername = 'root';
$databasePassword = '';

$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
 
 	if ( !$con ) {
		die('Não foi possível conectar: ' . mysql_error().'</p>');
	}else{
	$t_text = "Conexão bem sucedida,db: $databaseName   ,   user: $databaseUsername</p>";	
//	echo $t_text;
	}

?>
