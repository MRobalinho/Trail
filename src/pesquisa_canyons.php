<?php
//including the database connection file
 include_once("dbconnect.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($con, "SELECT * FROM dadoscanyons ORDER BY nomeserra DESC"); // using mysqli_query instead
if($result){
//    echo "<p>Leitura DB: $databaseName</p>";
	}
else{
	echo("Error description: " . mysqli_error($con));
    }
$login_cookie = $_COOKIE["user"];
$titulo = 'Lista de Canyons';
$cabecalho = '<p><strong>Lista de Canyons </strong></p>';
$css = '<link rel="stylesheet" type="text/css" href="css/style.css"';
echo "</p><font color='blue'>Bem-Vindo, $login_cookie </font></p>";
?>
<html>
<head>	
<title><?php echo $titulo; ?></title>
</head>
<body>
<?php echo $cabecalho; ?>
<!-- <a href="add_canyon.html">Novo Registo</a><br/><br/>  -->
<a href="pesquisa_canyon.html">SAIR</p>
<div style="overflow:scroll;height:240px;width:95%;overflow:auto">
<table width='100%' border=0>
	<tr bgcolor="#ccccff">
		<td>Canyon</td>
		<td>Serra</td>
		<td>Localização</td>
		<td>Mais Dados</td>
	</tr>
	<?php 
	 while($res = mysqli_fetch_array($result)) { 	
		echo "<tr>";
		echo "<td>".$res['canyon']."</td>";
		echo "<td>".$res['nomeserra']."</td>";
		echo "<td>".$res['localizacao']."</td>";	
		echo "<td><a href=\"ver_canyon.php?id=$res[id]\">Ver Mais</a>";		
	}
	?>
</table>
</div> 
</body>
</html>
