<?php
ob_start(); //Armazena no cache
session_start(); //Inicia a sessão
if (!isset($_SESSION['loginUser']) && (!isset($_SESSION['senhaUser']))) {
  header("Location: ../../login-user/index.php?acao=negado");
  exit();
}
include_once('sair.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include("include/header.php"); 
include ('../../config/conect.php');
$nomeuser = "SELECT * FROM tb_admin WHERE email_admin = '". $_SESSION['loginUser']."'";
?>
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
        <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            
                            <!-- Light Logo icon -->
                            <img src="../assets/images/slogo.png" style="width:50px;" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         
                         <!-- Light Logo text -->    
                         <img src="../assets/images/sesim.png" style="width:120px;" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
<?php include("include/menu.php") ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Início</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Início</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap">
                                            <div>
                                                <h3 class="card-title">Principais doenças e seu Número de Vacinas</h3></div>
                                            <div class="ml-auto">
                                                <ul class="list-inline">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="amp-pxl ct-chart " style="height: 360px;"></div>
                                        <h6 class="text-muted text-info"><i class="fa fa-circle font-10 m-r-10"></i>Quantidade de casos</h6>
                                        <h6 style="color:#26c6da;"><i class="fa fa-circle font-10 m-r-10"></i>Quantidade de medicamentos</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5">
                        <div class="card">
                            <div class="card-block">
                                <h3 class="card-title">Regiões mais Afetadas</h3>
                                <div id="visitor" style="height:290px; width:100%;"></div>
                            </div>
                            <div>
                                <hr class="m-t-0 m-b-0">
                            </div>
                            <div class="card-block text-center ">
                                <ul class="list-inline m-b-0">
                                    <?php 
      //echo $id;

        //GRAFICO POR REGIÃO
      $select='SELECT localidade, count(*) AS qt FROM tb_grafico GROUP BY localidade ORDER BY count(*) DESC LIMIT 4';
      try{
        $result = $con->prepare($select);
        $result->execute();
            for($i = 0; $i < 4; $i++){
$show = $result->FETCH(PDO::FETCH_OBJ);
 $tipo = $show->localidade;
 $quantidade = $show->qt;
 $vetor[$i] = $tipo;
 $qnt[$i] = $quantidade;               
         }        
      }catch(PDOException $e){
        echo "<b>Erro de select no PDO</b> ".$e->getMessage();
      }
//=-=-=-=-=-=-==-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//GRAFICO DAS DOENÇAS
$select='SELECT tipo_doenca, count(*) AS qt FROM tb_grafico GROUP BY tipo_doenca ORDER BY count(*) DESC LIMIT 6';
      try{
        $result = $con->prepare($select);
        $result->execute();
            for($i = 0; $i < 6; $i++){
$show = $result->FETCH(PDO::FETCH_OBJ);
 $tipo = $show->tipo_doenca;
 $quantidaded = $show->qt;
 $tipoD[$i] = $tipo;
 $qntDoenca[$i] = $quantidaded;            
         }        
      }catch(PDOException $e){
        echo "<b>Erro de select no PDO</b> ".$e->getMessage();
      }

//VACINAS
      $select='SELECT comb_vacina, count(*) AS qt FROM tb_vacina GROUP BY comb_vacina ORDER BY count(*) DESC LIMIT 6';
      try{
        $result = $con->prepare($select);
        $result->execute();
            for($i = 0; $i < 6; $i++){
$show = $result->FETCH(PDO::FETCH_OBJ);
 $comb = $show->qt;
 $combate[$i] = $comb;            
         }        
      }catch(PDOException $e){
        echo "<b>Erro de select no PDO</b> ".$e->getMessage();
      }

?>
                                    <li>
                                        <h6 style="color:#01a3a4;"><i class="fa fa-circle font-10 m-r-10 "></i><?php echo $vetor[0]; ?></h6>
                                    </li>
                                    <li>
                                        <h6 class="" style="color:#745af2;"><i class="fa fa-circle font-10 m-r-10"></i><?php echo $vetor[1]; ?></h6> </li>

                                    <li>
                                        <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10"></i><?php echo $vetor[2]; ?></h6> </li>
                                    <li>
                                        <h6 class="text-muted text-info"><i class="fa fa-circle font-10 m-r-10"></i><?php echo $vetor[3]; ?></h6> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row -->
                <!-- Row -->
                
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include("include/rodape.php") ?>


<!-- GRAFICOS -->

            <script type="text/javascript">
/*
Template Name: Material Pro Admin
Author: Themedesigner
Email: niravjoshi87@gmail.com
File: js
*/
$(function() {
    "use strict";
    //GRÁFICO POR REGIÃO
 var r1 = "<?php echo $vetor[0]; ?>"; 
 var r2 = "<?php echo $vetor[1]; ?>"; 
 var r3 = "<?php echo $vetor[2]; ?>";
 var r4 = "<?php echo $vetor[3]; ?>";

 var q1 = "<?php echo $qnt[0]; ?>";
 var q2 = "<?php echo $qnt[1]; ?>";
 var q3 = "<?php echo $qnt[2]; ?>";
 var q4 = "<?php echo $qnt[3]; ?>";    
 //GRÁFICO DAS DOENÇAS
 var d = ["<?php echo $tipoD[0]; ?>", "<?php echo $tipoD[1]; ?>", "<?php echo $tipoD[2]; ?>", "<?php echo $tipoD[3]; ?>", "<?php echo $tipoD[4]; ?>", "<?php echo $tipoD[5]; ?>"];
 var qnt = ["<?php echo $qntDoenca[0]; ?>", "<?php echo $qntDoenca[1]; ?>", "<?php echo $qntDoenca[2]; ?>", "<?php echo $qntDoenca[3]; ?>", "<?php echo $qntDoenca[4]; ?>", "<?php echo $qntDoenca[5]; ?>"];
 var limite = parseInt(qnt[0]);
 var combateD = ["<?php echo $combate[0]; ?>", "<?php echo $combate[1]; ?>", "<?php echo $combate[2]; ?>", "<?php echo $combate[3]; ?>", "<?php echo $combate[4]; ?>", "<?php echo $combate[5]; ?>"]

    // ============================================================== 
    // Sales overview
    // ============================================================== 
    var chart2 = new Chartist.Bar('.amp-pxl', {
        labels: [d[0], d[1], d[2], d[3], d[4], d[5]],
        series: [
            [qnt[0], qnt[1], qnt[2], qnt[3], qnt[4], qnt[5]],
            [combateD[0], combateD[1], combateD[2], combateD[3], combateD[4], combateD[5]]
        ]
    }, {
        axisX: {
            // On the x-axis start means top and end means bottom
            position: 'end',
            showGrid: false
        },
        axisY: {
            // On the y-axis start means left and end means right
            position: 'start'
        },
        high: limite + 0.5,
        low: '0',
        plugins: [
            Chartist.plugins.tooltip()
        ]
    });

    var chart = [chart2];

    // ============================================================== 
    // This is for the animation
    // ==============================================================
    for (var i = 0; i < chart.length; i++) {
        chart[i].on('draw', function(data) {
            if (data.type === 'line' || data.type === 'area') {
                data.element.animate({
                    d: {
                        begin: 500 * data.index,
                        dur: 500,
                        from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                        to: data.path.clone().stringify(),
                        easing: Chartist.Svg.Easing.easeInOutElastic
                    }
                });
            }
            if (data.type === 'bar') {
                data.element.animate({
                    y2: {
                        dur: 500,
                        from: data.y1,
                        to: data.y2,
                        easing: Chartist.Svg.Easing.easeInOutElastic
                    },
                    opacity: {
                        dur: 500,
                        from: 0,
                        to: 1,
                        easing: Chartist.Svg.Easing.easeInOutElastic
                    }
                });
            }
        });
    }

    // ============================================================== 
    // Our visitor
    // ============================================================== 
    var chart = c3.generate({
        bindto: '#visitor',
        data: {
            columns: [
                [r1, q1],
                [r2, q2],
                [r3, q3],
                [r4, q4],
            ],

            type: 'donut',
            onclick: function(d, i) { console.log("onclick", d, i); },
            onmouseover: function(d, i) { console.log("onmouseover", d, i); },
            onmouseout: function(d, i) { console.log("onmouseout", d, i); }
        },
        donut: {
            label: {
                show: false
            },
            title: "Por Região",
            width: 20,

        },

        legend: {
            hide: true
                //or hide: 'data1'
                //or hide: ['data1', 'data2']
        },
        color: {
            pattern: ['#01a3a4', '#745af2', '#26c6da', '#1e88e5']
        }
    });





});




            </script>
</body>

</html>
