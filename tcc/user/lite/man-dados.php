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
                <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Feedback</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Feedback</li>
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

                    <!-- Column -->
                    <!-- Column -->
                    <!-- Column -->

                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <div class="card-block">
                                <form class="form-horizontal form-material" role="form" action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label for="cadFoto">Cadastre sua foto: </label>
                                        <input type="file" id="cadFoto" name="img[]">
                                        <br>
                                     <br>
                                        <label for="nome">Nome Completo:</label>
                                        <div>
                                            <input type="text" class="form-control form-control-line" required="" name="nome" id="nome">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="mensagem">mensagem</label>
                                        <textarea name="mensagem" required="" class="form-control" id="mensagem" ></textarea>
                                    </div>
</div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button name="cadEnv" type="submit" class="btn btn-primary">Enviar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php
            include('config/conect.php');
            if (isset($_POST['cadEnv'])) {
              
             $nome = trim(strip_tags($_POST['nome']));
             $mensagem = trim(strip_tags($_POST['mensagem']));
             $status = '-';
             
             // INICIO UPLOAD
             //INFO IMAGEM
    $file     = $_FILES['img'];
    $numFile  = count(array_filter($file['name']));
    
    //PASTA
    $folder   = 'img/';
    
    //REQUISITOS
    $permite  = array('image/jpeg', 'image/png', 'image/jpg', 'image/gif');
    $maxSize  = 1024 * 1024 * 2;
    
    //MENSAGENS
    $msg    = array();
    $errorMsg = array(
      1 => 'O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini.',
      2 => 'O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário HTML',
      3 => 'o upload do arquivo foi feito parcialmente',
      4 => 'Não foi feito o upload do arquivo'
    );
    
    if($numFile <= 0){
      echo '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Selecione uma foto!
          </div>';
    }
    else if($numFile >=2){
      echo '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Seu limite é de uma foto apenas
          </div>';
    }else{
      for($i = 0; $i < $numFile; $i++){
        $name   = $file['name'][$i];
        $type = $file['type'][$i];
        $size = $file['size'][$i];
        $error  = $file['error'][$i];
        $tmp  = $file['tmp_name'][$i];
        
        @$extensao = end(explode('.', $name));
        $novoNome = rand().".$extensao";
        
        if($error != 0)
          $msg[] = "<b>$name :</b> ".$errorMsg[$error];
        else if(!in_array($type, $permite))
          $msg[] = "<b>$name :</b> Erro imagem não suportada!";
        else if($size > $maxSize)
          $msg[] = "<b>$name :</b> Erro imagem ultrapassa o limite de 2MB";
        else{
          
          if(move_uploaded_file($tmp, $folder.'/'.$novoNome)){
            $insert = "INSERT INTO tb_msg (nome_msg,mensagem_msg,foto_contato,status) VALUES (:nome,:mensagem,:foto,:status)";

             try{
              //Proteção contra SQLINJECT
              $result = $con->prepare($insert);
              $result->bindParam(':nome',$nome,PDO::PARAM_STR);
              $result->bindParam(':mensagem',$mensagem,PDO::PARAM_STR);
              $result->bindParam(':foto',$novoNome,PDO::PARAM_STR);
              $result->bindParam(':status',$status,PDO::PARAM_STR);
              $result->execute();
              $contar = $result->rowCount();
              if ($contar>0) {
                echo "<div class ='alert alert-sucess' role='alert'><strong>Cadastrado com sucesso!</strong></div>";
                
              }
             }catch(PDOException $e){
                echo"<div class ='alert alert-danger' role='alert'><strong>Algo Deu Errado, por favor tente novamente</strong></div>";
                //echo "<strong>Erro de sql: </strong>".$e->getMessage();
             }

            
          }else
            $msg[] = "<b>$name :</b> Desculpe! Ocorreu um erro , dados não enviados !";
        
        }
        
        foreach($msg as $pop)
        echo '';
          //echo $pop.'<br>';
      }
    }
             // FIM UPLOAD
             //Query SQL (comando de inserção no banco de dados);
             
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