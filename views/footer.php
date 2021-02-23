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
              <li><a href="https://www.facebook.com/AnimeClub-101357742004950" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
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
        <p class="crp">© Copyrights 2020 diseño de <a href="https://github.com/Moisz22" target="_blank">Moisz22</a></p>
      </div>
    </div>
  </div>
</div>
</div>
<a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>
<!-- ALL PLUGINS -->
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.pogo-slider.min.js"></script>
<script src="js/slider-index.js"></script>
<script src="js/isotope.min.js"></script>
<script src="js/images-loded.min.js"></script>
<script src="js/custom.js"></script>
<script>

if(screen.width > 992){
  var card_presentar = 4
}
if(screen.width > 768 && screen.width < 992){
  var card_presentar = 3
}
if(screen.width < 768){
  var card_presentar = 1
}

  $(document).ready(function() {
    $('#sidebarCollapse').on('click', function() {
      $('#sidebar, #content').toggleClass('active');
      $('.collapse.in').toggleClass('in');
      $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
  });

  $('.js-example-basic-multiple').select2({
    width: '100%',
    theme: 'classic'
  });

 //mostrar imagen al subirla

$('.custom-file-input').change(function(){

  let imagen = this.files[0];
  if(imagen['type'] == 'image/jpg' || imagen['type'] == 'image/jpeg' || imagen['type'] == 'image/png'){

    let leerImagen = new FileReader;
    leerImagen.readAsDataURL(imagen)

    console.log(imagen)

    $(leerImagen).on("load", function(event){

      let rutaImagen = event.target.result

      Swal.fire({
      title: 'Previsualizacion',
      imageUrl: rutaImagen,
      imageAlt: imagen['name'],
    })

    })
  }

})


</script>
  <script src="js/funciones_glide.js"></script>
  <script src="js/funciones_anime.js"></script>
  <script src="js/funciones_reseña.js"></script>
  <script src="js/funciones_tablas.js"></script>
  <script src="js/autocompletado.js"></script>
  <script src="js/validar_login.js"></script>
  <script src="js/validar_registro.js"></script>
  </body>
</html>
