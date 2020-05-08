<!DOCTYPE html>
<?php 
 session_start();
  if(!isset($_SESSION['usuario'])){
    header("location:login.html");
  }
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
    <style>
    span.icon {
    font-family: 'Glyphicons Halflings';
    color:black;
    }
    </style>
    <script>  
        $(document).ready(function(){  
             load_data();  
             function load_data(page)  
             {  
                  $.ajax({  
                       url:"../php/listadoSocio.php",  
                       method:"POST",  
                       data:{page:page},  
                       success:function(data){  
                            $('#pagination_data').html(data);  
                       }  
                  })  
             }  
             $(document).on('click', '.pagination_link', function(){  
                  var page = $(this).attr("id");  
                  load_data(page);  
             }); 
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
   <a href="index.html" class="logo">Asociación<span class="lite">Santa Eduviges</span></a>

 

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
    <section id="main-content" class="main">
        <section class="wrapper" style="width:80%;">
            
            <form class="register" style="width:88%;margin-left:18%;" >
              <div><center><h2 style="color:white;">Socios activos</h2></center></div>
              
              <div id="pagination_data">
              
              </div>
             
            </form>                            
        </section>
    </section>

    <div id="popup" style="display: none;">
    <div class="content-popup">
        <div class="close"><a href="#" id="close"><img src="../img/close.png"/></a></div>
        <div>
        	<center><h2 style="color:red;font-weight: bold;">Alerta!!</h2></center>
            <center><h3 style="color:black;font-weight: bold;">¿Seguro que desea eleminar al socio ?</h3></center>
            <center><h4 style="color:black;">Recuerda este cambio sera irreversible !</h4></center>
            <div style="float:left; width:100%;">
            <button id="borrar" type="button" class="btn btn-secondary btn-lg" style="margin-left:38%;margin-top:8%;">Aceptar</button>
    	</div>
        </div>
    </div>
</div>
<div class="popup-overlay"></div>
</body>


</html>
