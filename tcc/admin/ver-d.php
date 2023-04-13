<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Control Panel</title>
<?php include('include/header.php'); ?>
  </head>
  
  <body>
    <?php include('include/menu.php'); ?>
    <main>
    <section class="content">
      <div class="page-announce valign-wrapper cyan darken-2"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Cadastro de doença</h1></div>
      <?php
    include('../config/conect.php'); 
        $id = filter_input(INPUT_GET,'id',FILTER_DEFAULT);
        //echo $id;
        $select = "SELECT * FROM tb_doenca WHERE id_doenca=:id";
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
          echo '<div class ="alert alert-danger">Algo deu errado, por favor tente novamente :( </div>';
          //echo "<b> ERROR PDO no Select : ! </b>".$e->getMessage();
        }

    ?>
      <div class="container">
        <h3>Informações da doença</h3>
        <br>
        <form id="cad-form-doenca" role="form" action="" method="post" enctype="multipart/form-data">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" disabled>
                <label for="cronica">Crônica: </label>
    <div class="input-field col s12">
    <select name="cronica" id="cronica" disabled>
      <option value="sem"><?php echo $cronica ?></option>
    </select>
  </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="sintoma" name="sintoma" class="materialize-textarea" disabled><?php echo $sintomas ?></textarea>
          <label for="sintoma">Sintomas:</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="desc" name="desc" class="materialize-textarea" disabled><?php echo $desc ?></textarea>
          <label for="desc">Descrição:</label>
        </div>
      </div>
      <a href="man-d.php" class="btn">Voltar</a>
            </form>
  </div>
    </section>  
    </main>
   <?php include('include/rodape.php'); ?>
  </body>
</html>