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
      <div class="page-announce valign-wrapper cyan darken-2"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Visualizar Envio</h1></div>
      <?php
    include('../config/conect.php'); 
        $id = filter_input(INPUT_GET,'id',FILTER_DEFAULT);
        //echo $id;
        $select = "SELECT * FROM tb_grafico WHERE id_grafico=:id";
        try{
            $result = $con->prepare($select);
            $result->bindParam(':id',$id,PDO::PARAM_INT);
            $result->execute();
              $contar = $result->rowCount();
              if ($contar > 0) {
                 while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) {
                   $id_grafico = $exibir-> id_grafico;
                   $nome = $exibir-> nome;
                   $genero = $exibir-> genero;
                   $localidade = $exibir-> localidade;
                   $tipoD = $exibir-> tipo_doenca;
                   $idade = $exibir-> idade;
                 }
               }else{
                echo '<div class ="alert alert-danger"><strong>AVISO ! </strong> Não há dados com o id informado :( </div>';
               } 
        }catch(PDOException $e){
          echo "<b> ERROR PDO no Select : ! </b>".$e->getMessage();
        }

    ?>
      <div class="container">
        <ul class="collapsible">
          <li>
            <div class="collapsible-header active">
              <i class="material-icons">description</i>
              Informações do Envio
            </div>
            <div class="collapsible-body">
              <b><p class="center"><?php echo $nome ?></p></b>
              <p>Gênero: <?php echo $genero ?></p>
              <p><?php echo $idade ?></p>
              <p>Região: <?php echo $localidade ?></p>
              <p>Doença: <?php echo $tipoD; ?></p>
            </div>
          </li>
          <li>
            <div class="collapsible-header">
              <i class="material-icons">place</i>
              Informações sobre a Localidade
              </div>
              <?php 
  $contLoc = "SELECT count(localidade) AS qt FROM tb_grafico WHERE localidade='$localidade'";
        try{
            $result = $con->prepare($contLoc);
            $result->bindParam(':id',$id,PDO::PARAM_INT);
            $result->execute();
              $contar = $result->rowCount();
              if ($contar > 0) {
                 while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) {
                   $contarL = $exibir-> qt;
                 }
               }else{
                echo '<div class ="alert alert-danger"><strong>AVISO ! </strong> Não há dados com o id informado :( </div>';
               } 
        }catch(PDOException $e){
          echo "<b> ERROR PDO no Select : ! </b>".$e->getMessage();
        }

               ?>

 <?php 
  $exD = "SELECT tipo_doenca, COUNT(tipo_doenca) AS qtidade FROM tb_grafico
where localidade='$localidade'
GROUP BY tipo_doenca
ORDER BY COUNT(tipo_doenca) DESC
LIMIT 1;";
        try{
            $result = $con->prepare($exD);
            $result->bindParam(':id',$id,PDO::PARAM_INT);
            $result->execute();
              $contar = $result->rowCount();
              if ($contar > 0) {
                 while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) {
                   $exibird = $exibir-> tipo_doenca;
                   $ncasosR = $exibir-> qtidade;
                                    }
               }else{
                echo '<div class ="alert alert-danger"><strong>AVISO ! </strong> Não há dados com o id informado :( </div>';
               } 
        }catch(PDOException $e){
          echo "<b> ERROR PDO no Select : ! </b>".$e->getMessage();
        }

               ?>
            <div class="collapsible-body">
              <b><p class="center"><?php echo $localidade ?></p></b>
              <p>Número de envios: <?php echo $contarL ?></p>
              <p>Doença mais comum: <?php echo $exibird ?></p>
              <p></p>
            </div>
          </li>
          <li>
            <div class="collapsible-header">
              <i class="material-icons">info</i>
              Informações da Doença
          </div>
          <?php 
  $exV = "SELECT count(nome_vacina) AS qnt FROM tb_vacina WHERE comb_vacina = '$tipoD'";
        try{
            $result = $con->prepare($exV);
            $result->bindParam(':id',$id,PDO::PARAM_INT);
            $result->execute();
              $contar = $result->rowCount();
              if ($contar > 0) {
                 while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) {
                   $nv = $exibir-> qnt;
                                    }
               }else{
                echo '<div class ="alert alert-danger"><strong>AVISO ! </strong> Não há dados com o id informado :( </div>';
               } 
        }catch(PDOException $e){
          echo "<b> ERROR PDO no Select : ! </b>".$e->getMessage();
        }

               ?>
            <div class="collapsible-body">
              <b><p class="center"><?php echo $tipoD ?></p></b>
              <p>numero de casos na Região: <?php echo $ncasosR ?></p>
              <p>Quantidade de Vacinas/Remédios: <?php echo $nv ?></p>
              <p></p>
            </div>
          </li>
        </ul>
  </div>
    </section>
  </main>
   <?php include('include/rodape.php'); ?>
  </body>
</html>
