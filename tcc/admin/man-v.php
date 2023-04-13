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
        <div class="page-announce valign-wrapper cyan darken-2"><a href="#" data-activates="slide-out" class="button-collapse valign hide-on-large-only"><i class="material-icons">menu</i></a><h1 class="page-announce-text valign">Manutenção de Vacinas</h1></div>
  <div class="container">
    <table id="example" class="mdl-data-table" style="height:100px;">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Recomendações</th>
          <th>Combate</th>
          <th>Contraindicações</th>
          <th>Ver</th>
          <th>Editar</th>
          <th>Deletar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include('../config/conect.php');
                      $select = "SELECT * FROM tb_vacina ORDER BY id_vacina DESC";

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
            <td><?php echo mb_strimwidth("$exibir->nome_vacina", 0, 20, "..."); ?></td>
            <td><?php echo mb_strimwidth("$exibir->rec_vacina", 0, 20, "..."); ?></td>
            <td><?php echo $exibir->comb_vacina; ?></td>
            <td><?php echo mb_strimwidth("$exibir->contra_vacina", 0, 30, "..."); ?></td>
            <td><a href="ver-v.php?id=<?php echo $exibir->id_vacina; ?>" class="waves-effect waves-light btn"><i class="material-icons" style="font-size:25px;">visibility
            </i></a></td>
            <td><a href="edit-v.php?idup=<?php echo $exibir->id_vacina; ?>" class="waves-effect waves-light btn amber darken-1"><i style="font-size:25px;" class="material-icons" >edit</i></a></td>
            <td><a  onclick="return confirm('Deseja realmente deletar?')" href="delete-v.php?idDel=<?php echo $exibir->id_vacina; ?>" class="waves-effect waves-light btn red darken-1"><i style="font-size:25px;" class="material-icons">delete</i></a></td>
          </tr>
           <?php

                                            }
                                          }else{
                                            echo '<div class="alert alert-danger"> <strong>Aviso ! </strong> Não há dados cadastrados :(</div>';
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
        "lengthMenu": [[10, 25, -1], [6, 10, 25, "All"]],
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