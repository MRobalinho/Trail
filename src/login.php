<?php 
 ob_start();
 include_once("dbconnect.php");
 include_once('import_functions.php');

  $user = $_POST['user'];
  $pass_atual   = $_POST['password'];
  $password     = md5($_POST['password']);
  
  if (!empty($_POST['entrar'])){
		$operacao = $_POST['entrar'];
  }else{
		$operacao = "";	 
	 }	 
  if (!empty($_POST['mudapassword'])){
	  $pass_nova    = $_POST['novapassword'];
	  $novapassword = md5($_POST['novapassword']);
	  $operacao = $_POST['mudapassword'];
  }else{
	 $novapassword = ""; 
	 $pass_nova = "";
  }
  
  $user = strtoupper($user);
  
  // Teste sem cripto
  //  $password     = $pass_atual;
  //  $novapassword = $pass_nova;
  //	----
  echo "---- Informacoes entrada ---</p>";
  echo "User:  $user    </p>";
  echo "Password:  $password    </p>";
  echo "Nova Password:  $novapassword    </p>";
  echo "Operacao: $operacao </p>";
  echo "---------------------------- </p>";
  
  $con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
  
	$sucesso = 0;
	if ($user == "ADMIN" AND $pass_atual == "upt"){
	    $result = mysqli_query($con,"SELECT * FROM users WHERE user = '$user'") or die("Utilizador Invalido !");
   
	    if (mysqli_num_rows($result)<=0){
			echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";
			die();
		}else{
			$sucesso = 1;
		}
	}
	if($user == "" || $user == null){
		echo"<script language='javascript' type='text/javascript'>alert('O campo User $user , $nome deve ser preenchido');window.location.href='login.html';</script>";
		die();
	}
	if($password == "" || $password == null){
		echo"<script language='javascript' type='text/javascript'>alert('A password do User $user , $nome deve ser preenchida');window.location.href='login.html';</script>";
		die();
	} 

	if ($sucesso == 0) {
        $result = mysqli_query($con,"SELECT * FROM users WHERE user = '$user' AND password = '$password'") or die("Utilizador Invalido !");
   
	    if (mysqli_num_rows($result)<=0){
			echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.html';</script>";
			die();
		}else{
			$sucesso = 1;
		}
	}
	if ($sucesso == 1){
		echo "Login com Password valida";
		if (empty($pass_nova)){
		}else{
		  echo "Login com Password valida-Muda password";
		  muda_password($user,$novapassword,$con);
		}
	    echo "User-sucesso:  $user    </p>";
		// Criando Cookies
		$nome = "user";
		$valor = $user;
		$expira = time() + 1800; // 1800 (30 minutos)
		setcookie($nome, $valor, $expira);  // Guarda em cookie o user entrado
	    header("Location:informa_acesso.php");
	}
?>