<?php
function teste($a, $b){
	echo "resultado $a $b"; 
}
function muda_password($user,$novapassword,$con){
	
	echo "Alteração de password :$user $novapassword";
	// muda password
	$result = mysqli_query($con,"UPDATE users SET password='$novapassword' WHERE user='$user'");
	if ($result){
		//display success message
	  	echo "<font color='green'>Executado com sucesso ";
		echo"<script language='javascript' type='text/javascript'>alert('Password de $user alterada com sucesso!');window.location.href='login.html'</script>";
	}else{
		echo("Error description: " . mysqli_error($con));
		echo"<script language='javascript' type='text/javascript'>alert('Erro na alteração da passowrd!');window.location.href='login.html'</script>";
		}
	}
function query_canyon($con, $query){

  //  echo "Query : $query";

	$result = mysqli_query($con, $query);
	if ($result){
		//display success message
		 // 	echo "<font color='green'>Executado com sucesso ".PHP_EOL."";

		//	echo"<script language='javascript' type='text/javascript'>alert('Registado com sucesso!');window.location.href='menu.php'</script>";
		}else{
			echo("Error description: " . mysqli_error($con));
			echo"<script language='javascript' type='text/javascript'>alert('Erro no registo!');window.location.href='menu.php'</script>";
		}
}	
function query_canyon_add($con, $query){

  //  echo "Query : $query";

	$result = mysqli_query($con, $query);
	if ($result){
		//display success message
		 // 	echo "<font color='green'>Executado com sucesso ".PHP_EOL."";

			echo"<script language='javascript' type='text/javascript'>alert('Registado com sucesso!');</script>";
		}else{
			echo("Error description: " . mysqli_error($con));
			echo"<script language='javascript' type='text/javascript'>alert('Erro no registo!');</script>";
		}
}	

function mostra_canyon($id, $canyon, $nomeserra, $localizacao,$povoacaoinicio,$povoacaofim,
		$dificuldade,$maiorrapel,$horarioacesso,$horarioretorno,$descida,$desnivel,$croqui,
		$observacoes, $geolatitude,$geolongitude)
{ 
faz_echo("Código",$id);
faz_echo("Canyon",$canyon);
faz_echo("Serra",$nomeserra);
faz_echo("Localização",$localizacao);
faz_echo("Povoação Inicio",$povoacaoinicio);
faz_echo("Povoação Fim",$povoacaofim);
faz_echo("Dificuldade",$dificuldade);
faz_echo("Maior Rapel",$maiorrapel);
faz_echo("Horário Acesso",$horarioacesso);
faz_echo("Horário Retorno",$horarioretorno);
faz_echo("Descida",$descida);
faz_echo("Desnível",$desnivel);
faz_echo("Croqui PDF",$croqui);
faz_echo("Geo Latitude",$geolatitude);
faz_echo("Geo Longitude",$geolongitude);
faz_echo("Observações",$observacoes);

}

function faz_echo($campo, $id){
echo "<tr>"; echo "<td>$campo</td>"; echo "<td>$id</td>"; echo "</tr>";
}
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
function getUserIP()
{
$ipaddress = '';
   $client  = @$_SERVER['HTTP_CLIENT_IP'];
   $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
   $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }
  //  echo "<b>IP getUserIP..:</b>        ".$ipaddress                        ."<br />"; 
    return $ip;
}
function le_inf_IP()
{
	global $GLOBALS;
    include("class.ipdetails.php");
	$ip = getUserIp();
   // $ip = $_SERVER['REMOTE_ADDR'];  
   //  echo "<b>IP..:</b>        ".$ip                        ."<br />";    
	if ($ip == "::1"){
       $ip = "192.168.0.1";		 //Seu número de IP
	} 

    $ipdetails = new ipdetails($ip); 
    $ipdetails->scan();
	$pais = $ipdetails->get_country();
	$estado = $ipdetails->get_region();
	$cidade = $ipdetails->get_city();

   echo "<b>IP:</b>        ".$ip                        ."<br />"; 
   echo "<b>País:</b>      ".$ipdetails->get_country()  ."<br />";
   echo "<b>Estado:</b>    ".$ipdetails->get_region()   ."<br />";
   echo "<b>Cidade:</b>    ".$ipdetails->get_city()     ."<br />";
   echo "<b>Latitude:</b>  ".$ipdetails->get_latitude() ."<br />";
   echo "<b>Longitude:</b> ".$ipdetails->get_longitude()."<br />";
   echo "<b>Código país:</b> ".$ipdetails->get_countrycode()."<br />";
//   echo "<b>Código continente:</b> ".$ipdetails->get_continentcode()."<br />";
//   echo "<b>Código moeda:</b> ".$ipdetails->get_currencycode()."<br />";
//   echo "<b>Símbolo moeda:</b> ".htmlspecialchars_decode($ipdetails->get_currencysymbol())."<br />";
//   echo "<b>Cotação moeda (dólar):</b> ".$ipdetails->get_currencyconverter()."<br />"; 
	
	// Atribuindo variveis Globais que sao usadas para informacoes do tempo
	if (isset($ip) and $ip != ""){
		$GLOBALS['_ip'] = $ip;
	}
	if (isset($pais) and $pais != "") {
		$GLOBALS['_pais'] = $pais;
	}else{
		$GLOBALS['_pais'] = 'Portugal';   // default Porto - Portugal
	}
	if (isset($cidade) and $cidade != ""){
		$GLOBALS['_cidade'] = $cidade;
	}else{	
	    $GLOBALS['_cidade'] = 'Porto';    // default Porto - Portugal
	}
	if (isset($estado) and $estado != ""){
		$GLOBALS['_estado'] = $estado;
	}else{
		$GLOBALS['_estado'] = $GLOBALS['_pais']; // default Porto - Portugal
	}
//	insert_log($ip, $pais, $cidade, $estado);	// insere registo na tabela de LOG
}
function insert_log($ip, $pais, $cidade, $estado)
{
	global $GLOBALS;
	include_once("dbconnect.php");	
	// insere registos na tabela de LOG de entradas na aplicação
	
	$query = "INSERT INTO logentradas (ip, cidade, estado, pais)";
    $query = $query." VALUES ('$ip','$cidade','$estado','$pais')";


  //  echo "Query : $query";
	$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
	query_canyon_add($con, $query);
	//display success message
	//$mensagem = "<font color='green'>Executado com sucesso ";

}
?>
