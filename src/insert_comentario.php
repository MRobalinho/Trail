<?php
 ob_start();
 ?>
<!Doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<tr> 
	<td><img src="..\img\TrailApp2.jpg" alt=\ /><b>  Canyons de Portugal</b>  
</tr>
<body bgcolor="white">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--   Inicio traducao -->
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'pt', includedLanguages: 'en,es,fr,pt', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!--   Fim traducao -->
</body>
</html>

<?php

   // campos da tabela comentarios
	$id = $_GET['id'];
	$nome=$_GET['nome'];
	$email=$_GET['email'];	
	$mensagem=$_GET['mensagem'];	
	//-------------------
	echo "<h3> Informações da sua mensagem </h3> </p>";
//	echo "ID:  $id    </p>";
	echo "Nome:  $nome   </p>";
	echo "E-mail:   $email   </p>";
	echo "Mensagem :  $mensagem   </p>";
?>	
<html>
<body>
    <br> </br>
	<!-- Botao para SAIR -->
	<form> <button type="submit" formaction="contato.php">Página Anterior</button> </form>
</body>
<?php
//  echo $mensagem; // mensagem de status de operacao no fim da tabels
 //including the database connection file
 
 include_once("dbconnect.php");
 include_once('import_functions.php');
  
// checking empty fields
if(empty($nome) OR empty($email) OR empty($mensagem)) {	
		
	if(empty($nome)) {
		echo "<font color='red'>Nome está vazio.</font><br/>";
	}
	
	if(empty($email)) {
		echo "<font color='red'>E-mail está vazio.</font><br/>";
	}
	
	if(empty($mensagem)) {
		echo "<font color='red'>mensagem está vazia.</font><br/>";
	}		
	$mensagem = "<font color='green'>Erros , preencher campos obrigatorios ";
} else {	
	//Insert the table
	
	$query = "INSERT INTO comentarios (nome, email, mensagem)";	
	$query = $query."VALUES ('$nome','$email','$mensagem')";
	
  //  echo "Query : $query";
	$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
	query_canyon_add($con, $query);
	//display success message
	$mensagem = "<font color='green'>Executado com sucesso ";
}
	//redirectig to the display page. In our case, it is index.php
   // header("Location:ver_um_canyon.php?id=$id");
 ?>
