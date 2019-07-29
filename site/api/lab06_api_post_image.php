<?php
	require "configs.php";
	header('Content-Type: text/html; charset=utf-8');
	
	
	//--- Permitir apenas o método POST  -------------------------------
	if($_SERVER['REQUEST_METHOD'] != "POST")
	{
		http_response_code(403);
		echo('{"erro": "Método ' . $_SERVER['REQUEST_METHOD'] . ' não é permitido!"}' . PHP_EOL);
		exit();		
	}		
	//------------------------------------------------------------------

	
	//--- html:POST - verificar dados enviados  ------------------------
	if (!isset($_POST['auth']) || !isset($_POST['key']) || !isset($_POST['date'])|| !isset($_FILES)).
	{			
		http_response_code(400);				
		echo('{"erro": "Falta de parâmetros ao chamar o serviço!"}' . PHP_EOL);	
		exit();		
	}
	//------------------------------------------------------------------
	
	
	//--- html:POST - obter dados enviados  ----------------------------
	$user_pwd = $_POST['auth'];
	$user_key = $_POST['key'];	
	$user_date = $_POST['date'];
	$config_images_dir = "img";
	$lab_image_filename = $lab_name . "image.jpg";		// nome da imagem a guardar no servidor (se existir...substitui)
	
	//------------------------------------------------------------------

	
	//--- verificar as credênciais (password) do utilizador ------------
	if ($user_pwd != $config_auth_password)
	{	
		http_response_code(401);		
		echo('{"erro": "Erro de autentica??o!"}' . PHP_EOL);		
		exit();
	}
	//------------------------------------------------------------------

	
	//--- verificar chave admitida: "switch" ---------------------------
	if ($user_key != "image")
	{
		http_response_code(400);					
		echo('{"erro": "Serviço apenas disponível para a chave: \'image\'."}' . PHP_EOL);
		exit();					
	}	
	//------------------------------------------------------------------

	
	//--- save image ------------------------------------------
	$count_files = sizeof($_FILES['file']['name']);	
	// debug: echo "nº de ficheiros: " . $count_files . "<br />";
	if ($count_files != 1) {
		http_response_code(406);
		echo('{"erro": "apenas um ficheiro é admitido como input"}' . PHP_EOL);
    } 
	else if ($_FILES["file"]["error"] > 0) {
		http_response_code(400);
		echo("{\"erro\": \"" . $_FILES["file"]["error"] . "\"}" . PHP_EOL);
    } 
	else {
		$tmp_name = $_FILES["file"]["tmp_name"];
        // debug: //$name = $_FILES["file"]["name"];
        // debug: echo("Uploaded file: " . $name . "<br />"); echo("Stored in: " . $tmp_name . "<br />");
		// debug: echo("Type: " . $_FILES["file"]["type"] . "<br />"); echo("Size: " . (intval($_FILES["file"]["size"] / 1024)) . " Kb<br />");
		
		//--- Atualização dos ficheiros  -----------------------------------
		$path = "$config_images_dir/$lab_image_filename";		
		$path_file_date = "$config_uploads_dir/$lab_name$user_key$config_uploads_sufix_date";		
		
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
	
?>
