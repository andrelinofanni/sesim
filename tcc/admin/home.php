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
      <!-- Stat Boxes -->
     <?php
      //CONTAR ENVIOS
      include('../config/conect.php');
$envios = 'SELECT * FROM tb_grafico';
        try{
          $result=$con->prepare($envios);
          $result->execute();

          $qenvios = $result->rowCount();
        }catch(PDOException $e){
          echo "ERRO DE PDO :".$e->getMessage();
        }

      //CONTAR VACINAS E REMÉDIOS
      include('../config/conect.php');
$vacinas = 'SELECT * FROM tb_vacina';
        try{
          $result=$con->prepare($vacinas);
          $result->execute();

          $qvacinas = $result->rowCount();
        }catch(PDOException $e){
          echo "ERRO DE PDO :".$e->getMessage();
        }
              //CONTAR DOENÇAS
      include('../config/conect.php');
$doencas = 'SELECT * FROM tb_doenca';
        try{
          $result=$con->prepare($doencas);
          $result->execute();

          $qdoenca = $result->rowCount();
        }catch(PDOException $e){
          echo "ERRO DE PDO :".$e->getMessage();
        }

              //CONTAR USUÁRIOS
      include('../config/conect.php');
$usuarios = 'SELECT * FROM tb_user';
        try{
          $result=$con->prepare($usuarios);
          $result->execute();

          $quser = $result->rowCount();
        }catch(PDOException $e){
          echo "ERRO DE PDO :".$e->getMessage();
        }
       ?>
    <section class="content">
        <div class="page-announce valign-wrapper cyan darken-2"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Ínicio</h1></div>
  <div class="container">
    <div class="row">
              <div class="col l3 s6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $qenvios ?></h3>
              <p>Envios</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
          </div><!-- ./col -->
                        <div class="col l3 s6">
          <!-- small box -->
          <div class="small-box green accent-4">
            <div class="inner">
              <h3><?php echo $qvacinas;?></h3>
              <p>Vacinas</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
          </div><!-- ./col -->
                        <div class="col l3 s6">
          <!-- small box -->
          <div class="small-box yellow darken-3">
            <div class="inner">
              <h3><?php echo $qdoenca;?></h3>
              <p>Doenças</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
          </div><!-- ./col -->
                        <div class="col l3 s6">
          <!-- small box -->
          <div class="small-box red darken-3">
            <div class="inner">
              <h3><?php echo $quser?></h3>
              <p>Usuários</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
          </div><!-- ./col -->
    </div>
              <div class="container">

                <h3 class="center-align">Mensagens para Aprovação</h3>
                <div class="custom-responsive">
                  <table class="striped hover centered">
                    <thead><tr>
                      <th>Nome</th>
                      <th>Mensagem</th>
                      <th>Ver</th>
                      <th>Aprovar</th>
                      <th>Deletar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
        include('../config/conect.php');
                      $select = "SELECT * FROM tb_msg WHERE status='-' ORDER BY id_msg DESC";

                        $contagem = 1;

                       try {
                          $result = $con->prepare($select);
                          $result->execute();
                              // Contar os registros cadastrados na tabela tb_contato
                          $contar = $result->rowCount();
                              // Condição para a execução dos registros              
                              if ($contar>0) {
                                              while ($exibir = $result->FETCH(PDO::FETCH_OBJ)) { ?>
                                                <!-- Modal Structure -->
  <div id="modal1?id=<?php echo $exibir->id_msg ?>" class="modal">
    <div class="modal-content">
      <h4><?php echo $exibir->nome_msg ?></h4>
      <p><?php echo $exibir->mensagem_msg ?></p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Fechar</a>
    </div>
  </div>
                    <tr>
                      <td><?php echo $exibir->nome_msg ?></td>
                      <td><?php echo $exibir->mensagem_msg ?></td>
                      <td><a class="waves-effect waves-light btn modal-trigger" href="#modal1?id=<?php echo $exibir->id_msg ?>"><i class="text-green material-icons">visibility</i></a></td>
                      <td><a href="ap-msg.php?idUp=<?php echo $exibir->id_msg ?>" class="btn blue darken-1"><i class="material-icons">thumb_up</i></a></td>
                      <td><a href="delete-msg.php?idDel=<?php echo $exibir->id_msg ?>" class="btn red darken-1"><i class="material-icons">thumb_down</i></a></td>
                    </tr>
                     <?php

                                            }
                                          }else{
                                            echo '<div class="alert alert-danger"> Nenhuma Mensagem por aqui :)</div>';
                                          }              
                      }catch (PDOException $e) {
                        echo "<b>Erro de select do PDO</b>".$e->getMessage();
                      } 
                ?>                 
                  </tbody>
                </table>
              </div>
            </div>
          </div>
            <!-- Modal Trigger -->
  


          
        </section>
        </main>
        <?php include('include/rodape.php'); ?>
      </body>
    </html>
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