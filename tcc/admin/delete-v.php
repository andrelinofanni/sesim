<?php

include('../config/conect.php');
if (isset($_GET['idDel'])) {
	$id = $_GET['idDel'];
	$delete = "DELETE FROM tb_vacina WHERE id_vacina=:id";

	try{
		$result = $con->prepare($delete);
		$result->bindValue(':id',$id,PDO::PARAM_INT);
		$result->execute();

		$contar=$result->rowCount();
		if ($contar>0) {
			header("Location: man-v.php");
		}else{
			header("Location: man-v.php");
		}
	}catch(PDOException $e){
		echo "<b>ERRO DE DELETE: </b>".$e->getMessage();
	}
}