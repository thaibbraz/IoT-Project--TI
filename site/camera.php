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
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
        <link rel="stylesheet" href="css/style.css">
		<meta http-equiv="refresh" content="30"> 	<!-- Refresh automático -->
	<!-- end head Section -->
	<?php 
		$file_prefix = "capture";
	?>
    </head>
<body>
<!-- start body Section -->



<section id="section2" class="cd-section">
	<div class="content-wrapper">
		<h1>Imagem atual da câmera</h1>
		<p>
			<img src="img/<?php echo($file_prefix); ?>.jpg" alt="última imagem capturada" style="border:3px solid gray">
		</p>
			<h3>Data de atualização:</h3>
		<p>
			<?php 
				$file = "files/" . $file_prefix . "_data.data";
				if (file_exists($file))
					echo(file_get_contents($file)); 
				else
					echo("(erro: não foi possível obter dados!)"); 					
			?>
		</p>
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
