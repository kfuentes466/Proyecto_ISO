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
    <link href="../css/style-responsive.css" rel="stylesheet" />
    <link href="../css/xcharts.min.css" rel=" stylesheet">
    <link href="../css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <script src="../js/jquery.js"></script>
    <title>Document</title>
    <script>
      $(document).ready(function(){
      $('#boton').click(function(){

        var numt = $('#numt').val();
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var telefono = $('#telefono').val();
        var numc = $('#numc').val();
        var pasaje = $('#pasaje').val();
        var poligono = $('#poligono').val();

        if($.trim(numt).length == 0){
          $('#usuario').focus();
          $('#resp').html('<p style="color : red;"> Numero de tarjeta vacio!</p>')
        }
        
        if($.trim(nombre).length == 0){
          $('#contra').focus();
          $('#resp').html('<p style="color : red;"> Nombre vacio!</p>')
        }
        if($.trim(numt).length > 0 && $.trim(nombre).length > 0){
        $.ajax({
          url:"../php/ingresoSocio.php",
          method:"POST",
          data: {numt:numt, nombre:nombre , apellido:apellido, telefono:telefono, numc:numc, pasaje:pasaje, poligono:poligono},
          cache:"false",
          beforeSend: function(){
            $('#boton').val("Conectanto...");
          },
          success: function(data){
            if(data == 1){
              $("#resp").html("<p style=' color: green;'> Ingresado correctamente !</p>");
            }else{
              $('#resp').html(data);
              //$("#resp").html("<p style=' color: red;'> Credenciales incorrectas!</p>");
              $('#boton').val("Prueba otra vez!");
            }
          }
        })
      }
      })
    })
    </script>
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
    <ul class="nav pull-right top-menu">

      <!-- task notificatoin start -->
      <li id="task_notificatoin_bar" class="dropdown">
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
      </li>
      <!-- task notificatoin end -->
      <!-- inbox notificatoin start-->
      <li id="mail_notificatoin_bar" class="dropdown">
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
      </li>
      <!-- inbox notificatoin end -->
      <!-- alert notification start-->
      <li id="alert_notificatoin_bar" class="dropdown">
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
      </li>
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
            <a class="" href="index.html">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Forms</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="form_component.html">Form Elements</a></li>
              <li><a class="" href="form_validation.html">Form Validation</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>UI Fitures</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="general.html">Elements</a></li>
              <li><a class="" href="buttons.html">Buttons</a></li>
              <li><a class="" href="grids.html">Grids</a></li>
            </ul>
          </li>
          <li>
            <a class="" href="widgets.html">
                          <i class="icon_genius"></i>
                          <span>Widgets</span>
                      </a>
          </li>
          <li>
            <a class="" href="chart-chartjs.html">
                          <i class="icon_piechart"></i>
                          <span>Charts</span>

                      </a>

          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Tables</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="basic_table.html">Basic Table</a></li>
            </ul>
          </li>

          <li class="sub-menu">
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

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <section id="main-content">
        <section class="wrapper">
            <div><center><h2 style="color:red;">Ingresar Socio</h2></center></div>
            <form>
            <div class="form-group"> <!-- Full Name -->
                <label for="full_name_id" class="control-label">Numero de tarjeta</label>
                <input type="num" class="form-control" id="numt" name="numt" placeholder="####" maxlengt="4" require>
            </div>    

            <div class="form-group"> <!-- Street 1 -->
                <label for="street1_id" class="control-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="ej. Victor" require>
            </div>                    
                            
            <div class="form-group"> <!-- Street 2 -->
                <label for="street2_id" class="control-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="ej. Flores " require>
            </div>    

            <div class="form-group"> <!-- City-->
                <label for="city_id" class="control-label">Telefono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="ej 2244-7786" require>
            </div> 
            <hr style="border: 0; border-top: 2px solid #999;  border-bottom: 2px solid #333; height:0;" href="#"><center>Direccion de vivienda</center></hr>
            <div class="form-group"> <!-- City-->
                <label for="city_id" class="control-label">Numero de casa</label>
                <input type="text" class="form-control" id="numc" name="numc" placeholder="ej. 15" require>
            </div> 

            <div class="form-group"> <!-- City-->
                <label for="city_id" class="control-label">Pasaje</label>
                <input type="text" class="form-control" id="pasaje" name="pasaje" placeholder="ej 10" require>
            </div> 

            <div class="form-group"> <!-- Zip Code-->
                <label for="zip_id" class="control-label">Poligono</label>
                <input type="text" class="form-control" id="poligono" name="poligono" placeholder="ej. 3" require>
            </div>        
            <div id="resp"></div>
            <div class="form-group"> <!-- Submit Button -->
                <input type="button" value="Ingresar" class="btn btn-primary" id="boton"/>
            </div>
            </form>                            
        </section>
    </section>
</body>
</html>