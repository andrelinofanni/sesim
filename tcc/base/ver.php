<?php
ob_start(); //Armazena no cache
session_start(); //Inicia a sessão
if (!isset($_SESSION['loginUser']) && (!isset($_SESSION['senhaUser']))) {
  header("Location: index.php?acao=negado");
  exit();
}
include_once('sair.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Biblioteca Estadual</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

      <h5 class="navbar-brand">AutoCAR</h5>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
              
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <li class="nav-item">
           <a class="nav-link disabled" href="?sair" onclick="return confirm('Deseja realmente sair do sistema?')">Sair do Sistema</a>
          </li>
          
        </form>
      </div>
    </nav>
    <?php
    include('config/conect.php'); 
        $id = filter_input(INPUT_GET,'id',FILTER_DEFAULT);
        //echo $id;
        $select = "SELECT * FROM tb_carro WHERE id_car=:id";
        try{
            $result = $con->prepare($select);
            $result->bindParam(':id',$id,PDO::PARAM_INT);
            $result->execute();
              $contar = $result->rowCount();
              if ($contar > 0) {
                 while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) {
                   $idCar = $exibir-> id_car;
                   $foto = $exibir-> foto_car;
                   $modelo = $exibir-> mod_car;
                   $marca = $exibir-> marca_car;
                   $ano = $exibir-> ano_car;
                 }
               }else{
                echo '<div class ="alert alert-danger"><strong>AVISO ! </strong> Não há dados com o id informado :( </div>';
               } 
        }catch(PDOException $e){
          echo "<b> ERROR PDO no Select : ! </b>".$e->getMessage();
        }

    ?>
    <div class="container" style="margin-top: 50px;">
    <div class="row">
      <div class="col-8">
      <td><img style="width:150px;" src="img/home/<?php echo $foto; ?>"></td>
          <h1>Carro: <strong><?php echo $modelo ?></strong></h1>
          <h3>Ano: <strong><?php echo $ano ?></strong></h3>
            <h4>Marca: <strong><?php echo $marca ?></strong></h4>
          <a href="home.php" class="btn btn-primary">«« Voltar para o cadastro de Carros</a>
      </div>
    </div>
    </div> <!-- /container -->


    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
