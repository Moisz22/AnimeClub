<?php require 'header.php';?>
<div class="section contact_section">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12 theme_color_bg fc3726 padding_0">
            <div class="full">
               <div class="row">
                  <div class="col-sm-12 col-md-10 offset-lg-1">
                     <div class="full contact_form">
                        <form onsubmit="return validaregistro()" method="POST" class="contact_form_inner" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
                           <fieldset>
                              <div class="field">
                                 <input type="text" name="anime_nombre" id="anime_nombre" placeholder="Nombre del anime"/>
                              </div>
                              <div class="field">
                                 <input type="number" name="anime_cantidad_capitulos" id="anime_cantidad_capitulos"  placeholder="Cantidad de capítulos"/>
                              </div>
                              <div class="field">
                                 <input type="number" name="anime_capitulo_terminado_ver" id="anime_capitulo_terminado_ver" placeholder="Ultimo capítulo visto" min="1" />
                              </div>
                              <br />
                              <div class="field">
                                 <textarea name="anime_sinopsis" id="anime_sinopsis" style="border: 2px solid #ccc"  cols="15" rows="5" placeholder="Escriba la sinopsis aqui"></textarea>
                              </div>
                              <br />
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                    <label class="input-group-text" for="anime_actualidad">Estado del anime</label>
                                 </div>
                                 <select class="custom-select" id="anime_actualidad" name="anime_actualidad">
                                    <option value="Terminado">Terminado</option>
                                    <option value="En emision">En emision</option>
                                </select>
                              </div>
                              <br />
                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" id="inputGroupFile03" name="foto" required>
                                 <label for="inputGroupFile03" class="custom-file-label">Imagen del anime</label>
                              </div>
                              <br /><br />
                              <div class="custom-file">
                                 <input type="file" class="custom-file-input" id="inputGroupFile04" name="banner" required>
                                 <label for="inputGroupFile03" class="custom-file-label">Banner del anime</label>
                              </div>
                              <br />
                                 <br />
                                 <div class="container-fluid">
                                    <label>Generos</label>
                                       <br />
                                    <div class="row">
                                       <?php foreach ($generos as $genero): ?>
                                          <div class="col-6 col-sm-4">
                                             <label class="form-control" for="<?php echo $genero['genero_nombre'];?>"><?php echo $genero['genero_nombre'];?></label> <input class="form-control" id="<?php echo $genero['genero_nombre'];?>" type="checkbox" name="<?php echo $genero['genero_nombre'];?>" value="<?php echo $genero['genero_nombre'];?>">
                                             <br/>
                                          </div>
                                       <?php endforeach ?>
                                    </div>
                                 </div>
                              
                              <div class="field center">
                                 <button type="submit" class="margin-top_30">REGISTRAR ANIME</button>
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