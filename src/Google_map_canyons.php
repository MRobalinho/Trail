<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<!--   Inicio traducao -->
<div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'pt', includedLanguages: 'en,es,fr,pt', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!--   Fim traducao -->
<body>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</body>
</html>

<?php
// recuperar parametro GET local
if(isset($_GET['local'])){
	$local=$_GET['local'];
	$pesquisagoogle=$_GET['pesquisagoogle'];
}else{
	$local="PORTO PORTUGAL";  // valor por defeito
	$pesquisagoogle="PORTO PORTUGAL";
}
$canyon = $_GET['canyon'];	
$nomeserra = $_GET['nomeserra'];
$povoacaoinicio = $_GET['povoacaoinicio'];	
$geolatitude = $_GET['geolatitude'];
$geolongitude = $_GET['geolongitude'];
$id = $_GET['id'];

$botao_voltar = "ver_um_canyon.php?id=".$id;
//echo $botao_voltar;


$default_point = "";
//---------------  API Google Maps
	
$geo= array();
//$a = $local; // Pega parâmetro
$a = $pesquisagoogle; // Pega parâmetro

$addr = str_replace(" ", "+", $a); // Substitui os espaços por + "Rua+Paulo+Guimarães,+São+Paulo+-+SP" conforme padrão 'maps.google.com'
$address = utf8_encode($addr); // Codifica para UTF-8  no envio do parâmetro

//  Google Maps API para obter a localização (Latitude e Longitude) com base no nome do local
$geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $address . '&sensor=false');
$output = json_decode($geocode);
if (isset($output->results[0])){
		$lat = $output->results[0]->geometry->location->lat;
		$long = $output->results[0]->geometry->location->lng;
	}else{
		//	 não encontrou localização 
		$default_point = "Não encontrou localização no Mapa ";
		$lat = "41.1621217";
		$long = "-8.6919946,12";
	}
if (($geolatitude != 0) and ($geolatitude != 0)) // trouxe a geo referencia, usa a que veio
	{
	$lat  = $geolatitude;
	$long = $geolongitude;
	}
		
$geo['lat']=$lat;
$geo['long']=$long;
echo "<pre> Latitude: $lat Longitude: $long";
echo "<pre> Local: $local";
echo " - Canyon :$canyon";
echo " - Serra :$nomeserra";
//echo " - Povoação Início :$povoacaoinicio";
echo " - Termos de pesquisa: $pesquisagoogle";

/*
//echo "<pre> $default_point";
if (empty($default_point)){
echo "<pre> Latitude : ";
print_r($geo['lat']);
echo " Longitude: ";
print_r($geo['long']);
}
*/

//echo "<br /><br /> Resultado completo JSON: <br /><br />";
//print_r($output);
?>
<!DOCTYPE html>
<html>
<!--  Google Maps API para apresentar o mapa com base na Geo Localizaçao (Latitude e Longitude) -->
<!-- Botao para SAIR -->
  <form> <button type="submit" formaction="lista_canyons.php">Página Anterior</button></form>   
  <head>
    <style>
       #map {
        height: 400px;
        width: 80%;
       }
    </style>
  </head>
  <body>
    <h3>My Google Maps Canyons</h3>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat:<?php echo "$lat";?>, lng: <?php echo "$long";?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });

      }
    </script>
	<!-- KEY para API Google Maps -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAX7le8_R__Ndk9_SNIRyP6Oh3Yl104XdY&callback=initMap">
    </script>
  </body>
</html>