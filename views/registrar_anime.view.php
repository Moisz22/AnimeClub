<?php require 'header.php';?>
<div class="section contact_section">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12 theme_color_bg fc3726 padding_0">
            <div class="full">
               <div class="row">
                  <div class="col-sm-12 col-md-10 offset-lg-1">
                     <div class="full contact_form">
                        <form method="POST" class="contact_form_inner" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
                           <fieldset>
                              <div class="field">
                                 <input type="text" name="anime_nombre" placeholder="Nombre del anime" required />
                              </div>
                              <div class="field">
                                 <input type="number" name="anime_cantidad_capitulos" placeholder="Cantidad de capítulos" min="1" required />
                              </div>
                              <div class="field">
                                 <input type="number" name="anime_capitulo_terminado_ver" placeholder="Ultimo capítulo visto" min="1" required />
                              </div>
                              <div class="field">
                                 <textarea required style="border: 2px solid #ccc" name="anime_sinopsis" cols="15" rows="5" placeholder="Escriba la sinopsis aqui"></textarea>
                              </div>
                              <br />
                              <div class="field">
                                 <label>Actualidad del anime</label>
                                 <select name="anime_actualidad">
                                    <option value="Terminado">Terminado</option>
                                    <option value="En emision">En emision</option>
                                 </select>
                              </div>
                              <br />
                              <div class="field">
                                 <label>Imagen del anime</label>
                                 <input type="file" name="foto">
                              </div>
                              <br />
                              <div class="field">
                                 <label>Banner del anime</label>
                                 <input type="file" name="banner">
                              </div>
                                 <br />
                                 <div class="container-fluid">
                                    <label>Generos</label>
                                       <br />
                                    <div class="row">
                                       <?php foreach ($generos as $genero): ?>
                                          <div class="col-6 col-sm-4">
                                             <label class="text_align_center" for="<?php echo $genero['genero_nombre'];?>"><?php echo $genero['genero_nombre'];?></label> <input style="width:15px; height:15px;" id="<?php echo $genero['genero_nombre'];?>" type="checkbox" name="<?php echo $genero['genero_nombre'];?>" value="<?php echo $genero['genero_nombre'];?>">
                                          </div>
                                       <?php endforeach ?>
                                    </div>
                                 </div>
                              
                              <div class="field center">
                                 <button class="margin-top_30">REGISTRAR ANIME</button>
                              </div>
                           </fieldset>
                        </form>
                        <ul>
                           <?php if(isset($errores) && !empty($errores)): ?>
                              <?php echo $errores; ?>
                           <?php endif; ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<?php require 'footer.php';?>