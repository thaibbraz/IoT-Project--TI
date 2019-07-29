<?php	
	require_once("api/funcoes_bd.php");		
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Lab08-Histórico temperatura (BD)</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta http-equiv="refresh" content="30"> 	<!-- Refresh automático -->
</head>

<body>
	<h1>Lab08- Histórico da temperatura do ar (BD)</h1>
	
	<div>
		<h3>Temperatura (Data de atualização)</h3>

	<?php	
		$historico = bd_ObterHistorico();
		foreach($historico as $row)
		{
			echo("<p>" . number_format($row["valor"], 1) . " [" . $row["data"] . "]</p>");
		}
	?>
	</div>
		
	<br />
	<br />
	<br />
	<a href="index.html">Página inicial</a>	
</body>

</html>