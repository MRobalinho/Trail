<?php
//including the database connection file
include_once("dbconnect.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$result = mysqli_query($con, "DELETE FROM dadoscanyons WHERE id=$id");
	if ($result){
		//display success message
		echo "<font color='green'>Eliminado com sucesso.";
		echo"<script language='javascript' type='text/javascript'>alert('Eliminado com sucesso registo  $id ');window.location.href='registo_canyons.php'</script>";
		sleep(2);
	}else{
		echo("Error description: " . mysqli_error($con));
		sleep(2);
	}
//redirecting to the display page (index.php in our case)
//header("Location:registo_canyons.php");
?>

