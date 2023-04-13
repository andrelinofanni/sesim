<?php
	if (isset($_REQUEST['sair'])) {
		//session_unset('loginUser');
		//session_unset('senhaUser');
		session_destroy();
		header("Location: index.php");
	}
	?>