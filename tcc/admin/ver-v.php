<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <title>Control Panel</title>
<?php include('include/header.php'); ?>
  </head>
  
  <body>
    <?php include('include/menu.php'); ?>
    <main>
    <section class="content">
       <?php
    include('../config/conect.php'); 
        $id = filter_input(INPUT_GET,'id',FILTER_DEFAULT);
        //echo $id;
        $select = "SELECT * FROM tb_vacina WHERE id_vacina=:id";
        try{
            $result = $con->prepare($select);
            $result->bindParam(':id',$id,PDO::PARAM_INT);
            $result->execute();
              $contar = $result->rowCount();
              if ($contar > 0) {
                 while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) {
                   $id_vacina = $exibir-> id_vacina;
                   $nome = $exibir-> nome_vacina;
                   $rec = $exibir-> rec_vacina;
                   $comb = $exibir-> comb_vacina;
                   $contra = $exibir-> contra_vacina;
                   $comp = $exibir-> comp_vacina;
                 }
               }else{
                echo '<div class ="alert alert-danger"><strong>AVISO ! </strong> Não há dados com o id informado :( </div>';
               } 
        }catch(PDOException $e){
          echo '<div class ="alert alert-danger">Algo deu errado, por favor tente novamente :( </div>';
          //echo "<b> ERROR PDO no Select : ! </b>".$e->getMessage();
        }
    ?>
      <div class="page-announce valign-wrapper cyan darken-2"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Cadastro de Vacina</h1></div>
      <div class="container">
        <h3>Informações da Vacina</h3>
        <br>
        <form id="cad-form-vacina" role="form" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="nome" value="{{ usr.id }}" />
                <label for="nome">Nome: </label>
                <input type="text" id="nome" name="nome" value="<?php echo $nome?>" disabled>
                <label for="rec">Recomendações: </label>
                <div class="input-field col s12">
      <input type="text" name="rec" value="<?php  echo $rec ?>" disabled>
  </div>
<label for="combate">Combate: </label>
  <div class="input-field col s12">
    <input type="text" name="comb" value="<?php echo $comb?>" disabled>
  </div>
                <div class="row">
      <div class="row">
        <div class="input-field col s12">
          <textarea id="contra" name="contra" class="materialize-textarea" disabled><?php echo $contra; ?></textarea>
          <label for="contra">Contraindicações:</label>
        </div>
      </div>
  </div>
                <div class="row">
      <div class="row">
        <div class="input-field col s12">
          <textarea id="comp" name="comp" class="materialize-textarea" disabled><?php echo $comp ?></textarea>
          <label for="comp">Componentes:</label>
        </div>
      </div>
      <a href="man-v.php" class="btn">Voltar</a>
    </form>
  </div>
      </div>
    </section>
    </main>
   <?php include('include/rodape.php'); ?>
  </body>
</html>