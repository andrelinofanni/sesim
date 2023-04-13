<?php
				if (isset($_POST['cadUser'])) {
				include('../config/conect.php');
              // $img = $_FILES['img'];
              // echo "<pre>";
              // print_r($img);
              // echo "</pre>";
              //trim ig_nora uso de espaço antes e depois da palavra ou frase
              //strip_tags não interpreta o uso de tags dentro do input
             $nome = trim(strip_tags($_POST['nome']));
             $idade = str_replace("/","-",trim(strip_tags($_POST['idade'])));
             $sexo = trim(strip_tags($_POST['sexo']));
             $email = trim(strip_tags($_POST['email']));
             $senha = trim(strip_tags($_POST['senha']));
             $insert = "INSERT INTO tb_user(nome_user,idade_user,sexo_user,email_user,senha_user) VALUES (:nome,:idade,:sexo,:email,:senha)";
             try{
              //Proteção contra SQLINJECT
              $result = $con->prepare($insert);
              $result->bindParam(':nome',$nome,PDO::PARAM_STR);
              $result->bindParam(':idade',$idade,PDO::PARAM_INT);
              $result->bindParam(':sexo',$sexo,PDO::PARAM_STR);
              $result->bindParam(':email',$email,PDO::PARAM_STR);
              $result->bindParam(':senha',$senha,PDO::PARAM_STR);
              $result->execute();
              $contar = $result->rowCount();
              if ($contar>0){
                echo '<br> <div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Cadastrado com sucesso!</strong> Aguarde até que você seja Redirecionado</div>';
				header("Refresh: 3, index.php");
	              }
             }catch(PDOException $e){
                echo "<strong>Erro de sql: </strong>".$e->getMessage();
             }
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
						Cadastre-se
					</span>
				</div>
				<form class="login100-form validate-form" id="cad-form-user" role="form" action="" method="post" enctype="multipart/form-data">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Digite seu nome">
						<span class="label-input100">Nome</span>
						<input class="input100" type="text" name="nome" id="nome" placeholder="Digite seu nome">
						<span class="focus-input100"></span>
					</div>
	<div class="form-check validate-input m-b-18 col-lg-12">
<span class="label-input100">Gênero</span>
  <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="Masculino">
  <label class="form-check-label" for="exampleRadios1">
    Masculino
  </label>
    <input class="form-check-input" type="radio" name="sexo" id="exampleRadios2" value="Feminino">
  <label class="form-check-label" for="exampleRadios2">
    Feminino
  </label>
</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Digite uma data válida">
						<span class="label-input100">Data de nacimento</span>
						<input class="input100" type="date" name="idade" id="idade">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Digite um endereço de E-mail válido">
						<span class="label-input100">E-mail</span>
						<input class="input100" type="email" name="email" placeholder="Digite seu E-mail">
						<span class="focus-input100"></span>
					</div>
				<div class="wrap-input100 validate-input m-b-18" data-validate = "Digite uma senha">
						<span class="label-input100">Senha</span>
						<input class="input100" type="password" name="senha" placeholder="Digite sua senha">
						<span class="focus-input100"></span>
					</div>
					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">

						</div>
						<div>
							<a href="index.php" class="txt1">
								Fazer Login
							</a>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="cadUser">
							Cadastro
						</button>
					</div>
				</form>
				
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