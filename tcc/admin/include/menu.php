     <meta charset="UTF-8">
     <?php 
        include ('../config/conect.php');
      //echo $id;
      $select="SELECT * FROM tb_admin WHERE email_admin='".$_SESSION['loginAdmin']."'";
      try{
        $result = $con->prepare($select);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        $result->execute();
        $contar = $result-> rowCount();
        if ($contar > 0) {
          while ($show = $result->FETCH(PDO::FETCH_OBJ)) {
             $nome = $show->nome_admin;
           } 
         }else{
          echo '<div class="alert alert-danger"><strong>Aviso!</strong> Não há dados com o id (parametro) informado :(</div>';
         }        
      }catch(PDOException $e){
        echo "<b>Erro de select no PDO</b> ".$e->getMessage();
      }
      ?>
    <ul id="slide-out" class="side-nav fixed z-depth-4">
      <li>
        <div class="userView">
          <div class="background">
            <img src="assets/img/admin.jpg" style="filter: blur(10px);">
          </div>
          <a href="home.php"><span class="white-text name">Bem vindo!</span></a>
          <a href="home.php"><span class="white-text email"><?php echo utf8_encode($nome); ?></span></a>
        </div>
      </li>
      
      <li>
        <form class="sidebar-form">
          <li><a href="home.php"><i class="material-icons left">add</i>Início</a></li>
              <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header"><i class="material-icons left">add</i>Doenças</a>
            <div class="collapsible-body">
              <ul>
                <li><a href="cad-d.php">Cadastro</a></li>
                <li><a href="man-d.php">Manutenção</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </form>
      </li>    
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header"><i class="material-icons left">add</i>Vacinas ou Remédios</a>
            <div class="collapsible-body">
              <ul>
                <li><a href="cad-v.php">Cadastro</a></li>
                <li><a href="man-v.php">Manutenção</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
            <li>
        <form class="sidebar-form">
              <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header"><i class="material-icons left">add</i>Envios</a>
            <div class="collapsible-body">
              <ul>
                <li><a href="duser.php">Usuários</a></li>
                <li><a href="dreg.php">Regiões</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </form>
      </li> 
       <li><a href="?sair" onclick="return confirm('Deseja realmente sair do sistema?')"><i class="material-icons">error_outline</i>Sair do Sistema</a></li>
    </ul>
