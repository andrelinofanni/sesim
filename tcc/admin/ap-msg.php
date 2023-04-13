<?php

include('../config/conect.php');
if (isset($_GET['idUp'])) {
	$id = $_GET['idUp'];
	$update = "UPDATE tb_msg SET status='aprovado' WHERE id_msg=:id";

	try{
		$result = $con->prepare($update);
		$result->bindValue(':id',$id,PDO::PARAM_INT);
		$result->execute();

		$contar=$result->rowCount();
		if ($contar>0) {
			header("Location: home.php");
		}else{
			header("Location: home.php");
		}
	}catch(PDOException $e){
		echo "<b>ERRO DE DELETE: </b>".$e->getMessage();
	}
}
