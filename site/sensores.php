<!doctype html>
<html class="no-js" lang="">
    <head>
	<!-- start head Section -->
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
		<meta http-equiv="refresh" content="5"> 	<!-- Refresh automático -->
<!-- end head Section -->
    </head>
	
<!-- start body Section -->	
<body>


<section id="pr_sec">

	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 ">
				<div class="title_sec">
					<h1>Sensores</h1>
				</div>			
			</div>		
					
			<!-- start service Section -->
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="service">	
					<a href="lab08_temperatura.php"></a>	
						

					<h2>detetor agua</h2>
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
			</div>				
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="service">						
				<a href="#.html"><img src="img/lightSensor.png" style="width:45%"></a>		
					<h2>sensor luminosidade</h2>
					<?php
						$file = "api/lux.data";
						if(file_exists($file))
							echo(file_get_contents($file));
						else
							echo("(erro: não foi possível obter dados!)");
					?>
				</div>
			</div>				
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="service">						
					<a href="#.html"><img src="img/temperatura.jpg" style="width:60%"></a>			
					<h2>temperatura</h2>
					<?php
						$file = "api/temp.data";
						if(file_exists($file))
							echo(file_get_contents($file));
						else
							echo("(erro: não foi possível obter dados!)");
					?>					
					
				</div>
			</div>	
			<!-- end service Section -->
		</div>
		<div class="post_btn">
				<div class="hover_effect_btn" id="hover_effect_btn">
					<a href="index.html" ><span>voltar</span></a>
				</div>
			</div>	
	</div>
</section>



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
