<?php
 ob_start();
	$login_cookie = $_COOKIE['user'];
	if(empty($login_cookie)){
	  echo"Bem-Vindo, USER VAZIO <br>";
	  $login_cookie = "CONVIDADO"; 
	}
    if($login_cookie == "CONVIDADO"){
	  echo"Bem-Vindo, $login_cookie <br>";
      echo"Essas informações <font color='red'>NÃO PODEM</font> ser acessadas por si";
      echo"<br><a href='login.html'>Ir para Login</a>";
	 }else{  
      echo"Bem-Vindo, $login_cookie <br>";
      echo"Essas informações <font color='red'>PODEM</font> ser acessadas por si";
	  sleep(2);
      header("Location:pesquisa_canyon.html");
    }
?>