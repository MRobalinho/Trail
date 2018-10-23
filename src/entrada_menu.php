<?php
ob_start();
include_once('import_functions.php');

global $GLOBALS;
// Criando Cookies
$nome = "user_entrada";
$valor = "CONVIDADO";
$expira = time() + 1800; // 1800 (30 minutos)
setcookie($nome, $valor, $expira);  // Guarda em cookie o user entrado
$login_cookie = $_COOKIE[$nome]; 
echo "LogIn: $login_cookie </p>";
// Guarda IP, Cidade e Pais de quem entrou no aplicativo
$GLOBALS['_ip'] = "192.168.0.1";
$GLOBALS['_pais'] = "Portugal";
$GLOBALS['_cidade'] = "Porto";
$GLOBALS['_estado'] = "Portugal";

echo $GLOBALS['_pais'];	
echo $GLOBALS['_cidade'];
echo '<br> </br>';	
le_inf_IP();  // Guarda informações do IP de entrada

echo '<br> Saida da leitura do IP </br>';
$ip = $GLOBALS['_ip'];
$pais = $GLOBALS['_pais'];
$cidade = $GLOBALS['_cidade'];
$estado = $GLOBALS['_estado'];
echo 'Saidas :'.$ip.' , '.$pais. ','.$cidade. ', '. $estado ;
 
insert_log($ip, $pais, $cidade, $estado);	// insere registo na tabela de LOG
	
header("Location:menu.php");
?>