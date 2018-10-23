<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
<style>
	<link rel="stylesheet" type="text/css" href="../css/style.css">  
</style>
</head>
<tr> 
<!--	<td><img src="..\img\TrailApp2.jpg" alt=\ /><b> Informações sobre aplicação de Canyons</b>  </p> -->
	<td><img src="https://canyonsportugal.000webhostapp.com/img/TrailAPP2.jpg" alt=\ /><b> Informações sobre aplicação de Canyons</b>  </p>
</tr>
<!--   Inicio traducao -->
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'pt', includedLanguages: 'en,es,fr,pt', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!--   Fim traducao -->
</html>
<?php
//date_default_timezone_set('America/Sao_Paulo');
date_default_timezone_set('Atlantic/Madeira');
$date = date('Y-m-d H:i');
echo"<font color='blue'> Data e Hora : $date</font></p>"; 
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<title> Contatos </title>
</head>
<h3>Contatos e informação de Canyons</h3>
<body>
<font color="Gray"> 
<p>Este software foi desenvolvido no âmbito do Mestrado de Desenvolvimento de Software da Universidade Portucalense. 
<br> Este é um projeto dos alunos: 
<br>   > Cristina Garrido   (cristgarrido@gmail.com)
<br>   > Manuel Robalinho   (manuel.robalinho@gmail.com)
<br>   > Marcio Rodrigues  
<br>   > Jorge Magalhaes  
</font> </p>
<h3></h3>
<br> Se necessita de informações, deixe aqui o seu pedido: <a href="mailto:manuel.robalinho@gmail.com?cc=cristgarrido@gmail.com&subject=Informação %20sobre %20Canyons">
Enviar Email</a>
<br> Ou deixe a sua mensagem : <a href="add_comentario.php" >Deixe a sua mensagem</a> </br>
<h3></h3> 
<!-- Botao para SAIR -->
<form> <button type="submit" formaction="index.html">Página Anterior</button> </form>
</body>
<footer>Development by: <h3>Grupo de Mestrado da UPT</h3></footer>
</html>