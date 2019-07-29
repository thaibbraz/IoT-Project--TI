<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Lab06-Estado switch</title>
	<link rel="stylesheet" type="text/css" href="style.css">	
	<meta http-equiv="refresh" content="5"> 	<!-- Refresh automático -->
	</head>

<body>
	<h1>Lab06 - Estado atual do switch</h1>
	
	<div>
		<h3>Estado atual:</h3>
		<p>	
		<?php 
				exec('python /10.20.229.18/pi/codigoRaspberry/switch.py');
			?>
							<img src="images/led-off.png" alt="estado do led: led-off">									
					</p>

		<h3>Data atualização:</h3>
		<p>
			2017-05-09 05:09:32		</p>
	</div>
	
	
	<br />
	<br />
	<br />
	<a href="index.html">Página inicial</a>	
	
</body>

</html>