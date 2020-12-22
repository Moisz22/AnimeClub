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
      <!-- Librerias alertify -->
      <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
      <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
       <!--librerias necesarias para usar el Modal -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <!-- script para alertify -->
      <script src="librerias/alertifyjs/alertify.js"></script>
      <!-- datatables 
      <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css"> -->
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
                  <li><a href="cerrar">Salir <i class="fa fa-sign-out"></i></a></li>
                  <li><a href="lista_animes">Animes</a></li>
                  <li><a href="registrar_anime">Ingresar Anime</a></li>
                  <li><a href="about">Generos</a></li>
                  <li><a href="reseña">Reseñas</a></li>
                  <li><a href="animes_eliminados">Borrados</a></li>
               <?php else: ?>
                  <li><a href="login">Login <i class="fa fa-sign-in"></i></a></li>
                  <li><a href="lista_animes">Animes</a></li>
                  <li><a href="about">Generos</a></li>
                  <li><a href="services">Services</a></li>
                  <li><a href="contact">Contact us</a></li>
               <?php endif; ?>
            </ul>
         </div>
      </nav>

      <div id="content">
         <!-- Start header -->
         <header class="top-header">
            <div class="container">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="logo_main">
                        <a href="index"><img style="height: 70px;" src="images/logo.P86"/></a>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn"><img src="images/menu_icon.png"></button>
                  </div>
               </div>
            </div>
         </header>

         <br/>
         <!-- End header -->