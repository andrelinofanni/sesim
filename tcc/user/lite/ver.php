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
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user" class="profile-pic m-r-10" />Markarn Doe</a>
                        </li>
                    </ul>
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
                    <div class="container">

                    <!-- Column -->
                    <!-- Column -->
                    <!-- Column -->
<?php
    include('../../config/conect.php'); 
        $id = filter_input(INPUT_GET,'id',FILTER_DEFAULT);
        //echo $id;
        $select = "SELECT * FROM tb_doenca WHERE nome_doenca=:id";
        try{
            $result = $con->prepare($select);
            $result->bindParam(':id',$id,PDO::PARAM_INT);
            $result->execute();
              $contar = $result->rowCount();
              if ($contar > 0) {
                 while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) {
                   $id_doenca = $exibir-> id_doenca;
                   $nome = $exibir-> nome_doenca;
                   $cronica = $exibir-> doenca_cronica;
                   $sintomas = $exibir-> sintomas_doenca;
                   $desc = $exibir-> desc_doenca;
                 }
               }else{
                echo '<div class ="alert alert-danger"><strong>AVISO ! </strong> Não há dados com o id informado :( </div>';
               } 
        }catch(PDOException $e){
          echo "<b> ERROR PDO no Select : ! </b>".$e->getMessage();
        }

    ?>
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <div class="card-block">
                                <h1 class="text-center"><?php echo $nome ?></h1>
                                <h4>Descrição</h4>
                                <p><?php echo $desc; ?></p>
                                <h4>Sintomas</h4>
                                <p><?php echo $sintomas ?></p>
                               <?php
        $id = filter_input(INPUT_GET,'id',FILTER_DEFAULT);
        //echo $id;
        $qtv = "SELECT comb_vacina, count(*) AS qt FROM tb_vacina WHERE comb_vacina=:id GROUP BY comb_vacina ORDER BY count(*) DESC LIMIT 1
";
$quantidade = 0;
        try{
            $result = $con->prepare($qtv);
            $result->bindParam(':id',$id,PDO::PARAM_INT);
            $result->execute();
              $contar = $result->rowCount();
              if ($contar > 0) {
                 while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) {
                   $quantidade = $exibir-> qt;
                 }
               }
        }catch(PDOException $e){
          echo "<b> ERROR PDO no Select : ! </b>".$e->getMessage();
        }

    ?>
        <h4>Crônica: <?php echo $cronica ?></h4>
                                <h4>Número de Vacinas e remédios: <?php echo $quantidade ?></h4>
                                <?php 
                                if ($quantidade > 0) {
                                  echo '<a href="#"  data-toggle="modal" data-target=".bd-example-modal-lg">Veja mais sobre os medicamentos</a>';
                                }
                                 ?>                      
                    <a href="sobred.php" class="btn btn-success pull-right">Voltar</a>              
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="accordion" id="accordionExample">
                <?php
        include('../../config/conect.php');
                      $select = "SELECT * FROM tb_vacina WHERE comb_vacina='".$id."'";

                        $contagem = 1;
                        $contador = 1;

                       try {
                          $result = $con->prepare($select);
                          $result->execute();
                              // Contar os registros cadastrados na tabela tb_contato
                          $contar = $result->rowCount();
                              // Condição para a execução dos registros              
                              if ($contar>0) {
                                              while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) { ?>
  <div class="card">
    <div class="card-header" id="<?php echo $exibir->nome_vacina ?>">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#<?php echo $contador ?>" aria-expanded="true" aria-controls="<?php echo $contador ?>">
          <?php echo $exibir->nome_vacina; ?>
        </button>
      </h5>
    </div>

    <div id="<?php echo $contador ?>" class="collapse" aria-labelledby="<?php echo $exibir->nome_vacina ?>" data-parent="#accordionExample">
      <div class="card-body">
        <p><b>Recomendação:</b> <?php echo $exibir->rec_vacina ?></p>
        <p><b>Contraindicações:</b> <?php echo $exibir->contra_vacina ?></p>
        <p><b>Composição: </b><?php echo $exibir->comp_vacina ?></p>
      </div>
    </div>
  </div>
<?php
$contador++;
                                            }
                                          }else{
                                            echo '<div class="alert alert-danger"> <strong>Aviso ! </strong> Não há há contatos cadastrados :(</div>';
                                          }              
                      }catch (PDOException $e) {
                        echo "<b>Erro de select do PDO</b>".$e->getMessage();
                      } 
                ?>
</div>
    </div>
  </div>
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
