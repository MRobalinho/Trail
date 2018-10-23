<!-- Bloco para ver um Canyon -->
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
	<link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<tr> 
<!--	<td><img src="..\img\TrailApp2.jpg" alt=\ /><b>  Dados de Canyons</b>  </p> -->
<td><img src="https://canyonsportugal.000webhostapp.com/img/TrailAPP2.jpg" alt=\ /><b>  Dados de Canyons</b>  </p>
</tr>
<!--   Inicio traducao -->
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'pt', includedLanguages: 'en,es,fr,pt', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!--   Fim traducao -->
<h1></h1>  
<title>Dados de Canyon</title>
<body bgcolor="white">
<!-- <h1>Dados de Canyon</h1> -->
</html>

<?php
//including the database connection file
 include_once("dbconnect.php");
 include_once('import_functions.php');


if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	$canyon=$_POST['canyon'];
	$nomeserra=$_POST['nomeserra'];	
	$localizacao=$_POST['localizacao'];	
	$id = $_GET['id'];
	
	$povoacaoinicio = $_GET['povoacaoinicio'];
	$povoacaofim = $_GET['povoacaofim'];
	$dificuldade = $_GET['dificuldade'];
	$maiorrapel = $_GET['maiorrapel'];
	$horarioacesso = $_GET['horarioacesso'];
	$horarioretorno = $_GET['horarioretorno'];
	$descida = $_GET['descida'];
	$desnivel = $_GET['desnivel'];
	$croqui = $_GET['croqui'];
	$observacoes = $_GET['observacoes'];
	$geolatitude = $_GET['geolatitude'];
	$geolongitude = $_GET['geolongitude'];

	// checking empty fields
	if(empty($localizacao) || empty($canyon) || empty($nomeserra)) {	
			
		if(empty($nomeserra)) {
			echo "<font color='red'>Nome da Serra esta vazio.</font><br/>";
		}
		
		if(empty($canyon)) {
			echo "<font color='red'>Canyon esta vazio.</font><br/>";
		}
		
		if(empty($localizacao)) {
			echo "<font color='red'>Localizacao esta vazio.</font><br/>";
		}		
	}
}

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
	$filename    = $res['croqui'];
	$povoacaoinicio = $res['povoacaoinicio'];
	$povoacaofim = $res['povoacaofim'];
	$dificuldade = $res['dificuldade'];
	$maiorrapel = $res['maiorrapel'];
	$horarioacesso = $res['horarioacesso'];
	$horarioretorno = $res['horarioretorno'];
	$descida = $res['descida'];
	$desnivel = $res['desnivel'];
	$croqui = $res['croqui'];
	$observacoes = $res['observacoes'];
	$geolatitude = $res['geolatitude'];
	$geolongitude = $res['geolongitude'];
	
	$pesquisagoogle = $povoacaoinicio.",".$localizacao;
	$pesquisagoogle = str_replace(" ", "+", $pesquisagoogle);
}
?>
<!-- Bloco para ver um Canyon -->
<html>
<body bgcolor="white">

<!-- Botao para SAIR -->
<form> <button type="submit" formaction="lista_canyons.php">Página Anterior</button> </form>
<!-- Botao para PDF -->
<form method="GET" action="ver_pdf.php">
	<input type="hidden" name="file" value="<?php echo $filename;?>" >
	<button>VER PDF</button>
</form>
<!-- Botao para Google Mapas -->
<form method="GET" action="Google_map_canyons.php">
    <input type="hidden" name="local" value="<?php echo $pesquisagoogle;?>" >
	<input type="hidden" name="canyon" value="<?php echo $canyon;?>" >
	<input type="hidden" name="nomeserra" value="<?php echo $nomeserra;?>" >
	<input type="hidden" name="povoacaoinicio" value="<?php echo $povoacaoinicio;?>" >
	<input type="hidden" name="geolatitude" value="<?php echo $geolatitude;?>" >
	<input type="hidden" name="geolongitude" value="<?php echo $geolongitude;?>" >
	<input type="hidden" name="id" value="<?php echo $id;?>" >
	
    <input type="hidden" name="pesquisagoogle" value="<?php echo $pesquisagoogle;?>" >
    <button>Google Mapas</button>
</form>

<!-- Tabela cabecalho--> 
<html>
</body>

 <div style="overflow:scroll;height:240px;width:95%;overflow:auto">
	<table width='100%' border=0>
	<thead>
		<tr bgcolor="#ccccff">
			<th>Codigo</th>
			<th>Descrição</th>
		</tr>
	</thead>
	<!-- Tabela corpo--> 
<?php 
	mostra_canyon($id, $canyon, $nomeserra, $localizacao,$povoacaoinicio,$povoacaofim,
	$dificuldade,$maiorrapel,$horarioacesso,$horarioretorno,$descida,$desnivel,$croqui,
	$observacoes, $geolatitude,$geolongitude);
?>
	</table>
 </div> 
</body>
</html>

