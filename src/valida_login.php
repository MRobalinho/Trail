<?php 

include_once("dbconnect.php");

$user = $_POST['user'];
$entrar = $_POST['entrar'];
// $password = $_POST['password'];
$password = md5($_POST['password']);
  
$user = strtoupper($user);
/*
echo "---- Informacoes entrada ---</p>";
echo "User:  $user    </p>";
echo "Password:  $password    </p>";
echo "---------------------------- </p>";
*/

if (isset($entrar)) {
		 
	$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

	$result = mysqli_query($con,"SELECT * FROM users WHERE user = '$user' AND password = '$password'") or die("Utilizador Invalido !");

	if (mysqli_num_rows($result)<=0){
	  echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";
	  die();
	}else{
	  $expira = time() + 1800; // 1800 (30 minutos) 
	  setcookie("user",$user, $expira);
	  header("Location:login.php");
	}
}
?>