<?php
//including the database connection file
 include_once("dbconnect.php");


if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	$canyon=$_POST['canyon'];
	$nomeserra=$_POST['nomeserra'];	
	$localizacao=$_POST['localizacao'];	

	// checking empty fields
	if(empty($name) || empty($canyon) || empty($nomeserra)) {	
			
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
		}else{
		echo("Error description: " . mysqli_error($con));
		}
		//redirectig to the display page. In our case, it is index.php
		header("Location: pesquisa_canyon.html");
	}
}
?>
<?php
//getting id from url
$id = 0;
if ($id == 0){
$id = $_GET['id'];
}

//selecting data associated with this particular id
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$result = mysqli_query($con, "SELECT * FROM dadoscanyons WHERE id='$id'");
		if (!$result){
		//display  message
        echo("Error description: " . mysqli_error($con));
		} 
		
while($res = mysqli_fetch_array($result))
{
	$canyon      = $res['canyon'];
	$nomeserra   = $res['nomeserra'];
	$localizacao = $res['localizacao'];
}
?>
<html>
<head>
   <title>Dados de Canyon</title>
</head>
<body bgcolor="white">

<h1>Dados de Canyon</h1>
<?php echo"<font color='blue'> Registo de visualizado : $id</font></p>"; ?>
</body>
</html>

<body>
	<a href="pesquisa_canyon.html">SAIR</a>
	<br/><br/>
	
	<form name="form1" method="get" action="edit_canyon.php">
		<table border="0">
			<tr> 
				<td>Canyon</td>
				<td><input type="text" name="canyon" value=<?php echo $canyon;?> ></td>
			</tr>
			<tr> 
				<td>Serra</td>
				<td><input type="text" name="nomeserra" value=<?php echo $nomeserra;?>></td>
			</tr>
			<tr> 
				<td>Localização</td>
				<td><input type="text" name="localizacao" value=<?php echo $localizacao;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
		<!--		<td><input type="submit" name="update" value="Update"></td> -->
			</tr>
		</table>
	</form>
</body>
</html>
