<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<tr> 
	<td><img src="..\img\TrailApp2.jpg" alt=\ /><b>  Canyons de Portugal</b>  
</tr>
<body bgcolor="white">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--<h1>Inserir Canyon</h1> -->
</body>
</html>

<?php
 
// validacao de user
// le o cookie que é gerado por um utilizador que ja fez login
if (isset($_COOKIE['user_entrada'])){
}else{
	echo"<br><a href='index.html'>Seu Login Expirou</a> Entrar de novo";
	die();
}
 if (isset($_COOKIE['user'])){
	$login_cookie = $_COOKIE["user"];
	}else{
	$login_cookie = $_COOKIE["user_entrada"];
}	
if($login_cookie == 'CONVIDADO'){
	echo"Bem-Vindo, $login_cookie <br>";
	echo"<font color='red'>So um utilizador cadastrado pode criar novos utilizadores</font>";
	echo"<br><a href='login.html'>Faça Login</a> Para ler o conteúdo";
}else{
	echo "</p><font color='blue'>Bem-Vindo, $login_cookie </font></p>";
}  
//including the database connection file
 include_once("dbconnect.php");
 include_once('import_functions.php');
 
   // campos da tabela dadoscanyons
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
	//-------------------
	
	$mensagem = "";
	/*
	echo "---- Informacoes de registo ---</p>";
	echo "ID:  $id    </p>";
	echo "Canyon:  $canyon    </p>";
	echo "Serra:   $nomeserra   </p>";
	echo "Localizacao :  $localizacao   </p>";
	echo "---------------------------- </p>";
	*/
?>
<html>
<body>
	<!-- Botao para SAIR -->
	<form> <button type="submit" formaction="registo_canyons.php">Página Anterior</button> </form>
</body>
 <div style="border=1;height:20px;width:60%;">
		<table width='70%' border=0>
			<tr bgcolor="#ccccff">
				<td width=10px>Codigo</td>
				<td width=70px>Descricao</td>
			</tr>
		</table>

		<!-- Tabela corpo--> 
 <div style="overflow:scroll;height:270px;width:70%;overflow:auto">
	<table width='80%' border=0>
<?php 
	mostra_canyon($id, $canyon, $nomeserra, $localizacao,$povoacaoinicio,$povoacaofim,
	$dificuldade,$maiorrapel,$horarioacesso,$horarioretorno,$descida,$desnivel,$croqui,
	$observacoes, $geolatitude,$geolongitude);
?>
	</table>
  </div>
  </div>

<?php	

  echo $mensagem; // mensagem de status de operacao no fim da tabels
  
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
	$mensagem = "<font color='green'>Erros , preencher campos obrigatorios ";
} else {	
	//Insert the table
	
	$query = "INSERT INTO dadoscanyons (canyon, nomeserra, localizacao, povoacaoinicio, povoacaofim,";
	$query = $query."dificuldade, maiorrapel, horarioacesso, horarioretorno, descida, desnivel,";	
	$query = $query."croqui, geolatitude, geolongitude, observacoes, usersys)";	
	$query = $query."VALUES ('$canyon','$nomeserra','$localizacao','$povoacaoinicio', '$povoacaofim',";
	$query = $query."'$dificuldade', '$maiorrapel', '$horarioacesso', '$horarioretorno', '$descida','$desnivel',";
	$query = $query."'$croqui', '$geolatitude', '$geolongitude', '$observacoes', '$login_cookie')";
	
  //  echo "Query : $query";
	$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
	query_canyon_add($con, $query);
	//display success message
	$mensagem = "<font color='green'>Executado com sucesso ";
}

	//redirectig to the display page. In our case, it is index.php
   // header("Location:ver_um_canyon.php?id=$id");
 
?>
</body>
</html>
