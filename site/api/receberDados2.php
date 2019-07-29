<?php

	// RECEBE DADOS DOS SENSORES
	$temp= $_POST["temp"];
	$lux= $_POST["lux"];
	$prox= $_POST["prox"];
	$botao=$_POST["botao"];
	
	// GRAVA OS VALORES RECEBIDOS NOS RESPETIVOS FICHEIROS DE TEXTO
	file_put_contents("temp.data", $temp);
	file_put_contents("lux.data", $lux);
	file_put_contents("prox.data", $prox);
	file_put_contents("botao.data", $botao);
	
	// VAI BUSCAR AO IOT O ESTADO DOS "BOTOES" VIA HTTP GET
	
	
	// PROCESSA TODAS AS INFORMAÇOES E ATIVO OUTPUTS SE NECESSARIO
	
	
	// ENVIA OS DADOS PARA O IOT VIA HTTP POST


	echo "Dados recebidos com sucesso!";
?>
