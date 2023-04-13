<?php
ob_start(); //Armazena no cache
session_start(); //Inicia a sessão
if (!isset($_SESSION['loginUser']) && (!isset($_SESSION['senhaUser']))) {
  header("Location: index.php?acao=negado");
  exit();
}
include_once('../login-admin/sair.php');
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
    <div class="container" style="margin-top: 40px;">
    <div class="row">
      <div class="col-5">
          <form role="form" action="" method="post" enctype="multipart/form-data">
          
    <div class="form-group row">
    <div class="form-group row">
      <label for="cadFoto">Cadastre sua foto: </label>
      <input type="file" id="cadFoto" name="img[]">
      </div>
      <label for="modelo" class="col-sm-2 col-form-label">Modelo</label>
      <div class="col-sm-10">
      <input required type="text" name="modelo" class="form-control" id="modelo" >       
      </div>
    </div>
    <div class="form-group row">
      <label for="marca" class="col-sm-2 col-form-label">Marca</label>
      <div class="col-sm-10">
        <input type="text" name="marca" class="form-control" id="marca" >
      </div>
    </div>
    <div class="form-group row">
      <label for="ano" class="col-sm-2 col-form-label">Ano</label>
      <div class="col-sm-10">
        <input type="text" name="ano" class="form-control" id="ano" >
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button name="cadCarro" type="submit" class="btn btn-primary">Cadastrar Carro</button>
      </div>
    </div>
  </form>
  <?php
            include('config/conect.php');
            if (isset($_POST['cadCarro'])) {
              // $img = $_FILES['img'];
              // echo "<pre>";
              // print_r($img);
              // echo "</pre>";
              //trim ig_nora uso de espaço antes e depois da palavra ou frase
              //strip_tags não interpreta o uso de tags dentro do input
             $modelo = trim(strip_tags($_POST['modelo']));
             $marca = trim(strip_tags($_POST['marca']));
             $ano = trim(strip_tags($_POST['ano']));
             //INFO IMAGEM
    $file     = $_FILES['img'];
    $numFile  = count(array_filter($file['name']));
    
    //PASTA
    $folder   = 'img/home/';
    
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
        
        $extensao = @end(explode('.', $name));
        $novoNome = rand().".$extensao";
        
        if($error != 0)
          $msg[] = "<b>$name :</b> ".$errorMsg[$error];
        else if(!in_array($type, $permite))
          $msg[] = "<b>$name :</b> Erro imagem não suportada!";
        else if($size > $maxSize)
          $msg[] = "<b>$name :</b> Erro imagem ultrapassa o limite de 2MB";
        else{
          
          if(move_uploaded_file($tmp, $folder.'/'.$novoNome)){
            $insert = "INSERT INTO tb_carro (mod_car,marca_car,ano_car,foto_car) VALUES (:modelo,:marca,:ano,:foto)";

             try{
              //Proteção contra SQLINJECT
              $result = $con->prepare($insert);
              $result->bindParam(':modelo',$modelo,PDO::PARAM_STR);
              $result->bindParam(':marca',$marca,PDO::PARAM_STR);
              $result->bindParam(':ano',$ano,PDO::PARAM_INT);
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
  }
    
             // FIM UPLOAD
             //Query SQL (comando de inserção no banco de dados);

          
      ?> 
      </div>
      
      <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="table_id_contato">
                <tr>
                  <th>#</th>
                  <th>Foto</th>
                  <th>Modelo</th>
                  <th>marca</th>
                  <th>ano</th>
                  <th colspan="5">Ações</th>
                </tr>  
      <?php
                    $select = "SELECT * FROM tb_carro ORDER BY id_car DESC";

                      $contagem = 1;

                     try {
                        $result = $con->prepare($select);
                        $result->execute();
                            // Contar os registros cadastrados na tabela tb_contato
                        $contar = $result->rowCount();
                            // Condição para a execução dos registros              
                            if ($contar>0) {
                                            while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) { ?>
      <div class="col-7 row">
          <tr>
                  
                  <td><?php echo $contagem++; ?></td>
                  <td><img style="width:45px; border-radius:80%" src="img/home/<?php echo $exibir->foto_car; ?>"</td>
                  <td><?php echo $exibir->mod_car; ?></td>
                  <td><?php echo $exibir->marca_car; ?></td>
                  <td><?php echo $exibir->ano_car; ?></td>
                  <td><a href="ver.php?id=<?php echo $exibir->id_car; ?>" title="Visualizar" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true">Ver</i></a></td>

                  <td><a href="editar.php?idup=<?php echo $exibir->id_car; ?>" title="Editar" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true">Editar</i></a></td>

                  <td><a href="delete.php?idDel= <?php echo $exibir->id_car; ?>" title="Excluir" class="btn btn-danger"  onclick="return confirm('Deseja realmente deletar o contato ?')"><i class="fa fa-trash" aria-hidden="true">Deletar</i></a></td>
                </tr>
          </div>
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
    </div> <!-- /container -->


    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
