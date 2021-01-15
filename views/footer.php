<!-- Start Footer -->
<footer class="footer-box">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="heading_main text_align_center white_fonts margin-bottom_30">
            <h2>Contáctenos</h2>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
                  
      <div class="col-lg-3 col-md-6 col-sm-6 white_fonts">
        <div class="full footer_blog f_icon_1">
          <p>Dirección<br><small>Ecuador</small></p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 white_fonts">
        <div class="full footer_blog f_icon_2">
          <p>Teléfono<br><small><br><br><br></small></p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 white_fonts">
        <div class="full footer_blog f_icon_3">
          <p>Correo<br><small>support@sofbox.com<br>24 X 7 online support</small></p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 white_fonts">
        <div class="full footer_blog_last">
          <p>Redes Sociales</p>
          <p>
            <ul>
              <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://github.com/Moisz22"><i class="fa fa-github"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </p>
        </div>
      </div>
              
    </div>
  </div>
</footer>
<!-- End Footer -->
         
<div class="footer_bottom">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <p class="crp">© Copyrights 2020 diseño de <a href="https://github.com/Moisz22" title="Free Website Templates">Moisz22</a></p>
      </div>
    </div>
  </div>
</div>
</div>
<a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>
<!-- ALL JS FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- ALL PLUGINS -->
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.pogo-slider.min.js"></script>
<script src="js/slider-index.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/form-validator.min.js"></script>
<script src="js/contact-form-script.js"></script>
<script src="js/isotope.min.js"></script>
<script src="js/images-loded.min.js"></script>
<script src="js/custom.js"></script>
<script>
  $(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
      $('#sidebar, #content').toggleClass('active');
      $('.collapse.in').toggleClass('in');
      $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
  });

  //script para las tablas borradas
  $(document).ready(function(){
    //si el select cambia de estado se activa la función
     $('#tablas_traer').on('change', function (){
      if($('#tablas_traer').val() == 1){
         $('#tabla_dibujar').load('views/tablas/tabla_animes_eliminados.php');
      }else if($('#tablas_traer').val() == 2){
        $('#tabla_dibujar').load('views/tablas/tabla_reseñas_eliminadas.php');
      }else{
        //limpiar comtemodp del html con ese id
        document.getElementById("tabla_dibujar").innerHTML="";
      }
  });
});

  //script para todas las tablas
  $(document).ready(function(){
    //si el select cambia de estado se activa la función
     $('#tablas_bd').on('change', function (){
      if($('#tablas_bd').val() == 1){
        $('#tablas_traer_todas').load('views/tablas/tabla_todos_los_animes.php');
      }else if($('#tablas_bd').val() == 2){
        $('#tablas_traer_todas').load('views/tablas/tabla_todas_las_reseñas.php');
      }else if($('#tablas_bd').val() == 3){
        $('#tablas_traer_todas').load('views/tablas/tabla_todos_los_generos.php');
      }else {
        //limpiar comtemodp del html con ese id
        document.getElementById("tablas_traer_todas").innerHTML="";
      }
    });
  });


  

</script>
  <script src="sweetalert2.all.min.js"></script>
  <script src="js/autocompletado.js"></script>
  <script src="js/funciones.js"></script>
  <script src="js/validar_login.js"></script>
  <script src="js/validar_registro.js"></script>
  </body>
</html>
