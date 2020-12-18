<?php 
   //comprueba si no se ha iniciado una sesión, la inicia
   if (!isset($_SESSION)) {   
      session_start();
  }
?>
<!DOCTYPE html>
<html lang="es">
   <!-- Basic -->
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <!-- Site Metas -->
      <title>Anime Club</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- Site Icons -->
      <link rel="shortcut icon" href="#" type="image/x-icon" />
      <link rel="apple-touch-icon" href="#" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- Pogo Slider CSS -->
      <link rel="stylesheet" href="css/pogo-slider.min.css" />
      <!-- Site CSS -->
      <link rel="stylesheet" href="css/style.css" />
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- Custom CSS -->
      <link rel="stylesheet" href="css/custom.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- librerias necesarias para usar el Modal -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <!-- Login desplegable-->
      <script src="js/login.js"></script>

      <!-- Usando Modal con id=mostrarmodal como POP UP-->
      <script>
         $(document).ready(function()
         {
            $("#mostrarmodal").modal("show");
         });
      </script>

      
   </head>
   <body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">
      <!-- LOADER -->
      <?php if(!isset($_GET['estado'])):?>
         <div id="preloader">
            <div class="loader">
               <img src="images/loader.gif" alt="#" />
            </div>
         </div>
      <?php endif;?>
      <!-- END LOADER -->
      <div class="wrapper">
      <nav id="sidebar">
         <div class="menu_section">
            <ul>
               <?php if(isset($_SESSION['usuario'])): ?>
                  <li><a href="cerrar.php">Salir <i class="fa fa-sign-out"></i></a></li>
                  <li><a href="lista_animes.php">Animes</a></li>
                  <li><a href="registrar_anime.php">Ingresar Anime</a></li>
                  <li><a href="about.php">Generos</a></li>
                  <li><a href="reseña.php">Reseñas</a></li>
                  <li><a href="contact.php">Contact us</a></li>
               <?php else: ?>
                  <li><a href="login.php">Login <i class="fa fa-sign-in"></i></a></li>
                  <li><a href="lista_animes.php">Animes</a></li>
                  <li><a href="about.php">Generos</a></li>
                  <li><a href="services.php">Services</a></li>
                  <li><a href="contact.php">Contact us</a></li>
               <?php endif; ?>
            </ul>
         </div>
      </nav>

      <div id="content">
         <!-- Start header -->
         <header class="top-header">
            <div class="container">
               <div class="row">
                  <div class="col-sm-2">
                     <div class="logo_main">
                        <a href="index.php"><img style="height: 70px;" src="images/logo.P86"/></a>
                     </div>
                  </div>

                  <div class="col-sm-6">
                     <div id="loginContainer">
                        <a href="#" id="loginButton"><span><i class="fa fa-user"></i></span><em></em></a>
                        <div style="clear:both"></div>
                           <div id="loginBox">
                              <form id="loginForm" method="POST">
                                 <fieldset id="body">
                                    <fieldset>
                                       <label for="email">Email</label>
                                       <input type="text" name="email" id="email" />
                                    </fieldset>
                                    <fieldset>
                                       <label for="password">Contrase&ntilde;a</label>
                                       <input type="password" name="password" id="password" />
                                    </fieldset>
                                    <input type="submit" id="login" value="Entrar" />
                                    <label for="checkbox"><input type="checkbox" id="checkbox" />Recu&eacute;rdame</label>
                                 </fieldset>
                                 <span><a href="#">Perdiste tu contrase&ntilde;a?</a></span>
                              </form>
                           </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn"><img src="images/menu_icon.png"></button>
                  </div>
               </div>
            </div>
         </header>

         <br/>
         <!-- End header -->