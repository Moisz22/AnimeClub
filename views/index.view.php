
<!-- Start Banner -->
<div class="ulockd-home-slider">
  <div class="container-fluid">
    <div class="row">
      <div class="pogoSlider" id="js-main-slider">
        <div class="pogoSlider-slide" style="background-image:url(images/slider_1.jpg);">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="slide_text">
                  <!--<h6>Grow your business</h6>
                  <h3>Digital</h3>
                  <h4>Marketing</h4>
                  <br>
                  <br /><br /><br /><br /><br /><br /><br /><br /><br />
                  <a class="readmore_bt" href="about.html">Read More</a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      
        <div class="pogoSlider-slide" style="background-image:url(images/slider_2.jpg);">
                        
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="slide_text">
                  <!--<h6>Grow your business</h6>
                  <h3>Digital</h3>
                  <h4>Marketing</h4>
                  <br>
                  <br /><br /><br /><br /><br /><br /><br /><br /><br />
                  <a class="readmore_bt" href="about.html">Read More</a>-->
                </div>
              </div>
            </div>
          </div>
        </div>
                     
        <div class="pogoSlider-slide" style="background-image:url(images/slider_3.jpg);">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="slide_text">
                  <!--<h6>Grow your business</h6>
                  <h3>Digital</h3>
                  <h4>Marketing</h4>
                  <br>
                  <br /><br /><br /><br /><br /><br /><br /><br /><br />
                  <a class="readmore_bt" href="about.html">Read More</a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- .pogoSlider -->
    </div>
  </div>
</div>
         <!-- End Banner -->
         <!-- section -->
<div class="section about_section layout_padding dash_bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="heading_main text_align_center">
            <h2>Funciones de la página</h2>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
        <div class="full feature_box">
          <div class="full icon">
            <img class="default-block imagen_icono" src="images/icon_1.png" alt="#" />
            <img class="default-none imagen_icono" src="images/icon_1.png" alt="#" />
          </div>
        
          <div class="full">
            <h4>Guarde sus animes</h4>
          </div>
          <div class="full">
            <p>Guarde información importante del anime que ya terminó de ver o el cual está empezandolo</p>
          </div>
        </div>
      </div>
    
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
        <div class="full feature_box">
          <div class="full icon">
            <img class="default-block imagen_icono" src="images/icon_2.png" alt="#" />
            <img class="default-none imagen_icono" src="images/icon_2.png" alt="#" />
          </div>
          
          <div class="full">
            <h4>Edite el anime</h4>
          </div>
          <div class="full">
            <p>Si cometió un error en el guardado del anime puede corregirlo en cualquier momento.</p>
          </div>
        </div>
      </div>
    
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
        <div class="full feature_box">
          <div class="full icon">
            <img class="default-block imagen_icono" src="images/icon_3.png" alt="#" />
            <img class="default-none imagen_icono" src="images/icon_3.png" alt="#" />
          </div>
          
          <div class="full">
            <h4>Elimine sus animes</h4>
          </div>
          <div class="full">
            <p>Podemos ocultarlo temporalmente o eliminarlo permanentemente de la página</p>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
        <div class="full feature_box">
          <div class="full icon">
            <img class="default-block imagen_icono" src="images/icon_4.png" alt="#" />
            <img class="default-none imagen_icono" src="images/icon_4.png" alt="#" />
          </div>
          
          <div class="full">
            <h4>Búsqueda</h4>
          </div>
          
          <div class="full">
            <p>Los animes que usted guarda los puede buscar por nombre o los puede filtrar por género</p>
          </div>

        </div>
      </div>
    </div>

    <br /><br />
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="heading_main text_align_center">
            <h2>Últimos animes agregados</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="glide">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
          <?php foreach($resultados as $r): ?>
            <li class="glide__slide">
              <a href="single_anime?id=<?php echo $r['anime_id']; ?>">
                <div class="col-12">
                  <div class="full feature_box">
                    <div class="full icon">
                      <img class="default-block animes_lista" src="images/animes/<?php echo $r['anime_imagen'];?>" alt="#" />
                      <img class="default-none animes_lista" src="images/animes/<?php echo $r['anime_imagen'];?>" alt="#" />
                    </div>
                    
                    <div class="full">
                      <h4 class="text-capitalize text-truncate"><?php echo $r['anime_nombre'];?></h4>
                    </div>
                    <div class="full">
                      <p></p>
                    </div>
                  </div>
                </div>
              </a>
            </li>
            <?php endforeach; ?>
            </div>
          </ul>
        </div>
      </div>
      

      <br />
      <?php if ($resultados2): ?>
      <div class="row">
        <div class="col-md-12">
          <div class="full">
            <div class="heading_main text_align_center">
              <h2>Animes por ver hoy</h2>
            </div>
          </div>
        </div>
    </div>
      
        <div class="row">
          <?php foreach($resultados2 as $r2): ?>
            <div class="col-sm-12 col-lg-4">
              <a class="cards_anime" href="single_anime?id=<?php echo $r2['anime_id']; ?>">
                <div class="card centrar_imagen cards_anime" style="width: 18rem;">
                  <img class="card-img-top" src="images/animes/<?php echo $r2['anime_imagen'];?>" alt="Card image cap">
                  <div class="card-body cards_anime">
                    <p class="card-text text_align_center text_card_anime text-capitalize text-truncate"><b><?php echo $r2['anime_nombre'];?></b></p>
                  </div>
                </div>
                <br />
              </a>
            </div>
            <?php endforeach; ?>
        </div>
      <?php endif; ?>
          


  </div>
</div>

          <!-- end section -->
         <!-- section

<div class="section about_section layout_padding padding_top_0">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="heading_main text_align_center">
            <h2 class="margin-bottom_30"><strong class="small theme_color">Increase your client for</strong><br>Better position of Business</h2>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="full">
          <div class="heading_small">
            <h4>Increase your client</h4>
          </div>
            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a pass<br><br>age of Lorem Ipsum, you need to be sure there isn'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn</p>
        </div>
        
        <div class="full margin-top_30">
          <a class="readmore_bt" href="about.html">Read More</a>
        </div>
      </div>
      
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <div class="full text_align_center">
          <img class="img-responsive" src="images/f1.png" alt="#" />   
        </div>
      </div>
    </div>
  </div>
</div>
        end section -->
        <!-- section
<div class="section about_section layout_padding padding_top_0">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="heading_main text_align_center margin-bottom_30">
            <h2><strong class="small theme_color">Previous Projects</strong><br>Our Case Studies</h2>
          </div>
        </div>
      </div>
      
      <div class="col-lg-10 offset-lg-1">
        <div class="full text_align_center">
          <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some 
          form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a 
          passage of Lorem Ipsum, you need to be sure there isn'</p>
        </div>
      </div>
    </div>
               
    <div class="row">
      <div class="col-md-12">
        <div class="full text_align_center">
          <img class="img-responsive" src="images/video_img.jpg" alt="#" />
        </div>
      
      <div class="full center">
        <a class="readmore_bt" href="about.html">Read More</a>
      </div>
      </div>
    </div>
  </div>
</div>
          end section -->
         <!-- section 
<div class="section dark_blue_layout white_fonts layout_padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-4">
        <div class="full">
          <div class="heading_main text_align_left" style="margin-bottom: 0;">
            <h2><strong class="small">Get your  free quote</strong><br>Today</h2>
          </div>
        </div>
      </div>
      <div class="col-md-12 col-lg-8">
        <div class="full">
          <div class="form_section">
            <form class="news_submit_form">
              <fieldset>
                <div class="field">
                  <input type="email" placeholder="Enter url" name="#" required />
                  <button>Submit</button>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
          end section -->
         <!-- section 
<div class="section about_section layout_padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="full">
          <div class="heading_main text_align_center margin-bottom_30">
            <h2><strong class="small theme_color">We’ve done lot’s of work, Let’s</strong><br>Check some from here</h2>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">

      <div class="col-sm-6 col-md-3 col-lg-3">
        <div class="work_blog margin-top_30">
          <img class="img-responsive" src="images/blog1.jpg" alt="#" />
          <div class="hover_workblog">
            <img src="images/search_icon.png" alt="#" />
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-3 col-lg-3">
        <div class="work_blog margin-top_30">
          <img class="img-responsive" src="images/blog2.jpg" alt="#" />
          <div class="hover_workblog">
            <img src="images/search_icon.png" alt="#" />
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-3 col-lg-3">
        <div class="work_blog margin-top_30">
          <img class="img-responsive" src="images/blog3.jpg" alt="#" />
          <div class="hover_workblog">
            <img src="images/search_icon.png" alt="#" />
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-3 col-lg-3">
        <div class="work_blog margin-top_30">
          <img class="img-responsive" src="images/blog4.jpg" alt="#" />
          <div class="hover_workblog">
            <img src="images/search_icon.png" alt="#" />
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
          end section -->
         <!-- section 
         <div class="section about_section layout_padding padding_top_0">
            <div class="row">
                  <div class="col-md-12">
                     <div class="full">
                        <div class="heading_main text_align_center margin-bottom_30">
                           <h2>Get in touch</h2>
                        </div>
                     </div>
                  </div>
               </div>
         </div>
        end section -->
        <!-- section
         <div class="section contact_section">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-6 theme_color_bg fc3726 padding_0">
                     <div class="full">
                        <div class="row">
                           <div class="col-sm-12 col-md-10 offset-lg-1">
                              <div class="full contact_form">
                                 <form class="contact_form_inner" action="#">
                                    <fieldset>
                                       <div class="field">
                                          <input type="text" name="name" placeholder="Your name" />
                                       </div>
                                       <div class="field">
                                          <input type="email" name="email" placeholder="Email" />
                                       </div>
                                       <div class="field">
                                          <input type="text" name="phone_no" placeholder="Phone number" />
                                       </div>
                                       <div class="field">
                                          <textarea placeholder="Message"></textarea>
                                       </div>
                                       <div class="field center">
                                          <button class="margin-top_30">SEND</button>
                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 padding_0">
                     <div class="full">
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="full map_section">
                                 <div id="map">
                                    <div id="googleMap" style="width:100%;height:440px;"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         end section -->


