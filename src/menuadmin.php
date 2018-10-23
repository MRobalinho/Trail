<?php
 ob_start();
?>
<!Doctype html>
<html>
<head>
<tr> 
<!--<td><img src="..\img\TrailApp2.jpg" alt=\ /><b> Canyons Portugal</b>  </p>  -->
	<td><img src="https://canyonsportugal.000webhostapp.com/img/TrailAPP2.jpg" alt=\ /><b> Canyons Portugal</b>  </p>
</tr>
<!--   Inicio traducao -->
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'pt', includedLanguages: 'en,es,fr,pt', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!--   Fim traducao -->
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
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
	echo"<font color='red'>Apenas um utilizador cadastrado pode criar novos registos</font>";
	echo"<br><a href='menu.php'>Faça Login</a> Para registar conteúdo";
	die();
}else{
//	echo "</p><font color='blue'>Bem-Vindo, $login_cookie </font></p>";
}  
?>
<body>
<!-- <h1>Canyons de Portugal</h1>  -->

<div class="vertical-menu">
  <a href="#" class="active">Administrador - My Trail </a>
  <a href="login.html">LOGIN</a>
  <a href="registo_canyons.php">Registo de Canyons</a>
  <a href="lista_log.html">Informações de acessos</a> 
  <a href="lista_msg.html">Consulta de Mensagens</a> 
  <a href="Weather_Yahoo1.html">Meteorologia</a>  
  <a href="user_novo.php">Novo Utilizador</a>
  <a href="menu.php">VOLTAR</a>
</div>
</body>
</html>

<?php
//-- Data e hora
//date_default_timezone_set('America/Sao_Paulo');
date_default_timezone_set('Atlantic/Madeira');
$date = date('d-m-Y H:i');
//echo"<font color='blue'> Data/Hora : $date</font></p>"; 
echo "<style=font-size: 5px;> <font color='blue'> Data/Hora : $date </font></p>";
//----- Cookies
if (isset($_COOKIE['user_entrada'])){
	}else{
	header("Location:entrada_menu.php"); // Renova o cookie como convidado
}
 if (isset($_COOKIE['user'])){
	 $login_cookie = $_COOKIE["user"];
 }else{
	 $login_cookie = $_COOKIE["user_entrada"];
 }	 

//   print_r($_COOKIE);
//echo "</p><font color='blue'>Bem-Vindo , $login_cookie </font></p>";
echo "<style=font-size: 5px;> <font color='blue'> Bem-Vindo , $login_cookie</font></p>";
?>

