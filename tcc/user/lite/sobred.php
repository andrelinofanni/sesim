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
<style type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"></style>
<style type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"></style>
</head>
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
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Doenças</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Doenças</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Basic Table</h4>
                                <div class="table-responsive">
                                    <table class="table" id="tabela">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nome</th>
                                                <th>Vacinas</th>
                                                <th>Ver</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php
        include('../../config/conect.php');
                      $select = "select tb_doenca.nome_doenca,  count(tb_vacina.nome_vacina) AS qt from tb_doenca left join tb_vacina on nome_doenca = comb_vacina GROUP BY nome_doenca;";

                        $contagem = 1;

                       try {
                          $result = $con->prepare($select);
                          $result->execute();
                              // Contar os registros cadastrados na tabela tb_contato
                          $contar = $result->rowCount();
                              // Condição para a execução dos registros  
                              $contador = 1;           
                              if ($contar>0) {
                                              while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) { ?>
                                            <tr>
                                                <td><?php echo $contador ?></td>
                                                <td><?php echo $exibir->nome_doenca; ?></td>
                                                <td><?php echo $exibir->qt ?></td>
                                                <td><a href="ver.php?id=<?php echo $exibir->nome_doenca; ?>" class="btn btn-info"><i class="mdi mdi-eye"></i></a></td>
                                            </tr>
                                             <?php
                                            $contador++;
                                            }
                                          }else{
                                            echo '<div class="alert alert-danger">Não há nada por aqui :(</div>';
                                          }              
                      }catch (PDOException $e) {
                        echo '<div class="alert alert-danger">Algo deu errado, por favor entre em contato com o administrador clicando <a href="../../home/index.php">aqui</a> :(</div>';
                        //echo "<b>Erro de select do PDO</b>".$e->getMessage();
                      } 
                ?>               
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
