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
        <form id="cad-form-vacina" role="form" action="" method="post" enctype="multipart/form-data">
          <?php
if (isset($_POST['cadvacina'])) {
  include('../config/conect.php');
              // $img = $_FILES['img'];
              // echo "<pre>";
              // print_r($img);
              // echo "</pre>";
              //trim ignora uso de espaço antes e depois da palavra ou frase
              //strip_tags não interpreta o uso de tags dentro do input
             $nome = trim(strip_tags($_POST['nome']));
             $rec = implode(", ", $_POST['rec']); // implode converte para string
             $combate = trim(strip_tags($_POST['combate']));
             $contra = trim(strip_tags($_POST['contra']));
             $comp = trim(strip_tags($_POST['comp']));
             $insert = "INSERT INTO tb_vacina(nome_vacina,rec_vacina,comb_vacina,contra_vacina,comp_vacina) VALUES (:nome,:rec,:combate,:contra,:comp)";

             try{
              //Proteção contra SQLINJECT
              $result = $con->prepare($insert);
              $result->bindParam(':nome',$nome,PDO::PARAM_STR);
              $result->bindParam(':rec',$rec,PDO::PARAM_STR);
              $result->bindParam(':combate',$combate,PDO::PARAM_STR);
              $result->bindParam(':contra',$contra,PDO::PARAM_STR);
              $result->bindParam(':comp',$comp,PDO::PARAM_STR);
              $result->execute();
              $contar = $result->rowCount();
              if ($contar>0) {
                echo "
    <div class='card-panel cyan darken-2 white-text'>Cadastrado com sucesso!</div>
            ";
           header( "Refresh:2; man-v.php");
              }
             }catch(PDOException $e){
              echo"<div class='card-panel red darken-2 white-text'>Algo deu errado, por favor tente novamente</div>";
                //echo "<strong>Erro de sql: </strong>".$e->getMessage();
             }
           }
            ?>
                <input type="hidden" name="nome" value="{{ usr.id }}" />
                <label for="nome">Nome: </label>
                <input type="text" required="" class="validate" id="nome" name="nome">
                <label for="rec">Recomendações: </label>
                <div class="input-field col s12">
    <select name="rec[]" required="" id="rec" multiple>
      <option value="Não Informado" disabled selected>Escolha uma alternativa</option>
      <option value="Não Informado">Não Informado</option>
      <option value="Todos">Todos</option>
      <option value="Recém-nascidos">Recém-nascidos</option>
      <option value="Gestantes">Gestantes</option>
      <option value="Crianças">Crianças</option>
      <option value="Adolescente">Adolecentes</option>
      <option value="Adultos">Adultos</option>
      <option value="Idosos">Idosos</option>
    </select>
  </div>
<label for="combate">Combate: </label>
  <div class="input-field col s12">
    <select name="combate" required="" id="combate">
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
                                              while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) { ?>
       ?>
       <option value="<?php echo $exibir->nome_doenca ?>"><?php echo $exibir->nome_doenca ?></option>
       <?php

                                            }
                                          }else{
                                            echo '<div class="alert alert-danger"> <strong>Aviso ! </strong> Não há há vacinas cadastradas :(</div>';
                                          }              
                      }catch (PDOException $e) {
                        echo '<div class ="alert alert-danger">Algo deu errado, por favor tente novamente :( </div>';            
                        //echo "<b>Erro de select do PDO</b>".$e->getMessage();
                      } 
                ?>
</select>
  </div>
                <div class="row">
      <div class="row">
        <div class="input-field col s12">
          <textarea id="contra" required="" name="contra" class="materialize-textarea"></textarea>
          <label for="contra">Contraindicações:</label>
        </div>
      </div>
  </div>
                <div class="row">
      <div class="row">
        <div class="input-field col s12">
          <textarea id="comp" required="" name="comp" class="materialize-textarea"></textarea>
          <label for="comp">Componentes:</label>
        </div>
      </div>
      <button type="submit" name="cadvacina" class="btn">Cadastrar Vacina</button>
    </form>
  </div>
      </div>
    </section>
    </main>
   <?php include('include/rodape.php'); ?>
  </body>
</html>