<html>
<head>
	<link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<tr> 
<!--	<td><img src="..\img\TrailApp2.jpg" alt=\ /><b> Lista de Canyons</b>  </p> -->
<td><img src="https://canyonsportugal.000webhostapp.com/img/TrailAPP2.jpg" alt=\ /><b> Lista de Canyons</b>  </p>
</tr>
<!--   Inicio traducao -->
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'pt', includedLanguages: 'en,es,fr,pt', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!--   Fim traducao --> 
</html>
<?php

//including the database connection file
include_once("dbconnect.php");
// echo "<h1>Lista de Canyons </h1>";

//$login_cookie = $_COOKIE["user"];
//echo "</p><font color='blue'>Bem-Vindo, $login_cookie </font></p>";
if(isset($_GET['canyon'])){
	$canyon=$_GET['canyon'];
	$nomeserra=$_GET['serra'];	
	$localizacao=$_GET['localizacao'];
}else{
	$canyon="*";
	$nomeserra="*";	
	$localizacao="*";	
}
echo "</p>";
echo "Canyon: $canyon  , Serra:$nomeserra  , Localizacao: $localizacao </p>";

// substituir * por % para fazer a query
$canyon = str_replace("*", "%", $canyon); 
$nomeserra = str_replace("*", "%", $nomeserra); 
$localizacao = str_replace("*", "%", $localizacao); 

$stq  = "SELECT * FROM dadoscanyons WHERE ID > 0  "; 
if ($canyon != ''){
	$stq = $stq . " AND canyon LIKE '$canyon' "; 
}
if ($nomeserra != ''){
	$stq = $stq . " AND nomeserra LIKE '$nomeserra' "; 
}
if ($localizacao != ''){
	$stq = $stq . " AND localizacao LIKE '$localizacao' "; 
}
$stq = $stq . " ORDER BY nomeserra ASC;";

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
<title> Lista de Canyons </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
<!-- Botao para SAIR -->
<form> <button type="submit" formaction="pesquisa_canyon.html">Página Anterior</button> </form>
<div style="overflow:scroll;height:20px;width:98%;overflow:auto">
	<table width='100%' border= 0px>
		<thead>
			<tr bgcolor="#ccccff">
			<th>----- Canyons de Portugal -----</th>
			</tr>
		</thead>
	</table>
</div> 
<!-- Define Cabecalho da tabela-->	
<div style="overflow:scroll;height:240px;width:98%;overflow:auto">
	<table width='100%' border= 0px>
		<thead>
			<tr bgcolor="#ccccff">
			<th>Id</th>
			<th>Canyon</th>
			<th>Serra</th>
			<th>Localização</th>
			<th>Mais Dados</th>
			</tr>
		</thead>
<!-- Define corpo da tabela -->		
	<tbody>
	<?php 
	 while($res = mysqli_fetch_array($result)) { 	

		echo "<tr>";
		echo "<td>".$res['id']."</td>";
		echo "<td>".$res['canyon']."</td>";
		echo "<td>".$res['nomeserra']."</td>";
		echo "<td>".$res['localizacao']."</td>";	
		echo "<td><a href=\"ver_um_canyon.php?id=$res[id]\">Ver Mais</a></td>";		
		echo "</tr>";
	}
	?>
		</tbody>
	</table>
</div> 
</body>
</html>
