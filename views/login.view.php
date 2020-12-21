<?php require 'header.php'; ?>
<div class="section contact_section">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12 theme_color_bg fc3726 padding_0">
            <div class="full">
               <div class="row">
                  <div class="col-sm-12 col-md-10 offset-lg-1">
                     <div class="full contact_form">
                        <form id="formulario_login" onsubmit="return validarlogin()" method="POST" class="contact_form_inner">
                           <fieldset>
                              <div class="field">
                                 <input type="text" name="user" id="user" placeholder="Usuario"/>
                              </div>
                              <div class="field">
                                 <input type="password" name="password" id="password" placeholder="Contraseña"/>
                              </div>
                              <div class="field center">
                                 <button type="submit" class="margin-top_30">INICIAR SESIÓN</button>
                              </div>
                           </fieldset>
                        </form>
                           <?php if(isset($errores) && !empty($errores)): ?>
                              <?php echo $errores; ?>
                           <?php endif; ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php require 'footer.php';?>


