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
        include ('../config/conect.php');
      $id = filter_input(INPUT_GET,'idup',FILTER_DEFAULT);
      //echo $id;
      $select='SELECT * FROM tb_doenca WHERE id_doenca=:id';
      try{
        $result = $con->prepare($select);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        $result->execute();
        $contar = $result-> rowCount();
        if ($contar > 0) {
          while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
             $idDoenca = $show->id_doenca;
             $nome = $show->nome_doenca;
             $cronica = $show->doenca_cronica;
             $sintomas = $show->sintomas_doenca;
             $desc = $show->desc_doenca;
           } 
         }else{
          echo '<div class="alert alert-danger"><strong>Aviso!</strong> Não há dados com o id (parametro) informado :(</div>';
         }        
      }catch(PDOException $e){
        echo "<b>Erro de select no PDO</b> ".$e->getMessage();
      }

      //ATUALIZANDO DADOS

      if(isset($_POST['upDoenca'])){
        $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
        $cronica = filter_input(INPUT_POST, 'cronica', FILTER_DEFAULT);
        $sintomas = filter_input(INPUT_POST, 'sintomas', FILTER_DEFAULT);
        $desc = filter_input(INPUT_POST, 'desc', FILTER_DEFAULT);
$update = "UPDATE tb_doenca SET nome_doenca=:nome,doenca_cronica=:cronica,sintomas_doenca=:sintomas,desc_doenca=:desc WHERE id_doenca=:id";
        try{
          $result=$con->prepare($update);
          $result->bindValue(':id',$id,PDO::PARAM_INT);
          $result->bindValue(':nome',$nome,PDO::PARAM_STR);
          $result->bindValue(':cronica',$cronica,PDO::PARAM_STR);
          $result->bindValue(':sintomas',$sintomas,PDO::PARAM_STR);
          $result->bindValue(':desc',$desc,PDO::PARAM_STR);
          $result->execute();
          if ($contar) {
            echo "<div class='alert alert-info' role='alert'><strong>Atualizado com sucesso! </strong>Dados OK:)</div>";
            header( "Refresh:2; man-d.php");
          }
        } 
        catch(PDOException $e){
          echo"<div class='card-panel red darken-2 white-text'>Algo deu errado, por favor tente novamente</div>";
          //echo "<b>ERRO DE UPDATE: </b>".$e->getMessage();
        }
      }
?>
      <div class="container">
        <h3>Informações da doença</h3>
        <br>
        <form id="cad-form-doenca" role="form" action="" method="post" enctype="multipart/form-data">
                <label for="nome">Nome: </label>
                <input required="" type="text" name="nome" id="nome" value="<?php echo $nome?>">
                <label for="cronica">Crônica: </label>
    <div class="input-field col s12">
    <select name="cronica" id="cronica">
      <?php if ($cronica=='Sim'){
        echo "<option value='Sim' selected>Sim</option>
      <option value='Não'>Não</option>
      <option value='Não Informado'>Não Informado</option>";
      }elseif ($cronica=='Não') {
       echo "<option value='Não' disabled selected>Não</option>
      <option value='Sim'>Sim</option>
      <option value='Não Informado'>Não Informado</option>";
      }else{
        echo "<option value='Não Informado'>Não Informado</option>
      <option value='Sim'>Sim</option>
      <option value='Não'>Não</option>";
      }

      ?>
    </select>
  </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea required="" id="sintoma" name="sintomas" class="materialize-textarea"><?php echo $sintomas ?></textarea>
          <label for="sintoma">Sintomas:</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea required="" id="desc" name="desc" class="materialize-textarea"><?php echo $desc?></textarea>
          <label for="desc">Descrição:</label>
        </div>
      </div>
      <button type="submit" name="upDoenca" class="btn">Atualizar Doença</button>
      <a href="man-d.php" class="btn right">Voltar</a>
            </form>
  </div>
    </section>  
    </main>
   <?php include('include/rodape.php'); ?>
  </body>
</html>