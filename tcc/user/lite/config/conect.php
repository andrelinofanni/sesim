<?php

	try{
		@DEFINE('HOST','localhost'); //Nome do servidor(localhost)
		@DEFINE('DB','BD_sesim'); //Nome do banco de dados (bd_agenda)
		@DEFINE('USER','root'); //Nome do usúario (root)
		@DEFINE('PASS','qwe123'); //Senha do BD (qwe123);

		$con = new PDO('mysql:host='.HOST.';dbname='.DB,USER,PASS);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo "<b>ERRO = </b>".$e->getMessage();
	}