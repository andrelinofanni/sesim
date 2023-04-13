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
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         
                         <!-- Light Logo text -->    
                         <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
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
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
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
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Table</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Table</li>
                        </ol>
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
                        <a href="https://wrappixel.com/templates/materialpro/" class="btn waves-effect waves-light btn-danger pull-right hidden-sm-down"> Upgrade to Pro</a>
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
                                            <input type="text" class="form-control form-control-line" name="nome" id="nome">
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="mensagem">mensagem</label>
                  <input type="text" name="mensagem" class="form-control" id="mensagem" >
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
                            error_reporting(0);
            include('config/conect.php');
            if (isset($_POST['cadEnv'])) {
              
             $nome = trim(strip_tags($_POST['nome']));
             $mensagem = trim(strip_tags($_POST['mensagem']));
             
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
            Selecione uma foto para contato !
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
        $extensao = end(explode('.', $name));
        $novoNome = rand().".$extensao";
        
        if($error != 0)
          $msg[] = "<b>$name :</b> ".$errorMsg[$error];
        else if(!in_array($type, $permite))
          $msg[] = "<b>$name :</b> Erro imagem não suportada!";
        else if($size > $maxSize)
          $msg[] = "<b>$name :</b> Erro imagem ultrapassa o limite de 2MB";
        else{
          
          if(move_uploaded_file($tmp, $folder.'/'.$novoNome)){
            $insert = "INSERT INTO tb_msg (nome_msg,mensagem_msg,foto_contato) VALUES (:nome,:mensagem,:foto)";

             try{
              //Proteção contra SQLINJECT
              $result = $con->prepare($insert);
              $result->bindParam(':nome',$nome,PDO::PARAM_STR);
              $result->bindParam(':mensagem',$mensagem,PDO::PARAM_STR);
              $result->bindParam(':foto',$novoNome,PDO::PARAM_STR);
              $result->execute();
              $contar = $result->rowCount();
              if ($contar>0) {
                echo "<div class ='alert alert-sucess' role='alert'><strong>Cadastrado com sucesso!</strong></div>";
                header("Refresh :2, home.php");
              }
             }catch(PDOException $e){
                echo "<strong>Erro de sql: </strong>".$e->getMessage();
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
      <div class="col-lg-6">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Mensagens Recentes</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="table_id_contato">
                <tr>
                  <th>N</th>
                  <th>Foto</th>
                  <th>Nome</th>
                  <th>Mensagem</th>
                </tr>
                <?php
                    $select = "SELECT * FROM tb_msg ORDER BY id_msg DESC";

                      $contagem = 1;

                     try {
                        $result = $con->prepare($select);
                        $result->execute();
                            // Contar os registros cadastrados na tabela tb_contato
                        $contar = $result->rowCount();
                            // Condição para a execução dos registros              
                            if ($contar>0) {
                                            while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) { ?>
                                             <!-- HTML dentro de um while no PHP -->
                  <tr>
                  <td><?php echo $contagem++; ?></td>
                  <td><img style="width:45px; border-radius:80%" src="img//<?php echo $exibir->foto_contato; ?>"</td>
                  <td><?php echo $exibir->nome_msg; ?></td>
                  <td><?php echo $exibir->mensagem_msg; ?></td>
                 
                </tr>
                                              
                                             
                                            <?php

                                            }
                                          }else{
                                            echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">x</button><strong>Aviso ! </strong> Não há há contatos cadastrados :(</div>';
                                          }              
                      }catch (PDOException $e) {
                        echo "<b>Erro de select do PDO</b>".$e->getMessage();
                      } 
                ?>
                        </div>
                    </div>
                    <!-- Column -->
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
            </body>
</html>