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
      <div class="page-announce valign-wrapper cyan darken-2"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Cadastro de Vacina</h1></div>
      <div class="container">
        <h3>Informações da Vacina</h3>
        <br>
         <?php 
        include ('../config/conect.php');
      $id = filter_input(INPUT_GET,'idup',FILTER_DEFAULT);
      //echo $id;
      $select='SELECT * FROM tb_vacina WHERE id_vacina=:id';
      try{
        $result = $con->prepare($select);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        $result->execute();
        $contar = $result-> rowCount();
        if ($contar > 0) {
          while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
             $idVacina = $show->id_vacina;
             $nome = $show->nome_vacina;
             $rec = $show->rec_vacina;
             $comb = $show->comb_vacina;
             $contra = $show->contra_vacina;
             $comp = $show->comp_vacina;
           }
           /*
$recomendacoes = $rec;
$palavra = explode(", ", $recomendacoes);
echo $palavra[0];
echo $palavra[1];
echo $palavra[2];
echo $palavra[3];
echo $palavra[4];   */  

// echo $rec;
// echo "<br>";
// if(strpos($rec,'Crianças') !== false){
// echo 'Palavra encontrada na variável';
// }else{
//   echo 'Palavra não encontrada';
// };
// echo "<br>"; 

         }else{
          echo '<div class="alert alert-danger"><strong>Aviso!</strong> Não há dados com o id (parametro) informado :(</div>';
         }        
      }catch(PDOException $e){
        echo "<b>Erro de select no PDO</b> ".$e->getMessage();
      }

      //ATUALIZANDO DADOS

      if(isset($_POST['upVacina'])){
        $nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
        $rec = implode(", ", $_POST['rec']);
        $comb = implode(", ", $_POST['combate']);
        $contra = filter_input(INPUT_POST, 'contra', FILTER_DEFAULT);
        $comp = filter_input(INPUT_POST, 'comp', FILTER_DEFAULT);
$update = "UPDATE tb_vacina SET nome_vacina=:nome,rec_vacina=:rec,comb_vacina=:combate,contra_vacina=:contra,comp_vacina=:comp WHERE id_vacina=:id";
        try{
          $result=$con->prepare($update);
          $result->bindValue(':id',$id,PDO::PARAM_INT);
          $result->bindValue(':nome',$nome,PDO::PARAM_STR);
          $result->bindValue(':rec',$rec,PDO::PARAM_STR);
          $result->bindValue(':combate',$comb,PDO::PARAM_STR);
          $result->bindValue(':contra',$contra,PDO::PARAM_STR);
          $result->bindValue(':comp',$comp,PDO::PARAM_STR);
          $result->execute();
          if ($contar) {
            echo "<div class='alert alert-info' role='alert'><strong>Atualizado com sucesso! </strong>Dados OK:)</div>";
            header( "Refresh:2; man-v.php");
          }
        } 
        catch(PDOException $e){
          echo"<div class='card-panel red darken-2 white-text'>Algo deu errado, por favor tente novamente</div>";
          //echo "<b>ERRO DE UPDATE: </b>".$e->getMessage();
        }
      }
?>
        <form id="cad-form-vacina" role="form" action="" method="post" enctype="multipart/form-data">
                <input required="" type="hidden" name="nome" value="{{ usr.id }}" />
                <label for="nome">Nome: </label>
                <input required="" type="text" id="nome" name="nome" value="<?php echo $nome ?>">
                <label for="rec">Recomendações: </label>
                <div class="input-field col s12">
    <select name="rec[]" id="rec" multiple>
      <option value="Escolha uma alternativa">Escolha uma alternativa</option>
                    <option value="Todos" <?php if(strpos($rec,'Todos') !== false){
              echo 'selected';} ?>>Todos</option>
      <option value="Não Informado" <?php if(strpos($rec,'Informado') !== false){
      echo 'selected';} ?>>Não Informado</option>
        <option value="Recém-nascidos" <?php if(strpos($rec,'Recém-nascidos') !== false){
        echo 'selected';} ?>>Recém-nascidos</option>
        <option value="Recém-nascidos" <?php if(strpos($rec,'Gestantes') !== false){
        echo 'selected';} ?>>Gestantes</option>
          <option value="Crianças" <?php if(strpos($rec,'Crianças') !== false){
          echo 'selected';} ?>>Crianças</option>
          <option value="Adolescentes" <?php if(strpos($rec,'Adolescentes') !== false){
          echo 'selected';} ?>>Adolecentes</option>
            <option value="Adultos" <?php if(strpos($rec,'Adultos') !== false){
            echo 'selected';} ?>>Adultos</option>
              <option value="Idosos" <?php if(strpos($rec,'Idosos') !== false){
              echo 'selected';} ?>>Idosos</option>
    </select>
  </div>
<label for="combate">Combate: </label>
  <div class="input-field col s12">
    <select name="combate[]" id="combate" multiple>
      <option value="Escolha uma alternativa" disabled selected>Escolha uma alternativa</option>
      <option value="Não Informado">Não Informado</option>
      <?php 
      include('../config/conect.php');
$select = "SELECT * FROM tb_doenca ORDER BY id_doenca DESC";

                        $contagem = 1;

                       try {
                          $result = $con->prepare($select);
                          $result->execute();
                              // Contar os registros cadastrados na tabela tb_contato
                          $contar = $result->rowCount();
                              // Condição para a execução dos registros              
                              if ($contar>0) {
                                              while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) { 
        $nome = $exibir->nome_doenca;
                                                ?>
       <option value="<?php echo $nome ?>" <?php if(strpos($comb,$nome) !== false){
      echo 'selected';} ?>><?php echo $nome ?></option>
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
                <div class="row">
      <div class="row">
        <div class="input-field col s12">
          <textarea required="" id="contra" name="contra" class="materialize-textarea"><?php echo $contra ?></textarea>
          <label for="contra">Contraindicações:</label>
        </div>
      </div>
  </div>
                <div class="row">
      <div class="row">
        <div class="input-field col s12">
          <textarea required="" id="comp" name="comp" class="materialize-textarea"><?php echo $comp ?></textarea>
          <label for="comp">Componentes:</label>
        </div>
      </div>
      <button type="submit" name="upVacina" class="btn">Atualizar Vacina</button>
      <a href="man-v.php" class="btn right">Voltar</a>
    </form>
  </div>
      </div>
    </section>
    </main>
   <?php include('include/rodape.php'); ?>
  </body>
</html>