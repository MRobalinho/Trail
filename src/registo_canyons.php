<html>
<head>
	<link rel="stylesheet" type="text/css" href="..\css\style.css">
</head>
<!-- <tr> <td><img src="..\img\TrailApp2.jpg" alt=\ /><b> Registo de Canyons</b> </tr> -->
<tr> <td><img src="https://canyonsportugal.000webhostapp.com/img/TrailAPP2.jpg" alt=\ /><b> Registo de Canyons</b> </tr>
</html>
<?php
// Valida user
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
if ($login_cookie == 'CONVIDADO'){
	echo"Bem-Vindo, $login_cookie <br>";
	echo"<font color='red'>So um utilizador cadastrado pode criar novos registos</font>";
	echo"<br><a href='menu.php'>Faça Login</a> Para registar conteúdo";
	die();
}else{
	echo "</p><font color='blue'>Bem-Vindo, $login_cookie </font></p>";
}  
	
//including the database connection file
 include_once("dbconnect.php");

//fetching data in descending order (lastest entry first)
 
$result = mysqli_query($con, "SELECT * FROM dadoscanyons ORDER BY nomeserra ASC"); // using mysqli_query instead

if($result){
 //   echo "<p>Leitura DB: $databaseName</p>";
	}
else{
	echo("Error description: " . mysqli_error($con));
    }
$titulo = 'Registo de Canyons';
$cabecalho = '<p><strong>Cadastro de Canyons</strong></p>';

?>
<html>

<head>	
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<title><?php echo $titulo; ?></title>
<!--	<h1>Registo de Canyons</h1>  -->
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
<!-- Botao para Registo -->
<form> 
	<button type="submit" formaction="add_canyon.php">Novo Registo</button> 
<!-- Botao para SAIR -->	
	<button type="submit" formaction="menuadmin.php">Página Anterior</button> 
</form>
<div style="overflow:scroll;height:20px;width:95%;overflow:auto">
	<table width='100%' border= 0px>
		<thead>
			<tr bgcolor="#ccccff">
			<th>----- Canyons de Portugal -----</th>
			</tr>
		</thead>
	</table>
</div>   
<!-- Define Cabecalho da tabela-->	
<div style="overflow:scroll;height:240px;width:95%;overflow:auto">
	<table width='100%' border= 0px>
		<thead>
		<tr bgcolor="#ccccff">
			<th>Id</th>
			<th>Canyon</th>
			<th>Nome Serra</th>
			<th>Localizacao</th>
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
			echo "<td><a href=\"edit_canyon.php?id=$res[id]\">Alterar</a> | <a href=\"delete_canyon.php?id=$res[id]\" onClick=\"return confirm('Confirma que quer eliminar registo : $res[id] ?' )\">Eliminar</a></td>";		
		}
		?>
		</tbody>
	</table>
</div> 
</body>
</html>
