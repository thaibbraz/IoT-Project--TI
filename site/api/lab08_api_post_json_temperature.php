<?php
/*
	require_once("configs.php");


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
	$_POST = json_decode(file_get_contents('php://temperatura'), true);
	if (!isset($_POST['auth']) || !isset($_POST['key']) || !isset($_POST['value']) || !isset($_POST['date'])
		|| !isset($_POST['luminosidade']) || !isset($_POST['detetorAgua']))
	{			
		http_response_code(400);				
		echo('{"erro": "Falta de parâmetros ao chamar o serviço!"}' . PHP_EOL);	
		exit();		
	}
	*/
	//------------------------------------------------------------------
	
	
	---------------------------

	
	//--- verificar as credênciais (password) do utilizador ------------
	/*if ($user_pwd != $config_auth_password)
	{	
		http_response_code(401);		
		echo('{"erro": "Erro de autenticação!"}' . PHP_EOL);		
		exit();
	}*/
	//------------------------------------------------------------------

	
	//--- verificar chave admitida: "switch" ---------------------------
	/*if ($user_key != "temperatura")
	{
		http_response_code(400);					
		echo('{"erro": "Serviço apenas disponível para a chave: \'temperatura\'."}' . PHP_EOL);
		exit();					
	}*/
	//------------------------------------------------------------------	
	/*	
	$uploads_dir = 'files';
	$data = "data.txt";
	$luminosidade = "luminosidade.txt";
	$temperatura = "temperatura.txt";
	$detetorAgua = "detetorAgua.txt";
	$historico = "historico.txt";*/
	
	//--- html:POST - obter dados enviados  ----------------------------
	$user_pwd = $_POST["auth";
	$user_key = $_POST["key"];
	$temperatura = $_POST["value"]; //temperatura
	$data= $_POST["date"];
	$luminosidade= $_POST["luminosidade"];
	$detetorAgua=$_POST["detetorAgua"];
	//---------------------------------------
	
	
	file_put_contents("luminosidade.data", $luminosidade );
	file_put_contents("temperatura.data", $temperatura );
	file_put_contents("detetorAgua.data", $temperatura );
	file_put_contents("temperatura.txt", $temperatura );

	
	
	//---------- Atualização dos ficheiros ------------------------------
	
	//$path_file_value = "$uploads_dir/$temperatura";
	//$path_file_data = "$uploads_dir/$data";
	//$path_file_luminosidade = "$uploads_dir/$luminosidade";
	//$path_file_detetorAgua = "$uploads_dir/$detetorAgua";
	//$path_file_historico = "$uploads_dir/$historico";
	//---------- update ficheiros-----------------------------
	// update temperature file
	//$r1= file_put_contents ($path_file_value,$user_value); //temperatura
	// update date file
	//$r2= file_put_contents ($path_file_data,$user_date);
	// update light file
	//$r3= file_put_contents ($path_file_luminosidade,$user_luminosidade);
	// update history file
	//$r4= file_put_contents ($path_file_detetorAgua,$user_detetorAgua);
	
	// update history (order by date ASC)
	//$new_line = $user_value$user_luminosidade$user_detetorAgua. "\t(" . $user_date . ")" . PHP_EOL;
	//file_put_contents($path_file_historico, $new_line, FILE_APPEND);
	
	//-------------------verificar se nao foi possivel a atualzação---------------------
	/*
	if($r1 ==FALSE ||$r2 ==FALSE ||$r3 ==FALSE ||$r4 ==FALSE){
		
		http_response_code(400);					
		echo('{"erro": "Serviço apenas disponível para a chave: \'temperatura\'."}' . PHP_EOL);
		exit();
	}
	*/
	//----------------------------------------------------------------------------------
	
	
	/*
	// *******************************************************************************
	// ***        ENVIAR TAMBÉM OS DADOS PARA O SERVIDOR IOT              ************
	// *******************************************************************************
	//ENVIAR PARA O NOSSO SERVIDOR IOT.DEI
	$json = array("status" => "OK", "auth" => $user_pwd,"key" => $user_key, "value" => $user_value, "date" => $user_date);
	$data_string = json_encode($json);
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"http://www.iot.dei.estg.ipleiria.pt/eiR-plXX-gY/api/lab08_api_post_json_temperature.php");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	 $result = curl_exec ($ch);
	 curl_close ($ch);*/
	// *******************************************************************************
	
	
		echo "Dados recebidos com sucesso!";
		
	//-------  Resposta ao cliente  ------------------------------------
	/*if($result){
		$json = array("status" => "OK LOCAL - OK IOT", "key" => $user_key, "value" => $user_temperatura, "date" => $user_date, "luminosidade" => $user_luminosidade, "detetorAgua" => $user_detetorAgua);
		echo(json_encode($json) . PHP_EOL);	
	}else{
		$json = array("status" => "OK LOCAL - ERRO IOT", "key" => $user_key, "value" => $user_value, "date" => $user_date, "luminosidade" => $user_luminosidade, "detetorAgua" => $user_detetorAgua);
		echo(json_encode($json) . PHP_EOL);	
	}*/	
	//------------------------------------------------------------------	
		
?>
