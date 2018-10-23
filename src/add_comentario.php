<?php
 ob_start();

//including the database connection file
 include_once("dbconnect.php");
$id          = 0;
$nome     = "";
$email   = "";
$mensagem = "";
// variaveis para erros 
$nomeErr = "";
$emailErr = "";
$msgErr = "";
?>
<!Doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- <tr> <td><img src="..\img\TrailApp2.jpg" alt=\ /><b> Adicionar Comentários</b>  </p> </tr> -->
<tr> <td><img src="https://canyonsportugal.000webhostapp.com/img/TrailAPP2.jpg" alt=\ /><b> Adicionar Comentários</b>  </p> </tr>

<!--   Inicio traducao -->
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'pt', includedLanguages: 'en,es,fr,pt', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!--   Fim traducao -->

<body bgcolor="white">
<br> </br>
<!--<h1>Adicionar Comentarios</h1> -->
<!-- Botao para SAIR -->
<form> <button type="submit" formaction="menu.php">Página Anterior</button> </form>
</body>
</html>
<body>
    <span class="error">* campo obrigatorio.</span>
	<form name="addcomentario" method="get" action="insert_comentario.php">
		<table border="0">
			<tr> 
				<td>O seu nome</td>
				<td><input type="text" name="nome" size="30" value=<?php echo $nome;?>>
				<span class="error">* <?php echo $nomeErr;?></span></td>
			</tr>
			<tr> 
				<td>O seu Email</td>
				<td><input type="text" name="email" size="40" value=<?php echo $email;?>>
				<span class="error">* <?php echo $emailErr;?></span></td>
			</tr>
			<tr> 
				<td>Deixe a sua mensagem</td>
				<td><textarea name="mensagem" rows="6" cols="40"><?php echo $mensagem;?></textarea>
				<span class="error">* <?php echo $msgErr;?></span></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $id;?>></td>
			</tr>
		</table>
			<td><input type="submit" name="add" value="Adicionar"></td> 
	</form>
</body>

</html>
