
<!DOCTYPE html>
<html>
<!-- start header Section -->
   <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>projeto ti</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
		<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
        <link rel="stylesheet" href="css/style.css">
		<meta http-equiv="refresh" content="30"> 	<!-- Refresh automático -->
	<!-- end head Section -->
	
    </head>
<!-- end header Section -->
<!-- start body Section -->
<body>
	<h1>Lab08- Histórico </h1>
	
	<div>
		<h1>Temperatura (última atualização):</h1>

	<?php	
		$file = "api/temp.data";
						if(file_exists($file))
							echo(file_get_contents($file));
						
						else
							echo("(erro: não foi possível obter dados!)");
	?>
	</div>
	<div>
		<h1>luminosidade (última atualização):</h1>

	<?php
						
						$file = "api/lux.data";
						if(file_exists($file))
							$file_value=file_get_contents($file);
						if (intval($file_value) > 700 )
							echo (" (ligado)");
						else{
							
						echo ("(desligado)");
						}
					?>
	</div>
	<div>
		<h1>detetor água(última atualização):</h1>

	<?php 							
				$file ="api/agua.data";				
				if (file_exists($file)){
					$file_value = file_get_contents($file);					
					$status_led = "led-off";
					if (intval($file_value) > 650 && intval($file_value) < 700 )
						$status_led = "led-on";												
			?>
				<img src="img/<?php echo($status_led) ?>.png" alt="estado do led: <?php echo($status_led); ?>">									
			<?php
			}
			else
					echo("(erro: não foi possível obter dados!)"); 										
			?>
	</div>
	<div>
		<h1>Rega água(última atualização):</h1>

	<?php
					$file = "api/botao.data";
						if(file_exists($file))
							$file_value=file_get_contents($file);
						if (intval($file_value) == 1 )
							echo ("ligada");
						else{
							
						echo ("desligada");
						}
					?>		
	</div>
		
	<br />
	<br />
	<br />
	<div class="post_btn">
				<div class="hover_effect_btn" id="hover_effect_btn">
					<a href="index.html" ><span>voltar</span></a>
				</div>
			</div>
		
	
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
 <script src="js/vendor/jquery-1.11.2.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/appear.js"></script>
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/showHide.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/scrolling-nav.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>
<script src="showHide.js" type="text/javascript"></script>

<!-- end body Section -->	
</body>
<!-- start footer Section -->
	<footer id="ft_sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				
					<ul class="copy_right">
						<li>made by</li>
						<li>Thainá Braz 2161906</li>
						<li>Pedro Santos 2161922</li>
					</ul>					
			</div>	
		</div>
	</div>
</footer>

<!-- End footer Section -->

</html>