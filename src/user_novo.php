<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<tr> 
<!--	<td><img src="..\img\TrailApp2.jpg" alt=\ /><b> Informações de Canyons</b>  </p> -->
<td><img src="https://canyonsportugal.000webhostapp.com/img/TrailAPP2.jpg" alt=\ /><b> Informações de Canyons</b>  </p>
</tr>
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
?>	
<html>
<head>
<title> Cadastro de Utilizador </title>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<h1>Informações de Canyons</h1>
<h3>Registo de Utilizadores</h3>
<body>
<!-- Botao para SAIR -->
<form> <button type="submit" formaction="menuadmin.php">Página Anterior</button> </form>
<!-- 
Chama o cadastro PHP que faz o registo de utilizadores
-->
<form method="POST" action="user_cadastro.php">
	<table border="0">
		<tr>
		   <td>User: </td>
		   <td><input type="text" size="20" name="user" maxlength="45" id="user"></td>
		</tr>
		<tr>
		   <td>Password: </td>
		   <td><input type="password" size="20" name="password" maxlength="45" id="password"></td>
		</tr>
		<tr>
		   <td>Nome de utilizador: </td>
		   <td><input type="text" size="40" name="nome" maxlength="45" id="nome"></td>
		</tr>
	</table>
	<!-- 
	Chama o cadastro de utilizadores 
	-->
	<br>
	<input type="submit" value="Registar" id="cadastrar" name="cadastrar"></p>
</form>
</body>
</html>