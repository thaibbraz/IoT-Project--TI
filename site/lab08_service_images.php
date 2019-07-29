<?php
	
	header('Content-Type: text/html; charset=utf-8');
	//-----------------------------------------------------------------
	// 2017 - ei.ti - CONFIGS	
	//-----------------------------------------------------------------
	$auth_password = '!!ti!!';
	$uploads_dir = 'img';
	//-----------------------------------------------------------------
	
	
	//--- get service info --------------------------------------------
	if (isset($_POST['autenticacao']) && isset($_FILES))
	{
		$user_pwd = $_POST['autenticacao'];
	}
	else	
	{	
		http_response_code(400);		
		echo("Falta de parâmetros ao chamar o serviço!");
		exit();		
	}
	//------------------------------------------------------------------
	
	
	//--- verify user authentication -----------------------------------
	if ($user_pwd != $auth_password)
	{	
		http_response_code(401);		
		echo("Erro na autenticação!");
		exit();
	}
	//------------------------------------------------------------------

	
	//--- do... image service ------------------------------------------
	$count_files = sizeof($_FILES['file']['name']);	
	echo "nº de ficheiros: " . $count_files . "<br />";
	if ($count_files != 1) {
		http_response_code(406);
        echo("Erro: nº de ficheiros incorreto (" . $count_files . ")<br />");
    } 
	else if ($_FILES["file"]["error"] > 0) {
		http_response_code(400);
        echo("Erro: " . $_FILES["file"]["error"] . "<br />");
    } 
	else {
		$tmp_name = $_FILES["file"]["tmp_name"];
        $name = $_FILES["file"]["name"];
        echo("Uploaded file: " . $name . "<br />");
        echo("Stored in: " . $tmp_name . "<br />");
		
        echo("Type: " . $_FILES["file"]["type"] . "<br />");
        echo("Size: " . (intval($_FILES["file"]["size"] / 1024)) . " Kb<br />");
		
		$path = "$uploads_dir/$name";		
		move_uploaded_file($tmp_name, $path);
		echo("ficheiro copiado para: $path");
    }
	//------------------------------------------------------------------
?>