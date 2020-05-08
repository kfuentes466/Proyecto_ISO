<!DOCTYPE html>
<?php 
 session_start();
  if(!isset($_SESSION['usuario'])){
    header("location:login.html");
  }
  function mi_autocargador($clase) {
    include_once("../php/class/" . $clase . ".class.php");
  }

 spl_autoload_register('mi_autocargador');
                 
 $graficar = new metodos();
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Home-Eduviges</title>

  <!-- Bootstrap CSS -->
  <link href="../css/icons.min.css" rel="stylesheet">
  <link href="../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="../libs/bootstrap/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="../css/elegant-icons-style.css" rel="stylesheet" />
  <!--<link href="css/font-awesome.min.css" rel="stylesheet" />-->
  <!-- full calendar css-->
  <link href="../libs/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="../libs/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="../libs/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">
  <link href="../css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="../css/fullcalendar.css">
  <link href="../css/widgets.css" rel="stylesheet">
  <link href="../css/style_login.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet" />
  <link href="../css/xcharts.min.css" rel=" stylesheet">
  <link href="../css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <script src="../libs/jquery/ploty.js"></script>
  <script src="../js/jquery.js"></script>

  <style>
    i.icon {
    font-family: 'Glyphicons Halflings';
    color:white;
    font-style: normal;
    }
  </style>

  <script>
       function CrearCadenaLineal(json){
                    var parsed = JSON.parse(json);
                    var arr = [];
                    for(var x in parsed){
                      arr.push(parsed[x]);
                    }

                    return arr;
                  }

        $(document).ready(function(){
          $('#ingresar').mouseenter(function(){
            $("#subIngresar").show();
          });

          $('#subIngresar').mouseleave(function(){
            $("#subIngresar").hide();
          });

 $('#vistas').mouseenter(function(){
            $("#subvistas").show();
          });

          $('#subvistas').mouseleave(function(){
            $("#subvistas").hide();
          });



$('#reportes').mouseenter(function(){
            $("#subreportes").show();
          });

          $('#subreportes').mouseleave(function(){
            $("#subreportes").hide();
          });



$('#ajustes').mouseenter(function(){
            $("#subajustes").show();
          });

          $('#subajustes').mouseleave(function(){
            $("#subajustes").hide();
          });
        })
  </script>
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.html" class="logo">Asociación<span class="lite">Santa Eduviges</span></a>
      <!--logo end-->

     
      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- task notificatoin start -->
         <!-- <li id="task_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-task-l"></i>
                            <span class="badge bg-important">6</span>
                        </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue">You have 6 pending letter</p>
              </li>
              <li>
                <a href="#">
                  <div class="task-info">
                    <div class="desc">Design PSD </div>
                    <div class="percent">90%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                      <span class="sr-only">90% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="task-info">
                    <div class="desc">
                      Project 1
                    </div>
                    <div class="percent">30%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                      <span class="sr-only">30% Complete (warning)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="task-info">
                    <div class="desc">Digital Marketing</div>
                    <div class="percent">80%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                      <span class="sr-only">80% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="task-info">
                    <div class="desc">Logo Designing</div>
                    <div class="percent">78%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%">
                      <span class="sr-only">78% Complete (danger)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="#">
                  <div class="task-info">
                    <div class="desc">Mobile App</div>
                    <div class="percent">50%</div>
                  </div>
                  <div class="progress progress-striped active">
                    <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                      <span class="sr-only">50% Complete</span>
                    </div>
                  </div>

                </a>
              </li>
              <li class="external">
                <a href="#">See All Tasks</a>
              </li>
            </ul>
          </li>-->

          <!-- task notificatoin end -->
          <!-- inbox notificatoin start-->
         <!-- <li id="mail_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-l"></i>
                            <span class="badge bg-important">5</span>
                        </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue">You have 5 new messages</p>
              </li>
              <li>
                <a href="#">
                                    <span class="photo"><img alt="avatar" src="../img/avatar-mini.jpg"></span>
                                    <span class="subject">
                                      
                                    <span class="from"><?php $_SESSION['usuario'] ?></span>
                                    <span class="time">1 min</span>
                                    </span>
                                    <span class="message">
                                        I really like this admin panel.
                                    </span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="photo"><img alt="avatar" src="../img/avatar-mini2.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Bob   Mckenzie</span>
                                    <span class="time">5 mins</span>
                                    </span>
                                    <span class="message">
                                     Hi, What is next project plan?
                                    </span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="photo"><img alt="avatar" src="../img/avatar-mini3.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Phillip   Park</span>
                                    <span class="time">2 hrs</span>
                                    </span>
                                    <span class="message">
                                        I am like to buy this Admin Template.
                                    </span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="photo"><img alt="avatar" src="../img/avatar-mini4.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Ray   Munoz</span>
                                    <span class="time">1 day</span>
                                    </span>
                                    <span class="message">
                                        Icon fonts are great.
                                    </span>
                                </a>
              </li>
              <li>
                <a href="#">See all messages</a>
              </li>
            </ul>
          </li>-->
          <!-- inbox notificatoin end -->
          <!-- alert notification start-->
        <!--  <li id="alert_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-l"></i>
                            <span class="badge bg-important">7</span>
                        </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue">You have 4 new notifications</p>
              </li>
              <li>
                <a href="#">
                                    <span class="label label-primary"><i class="icon_profile"></i></span>
                                    Friend Request
                                    <span class="small italic pull-right">5 mins</span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="label label-warning"><i class="icon_pin"></i></span>
                                    John location.
                                    <span class="small italic pull-right">50 mins</span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="label label-danger"><i class="icon_book_alt"></i></span>
                                    Project 3 Completed.
                                    <span class="small italic pull-right">1 hr</span>
                                </a>
              </li>
              <li>
                <a href="#">
                                    <span class="label label-success"><i class="icon_like"></i></span>
                                    Mick appreciated your work.
                                    <span class="small italic pull-right"> Today</span>
                                </a>
              </li>
              <li>
                <a href="#">See all notifications</a>
              </li>
            </ul>
          </li>-->
          <!-- alert notification end-->
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#" id="ajustes">
                            <span class="profile-ava">
                                <img alt="" src="../img/avatar1_small.jpg">
                            </span>
                            <!-- Aqui se pondra el nombre de quien inicio la sesion -->
                            <span class="username"><?php echo $_SESSION['usuario']['nombre'];?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout" id="subajustes">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="ajustes.php"><i class="icon_profile"></i> Ajustes</a>
              </li>
              <li>
                <a href="salir.php"><i class="icon_key_alt"></i>Salir</a>
              </li>
             
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->

                <aside>
      <div id="sidebar" class="nav-collapse ">
    <?php 
                  if($_SESSION["usuario"]["tipo"] == "1"){
              ?>
              <script type="text/javascript">
                $('#ingresar').mouseenter(function(){
            $("#subIngresar").show();
          });

          $('#subIngresar').mouseleave(function(){
            $("#subIngresar").hide();
          });

 $('#vistas').mouseenter(function(){
            $("#subvistas").show();
          });

          $('#subvistas').mouseleave(function(){
            $("#subvistas").hide();
          });



$('#reportes').mouseenter(function(){
            $("#subreportes").show();
          });

          $('#subreportes').mouseleave(function(){
            $("#subreportes").hide();
          });



$('#ajustes').mouseenter(function(){
            $("#subajustes").show();
          });

          $('#subajustes').mouseleave(function(){
            $("#subajustes").hide();
          });</script>

        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="dash.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="#" class="" id="ingresar">
                          <i class="icon_document_alt"></i>
                          <span>Ingresar </span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub" id="subIngresar">
              <li><a class="" href="pago_agua.php">Ingresar Pago del Agua</a></li>
                
              <li><a class="" href="ingresar_casa_socio.php">Ingresar Socio</a></li>
              <li><a class="" href="agregar_empleado.php">Ingresar Empleado</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="# "  id="vistas">
                          <i class="icon_desktop"></i>
                          <span>Socios</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub" id="subvistas">  
              <li><a class="" href="verSocio.php">Socios Activos</a></li>
              <li><a class="" href="verNoAct.php">Socios Inactivos</a></li>
            </ul>
          </li>
         
          <li>
            <a class="" id="reportes" href="reportes.php">
                          <i class="icon_piechart"></i>
                          <span>Reportes</span>

             </a>
             


          </li>

  
        <!-- sidebar menu end-->
     
              <?php
                  }
                   else {
              ?>
   
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="dash.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="#" class="" id="ingresar">
                          <i class="icon_document_alt"></i>
                          <span>Ingresar </span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub" id="subIngresar">
              <li><a class="" href="pago_agua.php">Ingresar Pago del Agua</a></li>
               
            </ul>
          </li>
          <li class="sub-menu">
            <a href="# "  id="vistas">
                          <i class="icon_desktop"></i>
                          <span>Socios</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub" id="subvistas">  
              <li><a class="" href="verSocio.php">Socios Activos</a></li>
      
            </ul>
          </li>
         
        
  
        <!-- sidebar menu end-->
      
    <?php
                  }
              ?>
              </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
           
              <div id="mensaje">
                <?php
                  if($_SESSION["usuario"]["id"]==$_SESSION["usuario"]["contra"]){
                    echo '
                    <center>
                    <div class="alert alert-danger alert-dismissible" id="quitar" style="width:44%;">
                        <strong>Aviso!</strong> Verifica y corrige tus datos <a href="ajustes.php">Aquí</a>
                    </div></center>
                    ';
                  }
                ?>
              </div>
            
          </div>
        </div>
        <?php 
          
          $sqlCasas = "SELECT COUNT(*) AS 'Total' FROM casa";
          $casas = $graficar->mostrar($sqlCasas);
          $dataCasa = mysqli_fetch_array($casas);
        ?>
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg ">
              <i class="icon">&#xe021;</i>
              <div class="count"><?php echo $dataCasa["Total"]; ?></div>
              <div class="title">Casas registradas</div>
            </div>
            <!--/.info-box-->
          </div>
          <?php
              $sqlSocios = "SELECT COUNT(*) AS 'Total' FROM socio ";
              $socios = $graficar->mostrar($sqlSocios);
              $dataSocios = mysqli_fetch_array($socios);
          ?>
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa fa-shopping-cart icon">&#xe008;</i>
              <div class="count"><?php echo $dataSocios["Total"]; ?></div>
              <div class="title">Socios agregados</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->
          <?php
               $fechaPrincipio = date("Y")."-".date("m")."-01";
               $fechaFin = date("Y")."-".date("m")."-30";
              $sqlTrans = "SELECT COUNT(*) AS 'Total' FROM transaccion WHERE fecha BETWEEN '$fechaPrincipio' AND '$fechaFin' ";
              $trans = $graficar->mostrar($sqlTrans);
              $dataTrans = mysqli_fetch_array($trans);
          ?>
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-thumbs-o-up icon">&#x20ac;</i>
              <div class="count"> <?php echo $dataTrans["Total"];?> </div>
              <div class="title">tansacciones en el mes</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <?php
            $sqlDebe = "SELECT COUNT(*) AS 'Total' FROM deuda";
            $muestroDebe = $graficar->mostrar($sqlDebe);
            $dataDebe = mysqli_fetch_array($muestroDebe);
          ?>
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-cubes icon">&#xe028;</i>
              <div class="count"><?php echo $dataDebe["Total"]; ?></div>
              <div class="title"># Socios con deuda</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>
        <!--/.row-->


        <div class="row">
          <div class="col-lg-9 col-md-12">

            <div class="panel panel-default">
              <?php 
                  if($_SESSION["usuario"]["tipo"] == "1"){
              ?>
              <div class="panel-heading">
                <h2><i class="fa fa-map-marker red"></i><strong>Transacciones realizadas en <?php echo date("M")?></strong></h2>
                <div class="panel-actions">
                  
                </div>
              </div>
              <?php
                  }
              ?>
              
              <?php
              
               $fechaPrincipio = date("Y")."-".date("m")."-01";
               $fechaFin = date("Y")."-".date("m")."-30";
               $sqlTransaccion = "SELECT fecha,SUM(pago) AS Total FROM transaccion WHERE fecha BETWEEN '$fechaPrincipio' and '$fechaFin' GROUP BY fecha";
               $graficando = $graficar->mostrar($sqlTransaccion);
               $valoresX = array();
               $valoresY = array();

               while($corriendo = mysqli_fetch_row($graficando)){
                  $valoresX[] = $corriendo[0];
                  $valoresY[] = $corriendo[1];
               }
               $datosX = json_encode($valoresX);
               $datosY = json_encode($valoresY);
               if($_SESSION["usuario"]["tipo"] == "1"){
              ?>
                <div id="grafica" style="height:380px;"></div>
                <script>

                  var datosX = CrearCadenaLineal('<?php echo $datosX; ?>');
                  var datosY = CrearCadenaLineal('<?php echo $datosY; ?>');


                  var trace ={
                    x : datosX,
                    y : datosY,
                    type : 'lines+markers'
                  }

                  var data = [trace];

                  var layout = {
                      title:'Transacciones Mensuales'
                  };

                  Plotly.newPlot('grafica', data, layout);
                </script>
              

            </div>
          </div>
          <div class="col-md-3">
            <!-- List starts -->
            <ul class="today-datas">
              <!-- List #1 -->
              <li>
                <!-- Graph -->
                <div><span id="todayspark1" class="spark"></span></div>
                <!-- Text -->
                <div class="datas-text" style="color:black;  font-weight: bold;">Accesos rapidos de interes </div>
              </li><br>
              <li>
                <div><span id="todayspark2" class="spark"></span></div>
                <div class="datas-text">Ver Socios <a href="verSocio.php">Activos </a></div>
              </li>
              <li>
                <div><span id="todayspark3" class="spark"></span></div>
                <div class="datas-text">Ver Socios <a href="verNoAct.php">Inactivos</a></div>
              </li><br>
              <li>
                <div><span id="todayspark4" class="spark"></span></div>
                <div class="datas-text">Pago de <a href="pago_agua.php">Agua</a></div>
              </li>
              <li>
                <div><span id="todayspark5" class="spark"></span></div>
                <div class="datas-text">Visualizar Reportes <a href="reportes.php">Disponibles</a></div>
              </li>
            </ul>
          </div>


        </div>
        <?php
          }
        ?>

        <!-- Today status end -->



        <div class="row">

          <div class="col-lg-9 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>Información de usuarios y casas</strong></h2>
                <div class="panel-actions">
                  
                </div>
              </div>
              <?php
                $sqlCuentoAct = "SELECT COUNT(*) AS 'Total' FROM socio where activo='1'";
                $sqlCuentoNoAct = "SELECT COUNT(*) AS 'Total' FROM socio WHERE activo='0'";
                $noRegistrados = 800 - $dataSocios["Total"];
                
                $actSocio = $graficar->mostrar($sqlCuentoAct);
                $dataAct = mysqli_fetch_array($actSocio);
              

                $noactSocio = $graficar->mostrar($sqlCuentoNoAct);
                $datanoAct = mysqli_fetch_array($noactSocio);
                $ValoresDonut1 = array();
                $ValoresDonut2 = array();  

                $ValoresDonut1 = [$dataAct["Total"], $datanoAct["Total"], strval($noRegistrados)];
                
                $casaFaltantes = 800-$dataCasa["Total"] ;

                $valoresDonut2 = [$dataCasa["Total"], strval($casaFaltantes)];

                $datosD1 = json_encode($ValoresDonut1);
                $datosD2 = json_encode($valoresDonut2);
              ?>
              <div id="donuts" style="width:100%; background-color:white;"></div>
              <script>
                var datosD1 = CrearCadenaLineal('<?php echo $datosD1; ?>');
                var datosD2 = CrearCadenaLineal('<?php echo $datosD2; ?>');

                var data = [{
                  values: datosD1,
                  labels: ['Activos', 'No activos', 'Aprox Faltantes'],
                  textposition: 'inside',
                  domain: {column: 0},
                  name: 'Socios ',
                  hoverinfo: 'label+percent+name',
                  hole: .4,
                  type: 'pie'
                  },{
                    values : datosD2,
                    labels : ['Registradas','No resgistradas'],
                    text : 'Casas',
                    textposition: 'inside',
                    domain: {column: 1},
                    name: 'casas',
                    hoverinfo: 'label+percent+name',
                    hole: .4,
                    type: 'pie'
                 }];

                 var layout = {
                    title: 'Información Socios y casas en el sistema',
                    annotations: [
                      {
                        font: {
                          size: 20
                        },
                        showarrow: false,
                        text: 'Socios',
                        x: 0.17,
                        y: 0.5
                      },
                      {
                        font: {
                        size: 20
                        },
                        showarrow: false,
                        text: 'Casas',
                        x: 0.82,
                        y: 0.5
                      }
                    ],
                    height: 500,
                    width: 750,
                    showlegend: false,
                    grid: {rows: 1, columns: 2}
                  };

                  Plotly.newPlot('donuts', data, layout);

              </script>
              

            </div>

          </div>
          <!--/col-->
          <!--/col-->

        </div>
        </div><br><br>
        <!-- project team & activity end -->

      </section>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
  
    <script>
      //knob
     
      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });
    </script>

</body>

</html>
