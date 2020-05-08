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

  $reportes = new metodos();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../css/icons.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="../libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="../libs/bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="../css/elegant-icons-style.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/fullcalendar.css">
    <link href="../css/widgets.css" rel="stylesheet">
    <link href="../css/style_login.css" rel="stylesheet">
       <link href="../css/estilo2.css" rel="stylesheet">
    <link href="../css/style-responsive.css" rel="stylesheet" />
    <link href="../css/popup.css" rel="stylesheet" />
    <link href="../css/xcharts.min.css" rel=" stylesheet">
    <link href="../css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <script src="../js/jquery.js"></script> 
    <script src="../libs/jquery/jspdf.min.js"></script>
    <script src="../libs/jquery/jspdf.plugin.autotable.js"></script>
   
    <style>
    span.icon {
    font-family: 'Glyphicons Halflings';
    color:black;
    }
    </style>
    <script>  

        $(document).ready(function(){  
            var pdf = new jsPDF();
             $("#empleados").click(function(){
                 
                 <?php
                    $sql = "SELECT * FROM usuarios";
                    $muestroEmp = $reportes->mostrar($sql);
                    $emp = array();
                     
                    $n = 0;
                    while($r = mysqli_fetch_array($muestroEmp)){
                        $emp [] = $r; 
                        $n++;
                    }
                    
                 ?>
                 pdf.text(50,20,"Reporte empleados de Asosciasion Santa Eduviges");
                 var columnas = ["ID", "Nombre", "Apellido","Tipo" ];
                 var data = [
                    <?php foreach($emp as $c):?>
                        [ '<?php echo $c["id_usuario"]; ?>','<?php echo $c["nombre"]; ?>', '<?php echo $c["apellido"]; ?>', '<?php echo $c["tipo"];?>'],
                    <?php endforeach; ?>  
                    ];

                 pdf.autoTable(columnas,data,
                    { margin:{ top: 25  }}
                );

                 pdf.save('ReporteEmpleados.pdf');


             });

             $("#deudas").click(function(){
                 <?php
                 $sql = "SELECT s.num_tarjeta, s.nombre, s.apellido,  d.monto, c.pasaje, c.poligono, c.num_casa FROM deuda AS d INNER JOIN socio AS s ON s.id = d.id_socio INNER JOIN casa As c ON s.id_casa = c.id_casa";
                 $muestro = $reportes->mostrar($sql);
                 $datos = array();

                 while($r = mysqli_fetch_array($muestro)){
                        $datos [] = $r; 
                    }
                ?>
                 pdf.text(50,20,"Reporte de Socios con Deudas");
                 var columnas = ["# tarjeta", "Nombre", "Apellido","monto","direccion" ];
                 var data = [
                    <?php foreach($datos as $c):?>
                        [ '<?php echo $c["num_tarjeta"]; ?>','<?php echo $c["nombre"]; ?>', '<?php echo $c["apellido"]; ?>', '<?php echo "$ ".$c["monto"];?>', '<?php echo "Pasaje: ".$c["pasaje"]." Poligono: ".$c["poligono"]." # Casa: ".$c["num_casa"] ;?>'],
                    <?php endforeach; ?>  
                    ];

                 pdf.autoTable(columnas,data,
                    { margin:{ top: 25  }}
                );

                 pdf.save('Deudas.pdf');

             });

             $("#trans").click(function(){
                 <?php
                 $fi = "2020-".date("m")."-01";
                 $ff = "2020-".date("m")."-31";

                 $sql = "SELECT transaccion.pago, socio.nombre, socio.apellido, transaccion.fecha FROM transaccion INNER JOIN socio ON socio.id = transaccion.id_socio where fecha BETWEEN '$fi' AND '$ff'";
                 $muestro = $reportes->mostrar($sql);
                 $datos = array();

                 while($r = mysqli_fetch_array($muestro)){
                        $datos [] = $r; 
                    }
                ?>
                 pdf.text(50,20,"Reporte de transacciones del mes de <?php echo date('M'); ?>");
                 var columnas = ["Monto de pago", "Nombre", "Apellido","Fecha" ];
                 var data = [
                    <?php foreach($datos as $c):?>
                        [ '<?php echo "$ ".$c["pago"]; ?>','<?php echo $c["nombre"]; ?>', '<?php echo $c["apellido"]; ?>', '<?php echo $c["fecha"];?>'],
                    <?php endforeach; ?>  
                    ];

                 pdf.autoTable(columnas,data,
                    { margin:{ top: 25  }}
                );

                 pdf.save('Transacciones.pdf');

             });

             $("#socios").click(function(){
                 <?php

                 $sql = "SELECT * FROM socio";
                 $muestro = $reportes->mostrar($sql);
                 $datos = array();

                 while($r = mysqli_fetch_array($muestro)){
                        $datos [] = $r; 
                    }
                ?>
                 pdf.text(50,20,"Reporte de Socios");
                 var columnas = ["# Tarjeta", "Nombre", "Apellido","Telefono" , "Estado"];
                 var data = [
                    <?php foreach($datos as $c):?>
                        [ '<?php echo $c["num_tarjeta"]; ?>','<?php echo $c["nombre"]; ?>', '<?php echo $c["apellido"]; ?>', '<?php echo $c["telefono"]; ?>','<?php  if($c["activo"]== "1"){echo "Activo"; }else{ echo "Inactivo";}?>'],
                    <?php endforeach; ?>  
                    ];

                 pdf.autoTable(columnas,data,
                    { margin:{ top: 25  }}
                );

                 pdf.save('Socios.pdf');

             });
        });  
 </script>  
    <title>Santa Eduviges</title>
    
</head>
<body>
<section id="container" class="">


<header class="header dark-bg">
  <div class="toggle-nav">
    <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
  </div>

  <!--logo start-->
  <a href="index.html" class="logo">Nice <span class="lite">Admin</span></a>
  <!--logo end-->

  <div class="nav search-row" id="top_menu">
    <!--  search form start -->
    <ul class="nav top-menu">
      <li>
        <form class="navbar-form">
          <input class="form-control" placeholder="Search" type="text">
        </form>
      </li>
    </ul>
    <!--  search form end -->
  </div>

  <div class="top-nav notification-row">
    <!-- notificatoin dropdown start-->
   <!-- <ul class="nav pull-right top-menu">-->

      <!-- task notificatoin start-->
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
     <!-- <li id="alert_notificatoin_bar" class="dropdown">
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
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="profile-ava">
                            <img alt="" src="../img/avatar1_small.jpg">
                        </span>
                        <!-- Aqui se pondra el nombre de quien inicio la sesion -->
                        <span class="username"><?php echo $_SESSION['usuario']['nombre'];?></span>
                        <b class="caret"></b>
                    </a>
        <ul class="dropdown-menu extended logout">
          <div class="log-arrow-up"></div>
          <li class="eborder-top">
            <a href="#"><i class="icon_profile"></i> My Profile</a>
          </li>
          <li>
            <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
          </li>
          <li>
            <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
          </li>
          <li>
            <a href="#"><i class="icon_chat_alt"></i> Chats</a>
          </li>
          <li>
            <a href="login.html"><i class="icon_key_alt"></i> Log Out</a>
          </li>
          <li>
            <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
          </li>
          <li>
            <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
          </li>
        </ul>
      </li>
      <!-- user login dropdown end -->
    </ul>
    <!-- notificatoin dropdown end-->
  </div>
</header>
<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="dash.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="agregar_empleado.php" class="">
                          <i class="icon_document_alt"></i>
                          <span>Insertar</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="ingresar_casa_socio.php">Insertar Socio</a></li>
              <li><a class="" href="agregar_empleado.php">Insertar Empleado</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="ingresar_casa_socio.php" class="">
                          <i class="icon_document_alt"></i>
                          <span>Modificar</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
          <ul class="sub">
              <li><a class="" href="general.html">Modificar Empleado</a></li>
              <li><a class="" href="buttons.html">Modificar Socio</a></li>
             
            </ul>
          </li>
          <li>
            <a class="" href="chart-chartjs.html">
                          <i class="icon_piechart"></i>
                          <span>Graficos</span>

                      </a>

          </li>

         
         <!-- <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Pages</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="profile.html">Profile</a></li>
              <li><a class="" href="login.html"><span>Login Page</span></a></li>
              <li><a class="" href="contact.html"><span>Contact Page</span></a></li>
              <li><a class="" href="blank.html">Blank Page</a></li>
              <li><a class="" href="404.html">404 Error</a></li>
            </ul>
          </li>

        </ul>-->
        <!-- sidebar menu end-->
      </div>
    </aside>
    <section id="main-content" class="main">
        <section class="wrapper" style="width:80%;">
            
            <form class="register" style="width:48%;margin-left:38%;" >
              <div><center><h2 style="color:white;">Seleccione el reportes Deseado</h2></center></div><br>
              <div >
              <button type="button" class="btn btn-dark btn-lg btn-block" id="empleados">Empleados</button><br>
              <button type="button" class="btn btn-dark btn-lg btn-block" id="deudas">Deudas</button><br>
              <button type="button" class="btn btn-dark btn-lg btn-block" id="trans">Transacciones(Mensuales)</button><br>
              <button type="button" class="btn btn-dark btn-lg btn-block" id="socios">Socios</button><br>
              </div>
             
            </form>                            
        </section>
    </section>
</body>


</html>
