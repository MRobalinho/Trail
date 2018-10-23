<?php
 ob_start();
?>
<!Doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
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
<!-- <h1>Canyons de Portugal</h1>  -->
<div class="vertical-menu">
  <a href="#" class="active">Home -  My Trail </a>
  <a href="login.html">LOGIN</a>
  <a href="pesquisa_canyon.html?">Lista de Canyons</a>
  <a href="lista_fotos.html">Informações e fotos</a>
  <a href="Weather_Yahoo2.php">Meteorologia</a>
  <a href="menuadmin.php">Administrador</a>
  <a href="contato.php">Contato</a>
  <a href="logout.php">SAIR</a>
</div>
</body>
</html>
<?php
//-- Data e hora
//date_default_timezone_set('America/Sao_Paulo');
date_default_timezone_set('Atlantic/Madeira');
$date = date('d-m-Y H:i');
//echo"<font color='blue'> Data/Hora : $date</font></p>"; 
echo "<style=font-size: 5px;> <font color='blue'> Data/Hora :$date </font></p>";
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

