<?php
 ob_start();
?> 
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<tr> <td><img src="https://canyonsportugal.000webhostapp.com/img/TrailAPP2.jpg" alt=\ /><b> Alteração Canyons</b> </p> </tr>
<!-- <tr> <td><img src="..\img\TrailApp2.jpg" alt=\ /><b> Alteração Canyons</b> </p> </tr> -->
</html>
<?php
//including the database connection file
include_once("dbconnect.php");
include_once('import_functions.php');

$id = $_GET['id'];

// obter user
 if (isset($_COOKIE['user'])){
	 $login_cookie = $_COOKIE["user"];
 }else{
	 $login_cookie = $_COOKIE["user_entrada"];
 }	

// variaveis para erros 
$canyonErr = "";
$nomeserraErr = "";
$localizacaoErr = "";
	
if(isset($_GET['update'])){
	//echo "Faz UPDATE</p>";
	// Leitura das variaveis a partir do GET
	
	$id = $_GET['id'];
	$canyon=$_GET['canyon'];
	$nomeserra=$_GET['nomeserra'];	
	$localizacao=$_GET['localizacao'];	
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
	} else {	
		//updating the table
		$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
		
		$query = "UPDATE dadoscanyons SET canyon='$canyon',nomeserra='$nomeserra',localizacao='$localizacao',";
		$query = $query."povoacaoinicio='$povoacaoinicio', povoacaofim='$povoacaofim', dificuldade='$dificuldade',";
		$query = $query."maiorrapel='$maiorrapel',horarioacesso= '$horarioacesso',horarioretorno='$horarioretorno',";
		$query = $query."descida='$descida',desnivel='$desnivel',croqui='$croqui',geolatitude='$geolatitude',";	
		$query = $query."geolongitude='$geolongitude', observacoes='$observacoes',usersys='$login_cookie' WHERE id='$id'";	
	
	    //  echo "Query : $query";
	    query_canyon($con, $query);

		//redirectig to the display page. In our case, it is index.php
		header("Location: ver_um_canyon.php?id=$id");
	}
}

?>
<?php
//getting id from url
if ($id == 0){
$id = $_GET['id'];
}

	echo " Leitura de dados do Canyon: $id </p>";
//selecting data associated with this particular id
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
$result = mysqli_query($con, "SELECT * FROM dadoscanyons WHERE id='$id'");
	if (!$result){
		//display  message
        echo("Error description: " . mysqli_error($con));
	}else{
		//echo "Leitura OK.</p>"; 
	} 
		
while($res = mysqli_fetch_array($result))
{
	
	$canyon      = $res['canyon'];
	$nomeserra   = $res['nomeserra'];
	$localizacao = $res['localizacao'];
	/*
	echo "Registo :$canyon </p>"; 
	echo "Nome da serra: $nomeserra </p>";
	echo "Localizacao: $localizacao </p>";
	*/
	
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
}
?>
<html>
<head>
 <!--  <title>Alteracao de Canyon</title> -->
</head>
<style>
.error {color: #FF0000;}
</style>
<body bgcolor="white">

<!-- <h1>Alteracao de Canyon</h1> -->
<!--<h3>Altere os dados</h3> -->
<!--<?php echo"<font color='blue'> Registo a alterar : $id</font></p>"; ?> -->
</body>
</html>

<body>
	<!-- Botao para SAIR -->
	<form> <button type="submit" formaction="registo_canyons.php">Página Anterior</button> </form>
    <span class="error">* campo obrigatorio.</span>
	<form name="form1" method="get" action="edit_canyon.php">
		<table border="0">
			<tr> 
				<td>Canyon</td>
				<td><input type="text" name="canyon" value="<?php echo $canyon;?>" >
				<span class="error">* <?php echo $canyonErr;?></span></td>
			</tr>
			<tr> 
				<td>Nome Serra</td>
				<td><input type="text" name="nomeserra" value="<?php echo $nomeserra;?>" >
				<span class="error">* <?php echo $nomeserraErr;?></span></td>
			</tr>
			<tr> 
				<td>Localizacao</td>
				<td><input type="text" name="localizacao" value="<?php echo $localizacao;?>" >
				<span class="error">* <?php echo $localizacaoErr;?></span></td>
			</tr>
			<tr> 
				<td>Povoação Inicio</td>
				<td><input type="text" name="povoacaoinicio" value="<?php echo $povoacaoinicio;?>" ></td>
			</tr>
			<tr> 
				<td>Povoação Fim</td>
				<td><input type="text" name="povoacaofim" value="<?php echo $povoacaofim;?>" ></td>
			</tr>
			<tr> 
				<td>Dificuldade</td>
				<td><input type="text" name="dificuldade" value="<?php echo $dificuldade;?>" ></td>
			</tr>
			<tr> 
				<td>Maior Rapel</td>
				<td><input type="text" name="maiorrapel" value="<?php echo $maiorrapel;?>" ></td>
			</tr>
			<tr> 
				<td>Horário Acesso</td>
				<td><input type="text" name="horarioacesso" value="<?php echo $horarioacesso;?>" ></td>
			</tr>
			<tr> 
				<td>Horário Retorno</td>
				<td><input type="text" name="horarioretorno" value="<?php echo $horarioretorno;?>" ></td>
			</tr>
			<tr> 
				<td>Descida</td>
				<td><input type="text" name="descida" value="<?php echo $descida;?>" ></td>
			</tr>
			<tr> 
				<td>Desnivel</td>
				<td><input type="text" name="desnivel" value="<?php echo $desnivel;?>" ></td>
			</tr>
			<tr> 
				<td>Croqui PDF</td>
				<td><input type="text" name="croqui" value="<?php echo $croqui;?>" ></td>
			</tr>
			<tr> 
				<td>Geo latitude</td>
				<td><input type="text" name="geolatitude" value="<?php echo $geolatitude;?>" ></td>
			</tr>
			<tr> 
				<td>Geo longitude</td>
				<td><input type="text" name="geolongitude" value="<?php echo $geolongitude;?>" ></td>
			</tr>
			<tr> 
				<td>Observações</td>
				<td><textarea name="observacoes" rows="2" cols="40"><?php echo $observacoes;?> </textarea></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
			</tr>
		</table>
			<td><input type="submit" name="update" value="Alterar"></td>
	</form>
</body>
</html>
