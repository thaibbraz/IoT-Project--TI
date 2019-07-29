<!doctype html>
<html class="no-js" lang="">
    <!-- start head Section -->
	<head>

        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>projeto ti</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
	
		<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
        <link rel="stylesheet" href="css/style.css">
		<meta http-equiv="refresh" content="5"> 	<!-- Refresh automático -->
	<!-- end head Section -->
    </head>
		
<!-- start body Section -->	
<body >

<section id="pr_sec">
	<div class="container ">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs12  w3-margin">
				<div class="title_sec">
					<h1>Atuadores</h1>
				</div>			
			</div>		
		</div>
			</div>				
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 w3-margin">
				<div class="service">						
				<a href="#.html"><img src="img/luz.png" style="width:45%"></a>		
					<h2>Luz</h2>
					<?php
						
						$file = "api/lux.data";
						if(file_exists($file))
							$file_value=file_get_contents($file);
						if (intval($file_value) > 700 )
							echo ("de noite (ligado)");
						else{
							
						echo ("de dia (desligado)");
						}
					?>
					
				</div>
			</div>				
		
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 w3-margin" >
				<div class="service">						
					<a href="#.html"><img src="img/rega.png" style="width:45%"></a>			
					<h2>Rega</h2>
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
			</div>	
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 w3-margin">
				<div class="service">						
					<a href="camera.html"><img src="img/foto.png" style="width:50%"></a>			
					<h2>Câmera</h2>
				</div>
				
			</div>	
			
			
		</div>
		
		<div class="post_btn">
				<div class="hover_effect_btn" id="hover_effect_btn">
					<a href="index.html" ><span>voltar</span></a>
				</div>
			</div>	
	</div>
</section>
	<!-- end service Section -->

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
