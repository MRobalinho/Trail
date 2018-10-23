<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
	<link rel="stylesheet" type="text/css" href="..\css\style.css">  
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
<html>
<head>
<title> Informações </title>
</head>
<h3>Canyons - Fotos</h3>
<body>
<?php
if(isset($_GET['foto1'])){
	$foto1=$_GET['foto1'];
}else{
	$foto1="*";
}
if ($foto1=="*"){
	$foto1 = "/fotos/";    // se não colocou palavra de pesquisa , pesquisa o ponto
}
echo "</p>";
echo "Nome a pesquisar: $foto1  </p>";
?>
<font color="Gray"> 
<!-- Botao para SAIR -->
<form> <button type="submit" formaction="lista_fotos.html">Página Anterior</button> </form>
<div style="overflow:scroll;height:20px;width:98%;overflow:auto">
	<table width='100%' border= 0px>
		<thead>
			<tr bgcolor="#ccccff">
			<th>----- Fotos -----</th>
			</tr>
		</thead>
	</table>
</div> 
<div style="overflow:scroll;height:380px;width:98%;overflow:auto">
	<table width='100%' border= 0px>
		<thead>
			<tr bgcolor="#ccccff">
			<th>Nome</th>
			<th>Foto</th>
			</tr>
		</thead>
<!-- Define corpo da tabela -->		
		<tbody>
<?php 
$files = glob("../fotos/*.*");
for ($i=1; $i<count($files); $i++)
{
	$num = $files[$i];
	if(strpos(strtoupper($num), strtoupper($foto1)) != false) {  // Pesquisa nome da foto na string
		echo "<tr>";
		echo "<td>".$num."</td>";
		//	print $num."<br />";
		echo '<td> <img src="'.$num.'" alt="random image" title="'.$num.'" width="400" height="300" width="auto" height="auto" />'."</td>";
		//	echo '<td> <img src="'.$num.'" alt="random image" />'."</td> <br /><br />";
		echo "</tr>";
	}
}
?>
		</tbody>
	</table>
</div> 
</body>
</html>