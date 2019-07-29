<?php	
	require_once("api/funcoes_bd.php");	
	$valores_atuais = bd_ObterValorAtual();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Estado temperatura (BD)</title>
	<link rel="stylesheet" type="text/css" href="style.css">	
	<meta http-equiv="refresh" content="5"> 	<!-- Refresh automático -->
</head>

<body>
	<h1>Estado atual da temperatura do ar (BD)</h1>
	
	<div>
		<h3>Temperatura atual:</h3>
		<p>
			<?php 
				echo number_format($valores_atuais["valor"], 1);
			?>
		</p>
		
		<h3>Data atualização:</h3>
		<p>
			<?php 
				echo $valores_atuais["data"];
			?>
		</p>
	</div>
	
	
	<br />
	<br />
	<br />
	<a href="index.html">Página inicial</a>	
	
</body>

</html>