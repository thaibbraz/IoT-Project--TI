<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

	/*$user_key = $_POST['key'];	
	$user_pwd = $_POST['auth'];*/
	
	// RECEBE DADOS DOS SENSORES
	$temp= $_POST["temp"];
	$lux= $_POST["lux"];
	//$luxAgua= $_POST["luxAgua"];
	//$prox= $_POST["prox"];
	$agua=$_POST["agua"];
	$data=date("Y-m-d H:i:s");
	$botao=$_POST["botao"];
	$lab_name ="img/capture.jpg";
	//$lab_name = "lab06_";	
	//$config_images_dir = "img";
	//$lab_image_filename = $lab_name . "image.jpg";		// nome da imagem a guardar no servidor (se existir...substitui)
	
	// GRAVA OS VALORES RECEBIDOS NOS RESPETIVOS FICHEIROS DE TEXTO
	file_put_contents("temp.data", $temp);
	file_put_contents("lux.data", $lux);
	//file_put_contents("luxAgua.data", $luxAgua);
	//file_put_contents("ledAgua.data", $ledAgua);
	//file_put_contents("prox.data", $prox);
	file_put_contents("botao.data", $botao);
	file_put_contents("agua.data", $agua);
	
	// VAI BUSCAR AO IOT O ESTADO DOS "BOTOES" VIA HTTP GET
	
	//--- save image ------------------------------------------
	//$count_files = sizeof($_FILES['file']['name']);	
	// debug: echo "nº de ficheiros: " . $count_files . "<br />";
	//if ($count_files != 1) {
	//	http_response_code(406);
	//	echo('{"erro": "apenas um ficheiro é admitido como input"}' . PHP_EOL);
    //} 
	//else if ($_FILES["file"]["error"] > 0) {
	//	http_response_code(400);
	//	echo("{\"erro\": \"" . $_FILES["file"]["error"] . "\"}" . PHP_EOL);
    //} 
	/*else {
		$tmp_name = $_FILES["file"]["tmp_name"];
        // debug: //$name = $_FILES["file"]["name"];
        // debug: echo("Uploaded file: " . $name . "<br />"); echo("Stored in: " . $tmp_name . "<br />");
		// debug: echo("Type: " . $_FILES["file"]["type"] . "<br />"); echo("Size: " . (intval($_FILES["file"]["size"] / 1024)) . " Kb<br />");
		
		//--- Atualização dos ficheiros  -----------------------------------
		$path = "$config_images_dir/$lab_image_filename";		
		//$path_file_date = "$lab_name$config_uploads_sufix_date";		
		
		$r1 = move_uploaded_file($tmp_name, $path);
		// debug: echo("ficheiro copiado para: $path");

		// atualizar o ficheiro com a data atual
		$r2 = file_put_contents($path_file_date, $user_date);
	
		// verificar se não foi possível atualizar pelo menos um ficheiro
		if ($r1 == FALSE || $r2 == FALSE)
		{
			http_response_code(404);					
			echo('{"erro": "Não foi possível atualizar ficheiros."}' . PHP_EOL);				
			exit();					
		}			
		
		// tudo atualizado com sucesso
		$json = array("status" => "OK", "name" => $lab_image_filename, "date" => $user_date);
		echo(json_encode($json) . PHP_EOL);			
    }
	//------------------------------------------------------------------
	
	// PROCESSA TODAS AS INFORMAÇOES E ATIVO OUTPUTS SE NECESSARIO
	
	
	// ENVIA OS DADOS PARA O IOT VIA HTTP POST

*/
	echo "Dados recebidos com sucesso!";
?>
