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
      include ('config/conect.php');
      $id = filter_input(INPUT_GET,'idup',FILTER_DEFAULT);
      //echo $id;
      $select='SELECT * FROM tb_carro WHERE id_car=:id';
      try{
        $result = $con->prepare($select);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        $result->execute();
        $contar = $result-> rowCount();
        if ($contar > 0) {
          while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
             $idCar = $show->id_car;
             $modelo = $show->mod_car;
             $marca = $show->marca_car;
             $ano = $show->ano_car;
           } 
         }else{
          echo '<div class="alert alert-danger"><strong>Aviso!</strong> Não há dados com o id (parametro) informado :(</div>';
         }        
      }catch(PDOException $e){
        echo "<b>Erro de select no PDO</b> ".$e->getMessage();
      }

      //ATUALIZANDO DADOS

      if(isset($_POST['upCarro'])){
        $modelo = filter_input(INPUT_POST, 'modelo', FILTER_DEFAULT);
        $marca = filter_input(INPUT_POST, 'marca', FILTER_DEFAULT);
        $ano = filter_input(INPUT_POST, 'ano', FILTER_DEFAULT);



        $file     = $_FILES['img'];
    $numFile  = count(array_filter($file['name']));
    
    //PASTA
    $folder   = 'img/home';
    
    //REQUISITOS
    $permite  = array('image/jpeg', 'image/png','image/jpg','image/gif');
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
            Selecione uma foto para o contato!
          </div>';
    }
    else if($numFile >=2){
      echo '<div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Seu limite é de uma foto apenas.
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
        $update = "UPDATE tb_carro SET mod_car=:modelo,marca_car=:marca,ano_car=:ano,foto_car=:foto WHERE id_car=:id";
        try{
          $result=$con->prepare($update);
          $result->bindValue(':id',$id,PDO::PARAM_INT);
          $result->bindValue(':modelo',$modelo,PDO::PARAM_STR);
          $result->bindValue(':marca',$marca,PDO::PARAM_STR);
          $result->bindValue(':ano',$ano,PDO::PARAM_STR);
          $result->bindValue(':foto',$novoNome,PDO::PARAM_STR);
          $result->execute();
          if ($contar) {
            echo "<div class='alert alert-success' role='alert'><strong>Atualizado com sucesso! </strong>Dados OK:)</div>";
          }
        } 
        catch(PDOException $e){
          echo "<b>ERRO DE UPDATE: </b>".$e->getMessage();
        }
        }else
            $msg[] = "<b>$name :</b> Desculpe! Ocorreu um erro...";
        
        }
        
        foreach($msg as $pop)
        echo '';
          //echo $pop.'<br>';
      }
    }
             //FIM DO UPLOAD
      }
                     
        ?>
    <div class="container" style="margin-top: 50px;">
    <div class="row">
      <div class="col-7">

          <form role="form" action="" method="post" enctype="multipart/form-data">
          
    <div class="form-group row">
      <label for="modelo" class="col-sm-2 col-form-label">Modelo</label>
      <div class="col-sm-10">
      <input required type="text" name="modelo" class="form-control" id="modelo" value="<?php echo $modelo?>">       
      </div>
    </div>
    <div class="form-group row">
      <label for="marca" class="col-sm-2 col-form-label">Marca</label>
      <div class="col-sm-10">
        <input type="text" name="marca" class="form-control" id="marca" value="<?php echo $marca?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="ano" class="col-sm-2 col-form-label">Ano</label>
      <div class="col-sm-10">
        <input type="text" name="ano" class="form-control" id="ano" value="<?php echo $ano?>">
      </div>
    </div>
    <div class="form-group">
                  <label for="CadFoto">Editar Foto:</label>
                  <input type="file" id="CadFoto" name="img[]">
                </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button name="upCarro" type="submit" class="btn btn-primary">Atualizar Carro</button>
        <a href="home.php" class="btn bt-lg btn-primary"> Voltar para o cadastro de carros</a>

      </div>
    </div>
  </form>
      </div>
      
    </div>
    </div> <!-- /container -->


    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
