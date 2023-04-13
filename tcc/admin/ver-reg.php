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
      <div class="page-announce valign-wrapper cyan darken-2"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Visualizar Envio Regional</h1></div>
      <div class="container">
    <ul class="collapsible">
          <li>
                  <?php
    include('../config/conect.php'); 
        $id = filter_input(INPUT_GET,'id',FILTER_DEFAULT);
        //echo $id;
        $select = "select count(tipo_doenca) as qt_doenca from tb_grafico where localidade='$id'";
        try{
            $result = $con->prepare($select);
            $result->bindParam(':id',$id,PDO::PARAM_INT);
            $result->execute();
              $contar = $result->rowCount();
              if ($contar > 0) {
                 while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) {
                   $quantidadeD = $exibir-> qt_doenca;
                 }
               }else{
                echo '<div class ="alert alert-danger"><strong>AVISO ! </strong> Não há dados com o id informado :( </div>';
               } 
        }catch(PDOException $e){
          echo "<b> ERROR PDO no Select : ! </b>".$e->getMessage();
        }

    ?>
            <div class="collapsible-header active">
              <i class="material-icons">description</i>
              Informações da Localidade
            </div>
            <div class="collapsible-body">
              <b><p class="center"><?php echo $id ?></p></b>
              <p>Quantidade de envios: <?php echo $quantidadeD ?></p>

               <?php
        //echo $id;
        $select = "SELECT idade, COUNT(idade) as qt_idade FROM tb_grafico where localidade='$id'GROUP BY idade ORDER BY COUNT(idade) DESC LIMIT 1;";
        try{
            $result = $con->prepare($select);
            $result->bindParam(':id',$id,PDO::PARAM_INT);
            $result->execute();
              $contar = $result->rowCount();
              if ($contar > 0) {
                 while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) {
                   $quantidadeP = $exibir-> idade;
                 }
               }else{
                echo '<div class ="alert alert-danger"><strong>AVISO ! </strong> Não há dados com o id informado :( </div>';
               } 
        }catch(PDOException $e){
          echo "<b> ERROR PDO no Select : ! </b>".$e->getMessage();
        }
if ($quantidadeP == 'Criança/Adolescente') {
 $quantidadeP = 'Crianças e Adolescentes';
}elseif ($quantidadeP == 'Adulto') {
  $quantidadeP = 'Adultos';
}elseif ($quantidadeP == 'Idoso') {
  $quantidadeP = 'Idosos';
}else{
  $quantidadeP = 'Sem informação';
}
    ?>
              <p>Afetou mais <b><?php echo $quantidadeP ?></b></p>
              <p><a href="#modal1">Veja os dados enviados</a></p>
            </div>
          </li>
          <li>
            <div class="collapsible-header">
              <i class="material-icons">place</i>
              Informações sobre a Doença
              </div>
            <div class="collapsible-body">
               <?php
        //echo $id;
        $select = "SELECT tipo_doenca, COUNT(tipo_doenca) as ctipoD FROM tb_grafico where localidade='Aldeia Park' GROUP BY tipo_doenca ORDER BY COUNT(tipo_doenca) DESC LIMIT 1;";
        try{
            $result = $con->prepare($select);
            $result->bindParam(':id',$id,PDO::PARAM_INT);
            $result->execute();
              $contar = $result->rowCount();
              if ($contar > 0) {
                 while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) {
                   $dmc = $exibir-> tipo_doenca;
                   $qdmc = $exibir-> ctipoD;
                 }
               }else{
                echo '<div class ="alert alert-danger"><strong>AVISO ! </strong> Não há dados com o id informado :( </div>';
               } 
        }catch(PDOException $e){
          echo '<div class ="alert alert-danger">Algo deu errado, por favor tente novamente :( </div>';
          //echo "<b> ERROR PDO no Select : ! </b>".$e->getMessage();
        }
    ?>
              <b><p class="center"><?php echo $dmc ?></p></b>

                             <?php
        //echo $id;
        $select = "select count(tipo_doenca) as tipo_doenca_m from tb_grafico where tipo_doenca = '$dmc';";
        try{
            $result = $con->prepare($select);
            $result->bindParam(':id',$id,PDO::PARAM_INT);
            $result->execute();
              $contar = $result->rowCount();
              if ($contar > 0) {
                 while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) {
                   $dmcm = $exibir-> tipo_doenca_m;
                 }
               }else{
                echo '<div class ="alert alert-danger"><strong>AVISO ! </strong> Não há dados com o id informado :( </div>';
               } 
        }catch(PDOException $e){
          echo "<b> ERROR PDO no Select : ! </b>".$e->getMessage();
        }
    ?>
              <p>Quantidade de casos no Município: <?php echo $dmcm ?></p>
              <p>Quantidade de casos na Região: <?php echo $qdmc ?></p>
              <p></p>
            </div>
          </li>
        </ul>
          <!-- Modal Trigger -->
  

  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
<table class="responsive-table striped hover centered" style="height:100px;">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Gênero</th>
          <th>Doença</th>
        </tr>
      </thead>
      <tbody>
        <?php
                      $select = "SELECT * FROM tb_grafico where localidade='$id'";

                        $contagem = 1;

                       try {
                          $result = $con->prepare($select);
                          $result->execute();
                              // Contar os registros cadastrados na tabela tb_contato
                          $contar = $result->rowCount();
                              // Condição para a execução dos registros              
                              if ($contar>0) {
                                              while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) { ?>
          <tr>
            <td><?php echo $exibir->nome; ?></td>
            <td><?php echo $exibir->genero ?></td>
            <td><?php echo $exibir->tipo_doenca ?></td>
            <td><a href="ver-user.php?id=<?php echo $exibir->id_grafico; ?>" class="waves-effect waves-light btn"><i class="material-icons" style="font-size:25px;">visibility
            </i></a></td>
          </tr>
          <?php

                                            }
                                          }else{
                                            echo '<div class="alert alert-danger"> <strong>Aviso ! </strong> Não há há contatos cadastrados :(</div>';
                                          }              
                      }catch (PDOException $e) {
                        echo "<b>Erro de select do PDO</b>".$e->getMessage();
                      } 
                ?>
      </tbody>
    </table>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
    </div>
  </div>
  </div>
    </section>
  </main>
   <?php include('include/rodape.php'); ?>

         <script type="text/javascript">
       document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.modal').modal();
  });
   </script>
  
  </body>
</html>
