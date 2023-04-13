<?php
/*
* Nome do maquina de hospedagem(localhost);
* Usuario do banco(root);
* Senha de acesso(qwe123);
* Qual o nome do banco(mydb);
*/
try{
	// COSTANTES PARA CONEXÃO COM O BD.
	@DEFINE('HOST','localhost');
	@DEFINE('DB','BD_sesim');
	@DEFINE('USER','root');
    @DEFINE('PASS','qwe123');
	//VARIAVEL DE CONEXÃO
	$con = new PDO('mysql:host='.HOST.';dbname='.DB,USER,PASS);
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
		//TRATAMENTO DE ERROS DO PDO.
	  echo "<b>ERRO: </b>".$e->getMessage();
}