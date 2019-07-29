<?php
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
	$DATA = json_decode(file_get_contents('php://input'), true);		
	if (!isset($DATA['auth']) || !isset($DATA['key']))
	{			
		http_response_code(400);
		echo('{"erro": "Falta de parâmetros ao chamar o serviço!"}' . PHP_EOL);			
		exit();		
	}
	//------------------------------------------------------------------
	
	
	//--- html:POST - obter dados enviados  ----------------------------
	$user_pwd = $DATA['auth'];
	$user_key = $DATA['key'];
	//------------------------------------------------------------------

	
	//--- verificar as credênciais (password) do utilizador ------------
	if ($user_pwd != $config_auth_password)
	{	
		http_response_code(200);	
		echo('{"erro": "Erro de autenticação!"}' . PHP_EOL);		
		exit();
	}
	//------------------------------------------------------------------

	
	//--- verificar chave admitida: "switch" ---------------------------
	if ($user_key != "set" && $user_key != "get")
	{
		http_response_code(400);					
		echo('{"erro": "Serviço apenas disponível para a chave: \'set\' e \'get\'."}' . PHP_EOL);
		exit();					
	}	
	//------------------------------------------------------------------
	
		
	//--- verificar chave: "set" a chave "value" tem que existir -------
	if ($user_key == "set")
	{
		if (!isset($DATA['value'])){
			http_response_code(400);
			echo('{"erro": "Falta do parâmetro \'value\'"}' . PHP_EOL);			
			exit();							
		}		
		//--- obter value -------------
		$user_value = "/" . $DATA['value'];		
	}	
	else{// get		
		$user_value = "";
	}
	//------------------------------------------------------------------
	
	
	
	// *******************************************************************************
	// ***        ENVIAR dados para o Arduino				              ************
	// *******************************************************************************
	$ch = curl_init();
	//------------------------  ALTERAR O IP PARA O DO ARDUINO YUN -----
	curl_setopt($ch, CURLOPT_URL,"http://10.20.228.50/arduino/digital/13" . $user_value);
	curl_setopt($ch, CURLOPT_USERPWD, "root:arduino");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); 		//timeout in seconds	
	curl_setopt($ch, CURLOPT_TIMEOUT, 5); 				//timeout in seconds	
	$result = curl_exec ($ch);
	curl_close ($ch);
	// *******************************************************************************

		
	//-------  Resposta ao cliente  ------------------------------------	
	if($result){
		$parts = explode(" ", trim($result, "\r\n"));
		$json = array("status" => "OK", "value" => $parts[count($parts) - 1]);
	}else{
		http_response_code(401);							
		$json = array("status" => "ERRO");
	}	
	echo(json_encode($json) . PHP_EOL);	
	//------------------------------------------------------------------	
?>
