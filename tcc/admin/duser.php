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
// CONTAR QUANTIDADE DE CRIANÇAS, ADULTOS E IDOSOS
 $idade='SELECT idade, count(idade) AS qt FROM tb_grafico GROUP BY idade ORDER BY count(idade) ASC LIMIT 3';
      try{
        $result = $con->prepare($idade);
        $result->execute();
            for($i = 0; $i < 3; $i++){
$show = $result->FETCH(PDO::FETCH_OBJ);
 $tipo = $show->idade;
 $quantidade = $show->qt;
 $vetor[$i] = $tipo;
 $qnt[$i] = $quantidade;
         }
      }catch(PDOException $e){
        echo "<b>Erro de select no PDO</b> ".$e->getMessage();
      }
       ?>
    <section class="content">
        <div class="page-announce valign-wrapper cyan darken-2"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Usuários</h1></div>
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
              <h3><?php echo $qnt[0];?></h3>
              <p><?php echo $vetor[0];?>s</p>
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
              <h3><?php echo $qnt[1];?></h3>
              <p><?php echo $vetor[1];?>s</p>
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
              <h3><?php echo $qnt[2];?></h3>
              <p><?php echo $vetor[2];?></p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
          </div><!-- ./col -->
    </div>
    <table id="example" class="mdl-data-table" style="height:100px;">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Região</th>
          <th>Doença</th>
          <th>Vizualizar</th>
        </tr>
      </thead>
      <tbody>
        <?php

                      $select = "SELECT * FROM tb_grafico ORDER BY id_grafico DESC";

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
            <td><?php echo $exibir->localidade; ?></td>
            <td><?php echo $exibir->tipo_doenca; ?></td>
            <td><a href="ver-user.php?id=<?php echo $exibir->id_grafico; ?>" class="waves-effect waves-light btn"><i class="material-icons" style="font-size:25px;">visibility
            </i></a></td>
          </tr>
                    <?php

                                            }
                                          }else{
                                            echo '<div class="alert alert-danger"> <strong>Aviso ! </strong> Não há há dados cadastrados :(</div>';
                                          }
                      }catch (PDOException $e) {
                        echo '<div class ="alert alert-danger">Algo deu errado, por favor tente novamente :( </div>';
                        //echo "<b>Erro de select do PDO</b>".$e->getMessage();
                      }
                ?>
      </tbody>
    </table>
  </div>
    </section>
    </main>
    <?php include('include/rodape.php'); ?>
  </body>
</html>
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
        columnDefs: [
            {
                targets: [ 0, 1, 2 ],
                className: 'mdl-data-table__cell--non-numeric',
            }
        ],
        "lengthMenu": [[6, 10, 25, -1], [6, 10, 25, "All"]],
        "language": {
            "lengthMenu": "",
            "zeroRecords": "Registro não encontrado",
            "info": "Exibindo página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
           "search": "Pesquisar&nbsp;:",
            "infoFiltered": "(Filtrado de _MAX_ registros no total)",
            "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
    }
        } 
    } );
} );

</script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-1.12.4.js"></script>
     <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/dataTables.material.min.js"></script>