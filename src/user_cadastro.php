<?php 

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
	
//---- conexao Base dados	
include_once("dbconnect.php");
  
$user = $_POST['user'];
$password = MD5($_POST['password']);
$nome     = $_POST['nome'];

// Teste sem cripto
//$password  = $_POST['password'];
// ---

$user = strtoupper($user);
 
echo "---- Informacoes de registo ---: $login_cookie </p>";
echo "User:  $user    </p>";
echo "Password:  $password    </p>";
echo "Nome    :  $nome    </p>";
echo "---------------------------- </p>";
 
//$logarray = $array['user'];
 
if($user == "" || $user == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo User $user , $nome deve ser preenchido');window.location.href='user_cadastro.php';</script>";
	sleep(1);
	//redirectig to the display page. In our case, it is index.php
    header("Location:user_cadastro.php");
//	die();
	}
if($password == "" || $password == null){
    echo"<script language='javascript' type='text/javascript'>alert('A password do User $user , $nome deve ser preenchida');window.location.href='user_cadastro.php';</script>";
	sleep(1);
	//	die();
	//redirectig to the display page. In our case, it is index.php
    header("Location:user_cadastro.php");
	} 
   
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
$result = mysqli_query($con,"SELECT * FROM users WHERE user = '$user'");

if (mysqli_num_rows($result) > 0){
 echo"<script language='javascript' type='text/javascript'>alert('Esse login $user já existe');window.location.href='user_cadastro.php';</script>";
 die();

}else{
$query = "INSERT INTO users (user, password, nome) VALUES ('$user','$password','$nome')";
$insert = mysqli_query($con, $query);
	if($insert){
	  echo"<script language='javascript' type='text/javascript'>alert('Utilizador cadastrado $user com sucesso!');window.location.href='menu.php'</script>";
	}else{
	  echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar o utilizador $user');window.location.href='menu.php'</script>";
	}
	sleep(1);
}
	
?>