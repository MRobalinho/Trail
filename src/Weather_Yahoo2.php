<?php
 ob_start();
?>
<!Doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<title> Metereologia </title>
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
<?php
 include_once('import_functions.php');
 global $GLOBALS;
// Obter s parametros das variaveis globais País e Cidade, lidas a partir do IP na entrada da aplicação
if (isset($_GET['pais'])){
	$pais=$_GET['pais'];
	$cidade=$_GET['cidade'];
}
// Obtem a partir das variaveis fixas
if (isset($pais)){
	if ($pais=='*' || $cidade =='*'){
		$pais= '';
		$cidade= '';		
	}
}else{	
	$pais= '';
	$cidade= '';			
}
if ($pais == ''){
// Obtem a partir das variaveis globais do IP
	le_inf_IP();  // Guarda informações do IP de entrada
	$pais = $GLOBALS['_pais'];
	$cidade = $GLOBALS['_cidade'];
}
echo "</p>";
echo "<h3> Serviço de metereologia disponibilizado por Yahoo - País: $pais  , Cidade :$cidade  </p></h3>";
$yqlx = $cidade .','.$pais;;
//echo $yqlx; 
?>
<html>
<!--- API da Yahoo para informação do tempo --->
<!-- https://github.com/ikromin/misc/blob/master/yahooweather/weather_yql_example.html  -->
	<head>
		<title>Yahoo Weather </title>
		<script src="https://code.jquery.com/jquery-2.2.3.min.js"
			integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" 
			crossorigin="anonymous">
		</script>
		<style>
		.weather { display: none; margin: 1em; border: 2px solid black; width: 100px; text-align: center; border-radius: 4px; }
		.weather_date { background-color: #000; color: #fff; height: 1.2em; padding: 0.1em; }
		.weather_temp { display: table; width:100%; height: 1.2em; border-bottom: 1px solid black; }
		.weather_temp_min { display: table-cell; background-color: #efe; width: 50%; padding: 0.1em; }
		.weather_temp_max { display: table-cell; background-color: #fee; width: 50%; padding: 0.1em; }
		.weather_text { font-size: 80%; color: #999; padding: 0.5em; }
		</style>
	</head>
	<body>
	<?php
	   $yqly = 'select title, units.temperature, item.forecast from weather.forecast where woeid in (select woeid from geo.places where text="'. $yqlx. '") and u = "C" limit 5 | sort(field="item.forecast.date", descending="false");'; 
	?>	
		
		<script>
		var url = 'https://query.yahooapis.com/v1/public/yql';
  //     var yql = 'select title, units.temperature, item.forecast from weather.forecast where woeid in (select woeid from geo.places where text="Fortaleza, Brazil") and u = "C" limit 5 | sort(field="item.forecast.date", descending="false");';  
  //     var yql = 'select title, units.temperature, item.forecast from weather.forecast where woeid in (select woeid from geo.places where text="'<?php print $yqlx; ?>'") and u = "C" limit 5 | sort(field="item.forecast.date", descending="false");'; 
		
		var yql = '<?php print $yqly;?>';
		var iconUrl = 'https://s.yimg.com/zz/combo?a/i/us/we/52/';
		
 //		document.body.innerHTML +='<br> String de leitura no Yahoo :'+ yql + '</br>' ;
	
		
		$.ajax({url: url, data: {format: 'json', q: yql}, method: 'GET', dataType: 'json'})
			.success(function(data) {
				if (data.query.count > 0) {
					jQuery.each(data.query.results.channel, function(idx, result) {
						console.log(result);
						var f = result.item.forecast;
						var u = result.units.temperature;
						
						var c = $('#weather').clone();
						c.find('.weather_date').text(f.date);
						c.find('.weather_temp_min').text(f.low + u);
						c.find('.weather_temp_max').text(f.high + u);
						c.find('.weather_icon').attr('src', iconUrl + f.code + '.gif');
						c.find('.weather_text').text(f.text);
						
						c.css('display', 'inline-block');
						
						c.appendTo($('body'));
					});
				}
			}
		);
		</script>
	<p id="output"></p>	
		<!-- Used as a template -->
		<div id="weather" class="weather">
			<div class="weather_date">DATE</div>
			<div class="weather_temp">
				<div class="weather_temp_min">MIN</div>
				<div class="weather_temp_max">MAX</div>
			</div>
			<img class="weather_icon">
			<div class="weather_text"></div>
		</div>
	
	</body>
	<br> </br>
<!-- Botao para SAIR -->
<form> <button type="submit" formaction="index.html">Página Anterior</button> </form>
</html>