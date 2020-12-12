<?php require 'header.php';?>
<div class="section contact_section">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12 theme_color_bg fc3726 padding_0">
                     <div class="full">
                        <div class="row">
                           <div class="col-sm-12 col-md-10 offset-lg-1">
                              <div class="full contact_form">
                                 <form method="POST" class="contact_form_inner" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                    <fieldset>
                                       <div class="field">
                                          <input type="text" name="user" placeholder="Usuario" />
                                       </div>
                                       <div class="field">
                                          <input type="password" name="password" placeholder="Contraseña" />
                                       </div>
                                       <div class="field center">
                                          <button class="margin-top_30">INICIAR SESIÓN</button>
                                       </div>
                                    </fieldset>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

<?php require 'footer.php';?>