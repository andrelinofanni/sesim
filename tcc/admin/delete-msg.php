<?php

include('../config/conect.php');
if (isset($_GET['idDel'])) {
	$id = $_GET['idDel'];
	$delete = "DELETE FROM tb_msg WHERE id_msg=:id";

	try{
		$result = $con->prepare($delete);
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
