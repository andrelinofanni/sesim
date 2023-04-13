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
      <div class="container">
        <h3>Informações da doença</h3>
        <br>
        <form id="cad-form-doenca" role="form" action="" method="post" enctype="multipart/form-data">
          <?php
if (isset($_POST['cadDoenca'])) {
  include('../config/conect.php');
              // $img = $_FILES['img'];
              // echo "<pre>";
              // print_r($img);
              // echo "</pre>";
              //trim ig_nora uso de espaço antes e depois da palavra ou frase
              //strip_tags não interpreta o uso de tags dentro do input
             $nome = trim(strip_tags($_POST['nome']));
             $cronica = trim(strip_tags($_POST['cronica']));
             $sintomas = trim(strip_tags($_POST['sintoma']));
             $descri = trim(strip_tags($_POST['desc']));
             $insert = "INSERT INTO tb_doenca(nome_doenca,doenca_cronica,sintomas_doenca,desc_doenca) VALUES (:nome,:cronica,:sintomas,:descri)";

             try{
              //Proteção contra SQLINJECT
              $result = $con->prepare($insert);
              $result->bindParam(':nome',$nome,PDO::PARAM_STR);
              $result->bindParam(':cronica',$cronica,PDO::PARAM_STR);
              $result->bindParam(':sintomas',$sintomas,PDO::PARAM_STR);
              $result->bindParam(':descri',$descri,PDO::PARAM_STR);
              $result->execute();
              $contar = $result->rowCount();
              if ($contar>0) {
                echo "
    <div class='card-panel cyan darken-2 white-text'>Cadastrado com sucesso!</div>
            ";
           header( "Refresh:2; man-d.php");
              }
             }catch(PDOException $e){
              echo"<div class='card-panel red darken-2 white-text'>Algo deu errado, por favor tente novamente</div>";
                //echo "<strong>Erro de sql: </strong>".$e->getMessage();
             }
           }
            ?>
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" class="validate" required="">
                <label for="cronica">Crônica: </label>
    <div class="input-field col s12">
    <select name="cronica" id="cronica" required="">
      <option value="Escolha uma alternativa" disabled selected>Escolha uma alternativa</option>
      <option value="Não Informado">Não Informado</option>
      <option value="Sim">Sim</option>
      <option value="Não">Não</option>
    </select>
  </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="sintoma" name="sintoma" class="materialize-textarea" required=""></textarea>
          <label for="sintoma">Sintomas:</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <textarea id="desc" name="desc" class="materialize-textarea" required=""></textarea>
          <label for="desc">Descrição:</label>
        </div>
      </div>
      <button type="submit" name="cadDoenca" class="btn">Cadastrar Doença</button>
            </form>
  </div>
    </section>  
    </main>
   <?php include('include/rodape.php'); ?>
  </body>
</html>