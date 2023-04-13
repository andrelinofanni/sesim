<?php
ob_start(); //Armazena no cache
session_start(); //Inicia a sessão
if (!isset($_SESSION['loginUser']) && (!isset($_SESSION['senhaUser']))) {
  header("Location: ../../login-user/index.php?acao=negado");
  exit();
}
include_once('sair.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include("include/header.php"); ?>
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
            <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            
                            <!-- Light Logo icon -->
                            <img src="../assets/images/slogo.png" style="width:50px;" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         
                         <!-- Light Logo text -->    
                         <img src="../assets/images/sesim.png" style="width:120px;" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
       <?php include("include/menu.php") ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Cadastro</h3>
                        <p>Cadastre seus dados para a pesquisa</p>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Cadastro</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">

                    <!-- Column -->
                    <!-- Column -->
                    <!-- Column -->

                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <div class="card-block">
                                <form class="form-horizontal form-material" role="form" action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                    <div class="form-group col-10">
                                        <label>Nome Completo</label>
                                        <div>
                                            <input type="text" class="form-control form-control-line" name="nome" required="">
                                        </div>
                                    </div>
<div class="radio col-lg-2">
    <p>Sexo:</p>
<div class="form-check">
  <input class="form-check-input" type="radio" name="sexo" id="masc" value="Masculino">
  <label class="form-check-label" for="masc">
    Masculino
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="sexo" id="fem" value="Feminino">
  <label class="form-check-label" for="fem">
    Feminino
  </label>
</div>
</div>
<div class="form-group col-lg-3">
    <label>Idade</label>
        <div>
            <input type="number" required="" class="form-control form-control-line" name="idade">
        </div>
</div>
<div class="form-group col-lg-9">
    <label for="localidade">Localidade</label>
    <select class="form-control slt" required="" id="localidade" name="localidade" type="search" id="localidade">
        <option selected="" disabled="" value="Sem Informação">Selecione uma Opção de Resposta</option>
      <option value="Aldeia">Aldeia</option>
      <option value="Aldeia Park">Aldeia Park</option>
      <option value="Alto da Boa Vista">Alto da Boa Vista</option>
      <option value="Área Verde">Área Verde</option>
      <option value="Buriti 1">Buriti 1</option>
      <option value="Buriti 2">Buriti 2</option>
      <option value="Buriti dos Esmeros">Buriti dos Esmeros</option>
      <option value="Banguê 1">Banguê 1</option>
      <option value="Banguê 2">Banguê 2</option>
      <option value="Centro">Centro</option>
      <option value="Cohab">Cohab</option>
      <option value="Cumaru">Cumaru</option>
      <option value="Coaçu">Coaçu</option>
      <option value="Croatá 1">Croatá 1</option>
      <option value="Croatá 2">Croatá 2</option>
      <option value="Croatá Cipó">Croatá Cipó</option>
      <option value="Cruz das Almas">Cruz das Almas</option>
      <option value="Cavalaria">Cavalaria</option>
      <option value="Curimatã">Curimatã</option>
      <option value="Formoso">Formoso</option>
      <option value="Itaipaba">Itaipaba</option>
      <option value="Lagoa Seca">Lagoa Seca</option>
      <option value="Lagamar">Lagamar</option>
      <option value="Limoeiro">Limoeiro</option>
      <option value="Mangabeira">Mangabeira</option>
      <option value="Pajeú">Pajeú</option>
      <option value="Pedra Branca">Pedra Branca</option>
      <option value="Planalto Dedé Gama">Planalto Dedé Gama</option>
      <option value="Planalto Popular">Planalto Popular</option>
      <option value="Pascoal">Pascoal</option>
      <option value="Pauliceia">Pauliceia</option>
      <option value="Tucum">Tucum</option>
    </select>
  </div>
</div>
        <div class="form-group">
    <label for="doenca" class="">Doença</label>
    <select class="form-control slt" required="" id="doenca" name="doenca">
        <option selected="" disabled="" value="Sem Informação">Selecione uma Opção de Resposta</option>
        <?php 
      include('../../config/conect.php');
$select = "SELECT * FROM tb_doenca ORDER BY id_doenca DESC";

                        $contagem = 1;

                       try {
                          $result = $con->prepare($select);
                          $result->execute();
                              // Contar os registros cadastrados na tabela tb_contato
                          $contar = $result->rowCount();
                              // Condição para a execução dos registros              
                              if ($contar>0) {
                                              while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) { ?>
       ?>
       <option value="<?php echo $exibir->nome_doenca ?>"><?php echo $exibir->nome_doenca ?></option>
       <?php

                                            }
                                          }else{
                                            echo '<div class="alert alert-danger"> <strong>Aviso ! </strong> Não há há contatos cadastrados :(</div>';
                                          }              
                      }catch (PDOException $e) {
                        echo "<b>Erro de select do PDO</b>".$e->getMessage();
                      } 
                ?>
    </select>
  </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success" name="cadEst">Cadastrar</button>
                                        </div>
                                    </div>
                                </form>
<?php
            if (isset($_POST['cadEst'])) {
              // $img = $_FILES['img'];
              // echo "<pre>";
              // print_r($img);
              // echo "</pre>";
              //trim ig_nora uso de espaço antes e depois da palavra ou frase
              //strip_tags não interpreta o uso de tags dentro do input
             $nome = trim(strip_tags($_POST['nome']));
             @$sexo = trim(strip_tags($_POST['sexo']));
             if (empty($sexo)) {
               $sexo = 'Sem Informação';
             }
             $localidade = trim(strip_tags($_POST['localidade']));
             $doenca = trim(strip_tags($_POST['doenca']));
             $idade = trim(strip_tags($_POST['idade']));
             if ($idade < 18) {
               $idade = 'Criança/Adolescente';
             }elseif ($idade >= 18 && $idade < 60) {
               $idade = 'Adulto';
             }elseif ($idade >= 60) {
               $idade = 'Idoso';
             }
             $insert = "INSERT INTO tb_grafico (nome,genero,localidade,tipo_doenca,idade) VALUES (:nome,:sexo,:localidade,:doenca,:idade)";

             try{
              //Proteção contra SQLINJECT
              $result = $con->prepare($insert);
              $result->bindParam(':nome',$nome,PDO::PARAM_STR);
              $result->bindParam(':sexo',$sexo,PDO::PARAM_STR);
              $result->bindParam(':localidade',$localidade,PDO::PARAM_STR);
              $result->bindParam(':doenca',$doenca,PDO::PARAM_STR);
              $result->bindParam(':idade',$idade,PDO::PARAM_INT);
              $result->execute();
              $contar = $result->rowCount();
              if ($contar>0) {
                echo "<div class ='alert alert-success' role='alert'><strong>Cadastrado com sucesso!</strong></div>";
              }
             }catch(PDOException $e){
              echo"<div class ='alert alert-danger' role='alert'><strong>Algo Deu Errado, por favor tente novamente</strong></div>";
                // /echo "<strong>Erro de sql: </strong>".$e->getMessage();
             }
         }
?>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
<?php include("include/rodape.php") ?>
</body>

</html>
