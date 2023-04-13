<?php
ob_start(); //Armazena no cache
session_start(); //Inicia a sessão
if (isset($_SESSION['loginAdmin']) && (isset($_SESSION['senhaAdmin']))) {
  header("Location: home.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Entrar
					</span>
				</div>

				<form class="login100-form validate-form" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">E-mail</span>
						<input class="input100" type="email" name="email" placeholder="email@exemplo.com">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="senha" placeholder="Digite sua senha">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">

						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Login
						</button>
					</div>
				</form>
				<?php
      include_once('../config/conect.php');
        if (isset($_GET['acao'])) {
          if (!isset($_POST['login'])) {
          $acao = $_GET['acao'];
          if ($acao == 'negado') {
           echo '<br> <div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>Erro</strong> ao acessar o sistema :(</div>';
            }
          }
        }
      if (isset($_POST['login'])) {
        $login = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
        $select = "SELECT * FROM tb_admin WHERE email_admin=:emailAdmin AND senha_admin=:senhaAdmin";

        try {
          $resultLogin = $con->prepare($select);
          $resultLogin->bindParam(':emailAdmin',$login, PDO::PARAM_STR);
          $resultLogin->bindParam(':senhaAdmin',$senha, PDO::PARAM_STR);
          $resultLogin->execute();

          $verificar = $resultLogin->rowCount();
          if ($verificar > 0) {
            $login = trim(strip_tags($_POST['email']));;
            $senha = trim(strip_tags($_POST['senha']));;
            //CRIANDO A SESSÃO DE LOGIN E SENHA
            $_SESSION['loginAdmin'] = $login;
            $_SESSION['senhaAdmin'] = $senha;

            echo '<br> <div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Logado com sucesso!</strong> Login em andamento</div>';
            header("Refresh: 1, home.php");
          }else{
            echo '<br> <div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>Erro!</strong> login ou senha incorretos, digite outro login ou consulte o administrador :(</div>';
          }
        } catch (PDOException $e){
          echo '<div class ="alert alert-danger">Algo deu errado, por favor tente novamente :( </div>';
          //echo "ERRO DE LOGIN DO PDO : ".$e->getMessage();
        }
      }
    ?>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>