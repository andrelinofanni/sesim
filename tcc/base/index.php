<?php
ob_start(); //Armazena no cache
session_start(); //Inicia a sessão
if (isset($_SESSION['loginUser']) && (isset($_SESSION['senhaUser']))) {
  header("Location: home.php");
  exit();
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Simple login form</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div class="container">
  <div class="login">
  	<h1 class="login-heading">
      <strong>Bem Vindo.</strong> Faça Login.</h1>
      <form method="post">
        <input type="email" name="email" placeholder="Username" required="required" class="input-txt" />
          <input type="password" name="senha" placeholder="Password" required="required" class="input-txt" />
          <div class="login-footer">
             <a href="#" class="lnk">
              <span class="icon icon--min">ಠ╭╮ಠ</span> 
              I've forgotten something
            </a>
            <button type="submit" name="login" class="btn btn--right">Sign in  </button>
    
          </div>
      </form>
      <?php
      include_once('config/conect.php');
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
        $select = "SELECT * FROM tb_admin WHERE email_admin=:emailLogin AND senha_admin=:senhaLogin";

        try {
          $resultLogin = $con->prepare($select);
          $resultLogin->bindParam(':emailLogin',$login, PDO::PARAM_STR);
          $resultLogin->bindParam(':senhaLogin',$senha, PDO::PARAM_STR);
          $resultLogin->execute();

          $verificar = $resultLogin->rowCount();
          if ($verificar > 0) {
            $login = $_POST['email'];
            $senha = $_POST['senha'];
            //CRIANDO A SESSÃO DE LOGIN E SENHA
            $_SESSION['loginUser'] = $login;
            $_SESSION['senhaUser'] = $senha;

            echo '<br> <div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Logado com sucesso!</strong> Login em andamento</div>';
            header("Refresh: 1, home.php");
          }else{
            echo '<br> <div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>Erro!</strong> login ou senha incorretos, digite outro login ou consulte o administrador :(</div>';
          }
        } catch (PDOException $e){
          echo "ERRO DE LOGIN DO PDO : ".$e->getMessage();
        }
      }
    ?>

  </div>
</div>
  
    <script  src="js/index.js"></script>

</body>
</html>
