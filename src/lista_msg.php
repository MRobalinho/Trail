<html>
<head>
	<link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<tr> 
<!--	<td><img src="..\img\TrailApp2.jpg" alt=\ /><b> Lista de Canyons</b>  </p> -->
<td><img src="https://canyonsportugal.000webhostapp.com/img/TrailAPP2.jpg" alt=\ /><b> Lista de Canyons</b>  </p>
	
</tr>
</html>
<?php

//including the database connection file
include_once("dbconnect.php");
// echo "<h1>Lista de Canyons </h1>";

//$login_cookie = $_COOKIE["user"];
//echo "</p><font color='blue'>Bem-Vindo, $login_cookie </font></p>";
if(isset($_GET['data1'])){
	$data1=$_GET['data1'];
	$data2=$_GET['data2'];	
}else{
	$data1="*";
	$data2="*";	
}
echo "</p>";
echo "Da Data: $data1  , Até à Data :$data2  </p>";

// substituir * por % para fazer a query
$data1 = str_replace("*", "%", $data1); 
$data2 = str_replace("*", "%", $data2); 

$stq  = "SELECT * FROM comentarios WHERE ID > 0  "; 
if ($data1 != '%'){
	$stq = $stq . " AND data >= '$data1' "; 
}
else{	
	$stq = $stq . " AND data >= '1900-01-01' "; 
}
if ($data2 != '%'){
	$stq = $stq . " AND data <= '$data2' "; 
}
else{
	$stq = $stq . " AND data <= '9999-12-31' ";
}
$stq = $stq . " ORDER BY data ASC;";

//query data
//echo "Instrucao query: $stq"; 
$result = mysqli_query($con, $stq ); // using mysqli_query instead
if($result){
//    echo "<p>Leitura DB: $databaseName</p>";
	}
else{
	echo("Error description: " . mysqli_error($con));
    }
?>
<html>
<title> Lista de comentários </title>
<h1>Pesquisa de comentários</h1> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
<!-- Botao para SAIR -->
<form> <button type="submit" formaction="menuadmin.php">Página Anterior</button> </form>
<div style="overflow:scroll;height:20px;width:98%;overflow:auto">
	<table width='100%' border= 0px>
		<thead>
			<tr bgcolor="#ccccff">
			<th>----- Comentários deixados na aplicação -----</th>
			</tr>
		</thead>
	</table>
</div> 
<!-- Define Cabecalho da tabela-->	
<div style="overflow:scroll;height:240px;width:98%;overflow:auto">
	<table width='100%' border= 0px>
		<thead>
			<tr bgcolor="#ccccff">
			<th>Data </th>
			<th>Nome</th>
			<th>E-mail</th>
			<th>Mensagem</th>
			</tr>
		</thead>
<!-- Define corpo da tabela -->		
	<tbody>
	<?php 
	 while($res = mysqli_fetch_array($result)) { 	
		echo "<tr>";
		echo "<td>".$res['data']."</td>";
		echo "<td>".$res['nome']."</td>";
		echo "<td>".$res['email']."</td>";	
		echo "<td>".$res['mensagem']."</td>";	
		echo "</tr>";
	}
	?>
		</tbody>
	</table>
</div> 
</body>
</html>
