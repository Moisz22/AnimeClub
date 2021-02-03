<?php 
   //comprueba si no se ha iniciado una sesión, la inicia
   if (!isset($_SESSION)) {   
      session_start();
  }
?>
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

      <!-- limpiar caché cada que se recargue la página -->
      <meta http-equiv='cache-control' content='no-cache'>
      <meta http-equiv='expires' content='0'>
      <meta http-equiv='pragma' content='no-cache'>

      <!-- Site Metas -->
      <title>Anime Club</title>
      <!-- Site Icons -->
      <link rel="shortcut icon" href="images/icono.png" type="image/x-icon" />
      <link rel="apple-touch-icon" href="#" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css" />
      <!-- Pogo Slider CSS -->
      <link rel="stylesheet" href="css/pogo-slider.min.css" />
      <!-- Site CSS -->
      <link rel="stylesheet" href="css/style.css" />
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- Librerias alertify -->
      <link rel="stylesheet" type="text/css" href="node_modules/alertifyjs/build/css/alertify.css">
      <link rel="stylesheet" type="text/css" href="node_modules/alertifyjs/build/css/themes/bootstrap.css">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!--librerias necesarias para usar el Modal -->
      <script src="node_modules/jquery/dist/jquery.min.js"></script>
      <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- script para alertify -->
      <script src="node_modules/alertifyjs/build/alertify.js"></script>
      <!-- libreria para sweet alert2 -->
      <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
      <script src="node_modules/sweetalert2/dist/sweetalert2.min.css"></script>
   </head>
   <body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">
      <!-- LOADER -->
      <?php if(!isset($_SESSION['estado'])):?>
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
                  <li><a href="lista_animes">Animes <i class="fa fa-hand-peace-o"></i></a></li>
                  <li><a href="tablas">Tablas <i class="fa fa-table"></i></a></li>
                  <li><a href="borrados">Borrados <i class="fa fa-trash"></i></a></li>
                  <li><a href="#">Configuraciones <i class="fa fa-cog"></i></a></li>
               <?php else: ?>
                  <li><a href="login">Login <i class="fa fa-sign-in"></i></a></li>
                  <li><a href="lista_animes">Animes <i class="fa fa-hand-peace-o"></i></a></li>
               <?php endif; ?>
            </ul>
         </div>
      </nav>

      
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
         <div id="content">
         <!-- End header -->
