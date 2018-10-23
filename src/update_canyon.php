<html>
<head>
   <title>Alteracao de Canyon</title>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body bgcolor="white">

<h1>Alteracao de Canyon</h1>
</body>
</html>

<?php
//including the database connection file
 include_once("dbconnect.php");
 

$id = $_GET['id'];
$canyon=$_GET['canyon'];
$nomeserra=$_GET['nomeserra'];	
$localizacao=$_GET['localizacao'];	

?>
<html>
</body>
	<table width='80%' border=0>

	<tr bgcolor="#ccccff">
		<td>Codigo</td>
		<td>Descricao</td>
	</tr>
<?php 
		echo "<tr>";
		echo "<td>Id</td>";
		echo "<td>$id</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>Canyon</td>";
		echo "<td>$canyon</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>Nome da Serra<br/>";
		echo "<td>$nomeserra</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>Localizacao</td>";
		echo "<td>$localizacao</td>";
		echo "</tr>";
	?>
	</table>
</body>
</html>

<?php	

// checking empty fields
if(empty($localizacao) OR empty($canyon) OR empty($nomeserra)) {	
		
	if(empty($nomeserra)) {
		echo "<font color='red'>Nome da Serra esta vazio.</font><br/>";
	}
	
	if(empty($canyon)) {
		echo "<font color='red'>Canyon esta vazio.</font><br/>";
	}
	
	if(empty($localizacao)) {
		echo "<font color='red'>Localizacao esta vazio.</font><br/>";
	}		
} else {	
	//updating the table
	$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
	$result = mysqli_query($con, "UPDATE dadoscanyons SET canyon='$canyon',nomeserra='$nomeserra',localizacao='$localizacao' WHERE id='$id'");
	if ($result){
			//display success message
			echo "<font color='green'>Alteracao bem sucedida.";
			echo"<script language='javascript' type='text/javascript'>alert('Registado com sucesso!');window.location.href='menu.php'</script>";
		    sleep(1);
		}else{
			echo("Error description: " . mysqli_error($con));
			echo"<script language='javascript' type='text/javascript'>alert('Erro no registo!');window.location.href='menu.php'</script>";
			sleep(1);
		}
	//redirectig to the display page. In our case, it is index.php
	//header("Location: lista_canyons.php");
}

?>
<html>
<body>
<!-- Botao para SAIR -->
<form method="GET" action="lista_canyons.php">
    <input type="hidden" name="file" value="">
    <button>    SAIR     </button>
</form> 
	<a href="lista_canyons.php">Home</a>
</body>	
</html>