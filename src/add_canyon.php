<?php
//including the database connection file
 include_once("dbconnect.php");
$id          = 0;
$canyon      = "";
$nomeserra   = "";
$localizacao = "";
$povoacaoinicio = "";
$povoacaofim = "";
$dificuldade = "";
$maiorrapel = "";
$horarioacesso = "";
$horarioretorno = "";
$descida = "";
$desnivel = "";
$croqui = "";
$observacoes = "";
$geolatitude = "0.00";
$geolongitude = "0.00";

// variaveis para erros 
$canyonErr = "";
$nomeserraErr = "";
$localizacaoErr = "";
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- <tr> <td><img src="..\img\TrailApp2.jpg" alt=\ /><b> Adicionar Canyons</b>  </p> </tr> -->
<tr> <td><img src="https://canyonsportugal.000webhostapp.com/img/TrailAPP2.jpg" alt=\ /><b> Adicionar Canyons</b>  </p> </tr>
<style>
.error {color: #FF0000;}
</style>
<body bgcolor="white">

<!--<h1>Adicionar Canyon</h1> -->
<!-- Botao para SAIR -->
<form> <button type="submit" formaction="menu.php">Página Anterior</button> </form>
</body>
</html>
<body>
    <span class="error">* campo obrigatorio.</span>
	<form name="addcanyon" method="get" action="insert_canyon.php">
		<table border="0">
			<tr> 
				<td>Canyon</td>
				<td><input type="text" name="canyon" value=<?php echo $canyon;?>>
				<span class="error">* <?php echo $canyonErr;?></span></td>
			</tr>
			<tr> 
				<td>Nome Serra</td>
				<td><input type="text" name="nomeserra" value=<?php echo $nomeserra;?>>
				<span class="error">* <?php echo $nomeserraErr;?></span></td>
			</tr>
			<tr> 
				<td>Localizacao</td>
				<td><input type="text" name="localizacao" value=<?php echo $localizacao;?>>
				<span class="error">* <?php echo $localizacaoErr;?></span></td>
			</tr>
			<tr> 
				<td>Povoação Inicio</td>
				<td><input type="text" name="povoacaoinicio" value=<?php echo $povoacaoinicio;?>></td>
			</tr>
			<tr> 
				<td>Povoação Fim</td>
				<td><input type="text" name="povoacaofim" value=<?php echo $povoacaofim;?>></td>
			</tr>
			<tr> 
				<td>Dificuldade</td>
				<td><input type="text" name="dificuldade" value=<?php echo $dificuldade;?>></td>
			</tr>
			<tr> 
				<td>Maior Rapel</td>
				<td><input type="text" name="maiorrapel" value=<?php echo $maiorrapel;?>></td>
			</tr>
			<tr> 
				<td>Horário Acesso</td>
				<td><input type="text" name="horarioacesso" value=<?php echo $horarioacesso;?>></td>
			</tr>
			<tr> 
				<td>Horário Retorno</td>
				<td><input type="text" name="horarioretorno" value=<?php echo $horarioretorno;?>></td>
			</tr>
			<tr> 
				<td>Descida</td>
				<td><input type="text" name="descida" value=<?php echo $descida;?>></td>
			</tr>
			<tr> 
				<td>Desnivel</td>
				<td><input type="text" name="desnivel" value=<?php echo $desnivel;?>></td>
			</tr>
			<tr> 
				<td>Croqui PDF</td>
				<td><input type="text" name="croqui" value=<?php echo $croqui;?>></td>
			</tr>
			<tr> 
				<td>Geo latitude</td>
				<td><input type="text" name="geolatitude" value=<?php echo $geolatitude;?>></td>
			</tr>
			<tr> 
				<td>Geo longitude</td>
				<td><input type="text" name="geolongitude" value=<?php echo $geolongitude;?>></td>
			</tr>
			<tr> 
				<td>Observações</td>
				<td><textarea name="observacoes" rows="2" cols="40"><?php echo $observacoes;?></textarea></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $id;?>></td>
			</tr>
		</table>
			<td><input type="submit" name="add" value="Adicionar"></td> 
	</form>
</body>

</html>
