<?php require 'header.php';?>
<div class="section contact_section">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-12 theme_color_bg fc3726 padding_0">
            <div class="full">
               <div class="row">
                  <div class="col-sm-12 col-md-10 offset-lg-1">
                     <div class="full contact_form">
                        <?php if($errores): ?>
                           <?php  foreach($errores as $error): ?>
                           <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
                              <?php echo $error;?>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <?php  endforeach; ?>
                        <?php endif; ?>
                        <form onsubmit="return validaregistro()" method="POST" class="contact_form_inner" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
                           <fieldset>
                              <div class="field">
                                 <input type="text" class="comprobar_nombre" name="anime_nombre" id="anime_nombre" placeholder="Nombre del anime" value="<?php echo isset($_POST['anime_nombre']) ? $_POST['anime_nombre'] : '';?>"/>
                              </div>
                              <div class="field">
                                 <input type="number" name="anime_cantidad_capitulos" id="anime_cantidad_capitulos"  placeholder="Cantidad de capítulos" value="<?php echo isset($_POST['anime_cantidad_capitulos']) ? $_POST['anime_cantidad_capitulos'] : '';?>"/>
                              </div>
                              <div class="field">
                                 <input type="number" name="anime_capitulo_terminado_ver" id="anime_capitulo_terminado_ver" placeholder="Ultimo capítulo visto" value="<?php echo isset($_POST['anime_capitulo_terminado_ver']) ? $_POST['anime_capitulo_terminado_ver'] : '';?>" />
                              </div>
                              <br />
                              <div class="field">
                                 <textarea name="anime_sinopsis" id="anime_sinopsis" style="border: 2px solid #ccc"  cols="15" rows="5" placeholder="Escriba la sinopsis aqui"><?php echo isset($_POST['anime_sinopsis']) ? $_POST['anime_sinopsis'] : '';?></textarea>
                              </div>
                              <br />
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                    <label class="input-group-text" for="anime_actualidad">Estado</label>
                                 </div>
                                 <select class="custom-select" id="anime_actualidad" name="anime_actualidad">
                                    <option value="Terminado">Terminado</option>
                                    <option value="En emision">En emision</option>
                                </select>
                              </div>
                              <small class="form-text text-muted">Estado del anime en television: en emisión o terminado</small>
                              <br />

                              <div class="input-group mb-3" id="select_estreno" style="display:none">
                                 <div class="input-group-prepend">
                                    <label class="input-group-text" for="dia_estreno">Día proximos episodios</label>
                                 </div>
                                 <select class="custom-select" id="dia_estreno" name="dia_estreno">
                                    <option value="">Elija opcion</option>
                                    <option value="lunes">Lunes</option>
                                    <option value="martes">Martes</option>
                                    <option value="miercoles">Miércoles</option>
                                    <option value="jueves">Jueves</option>
                                    <option value="viernes">Viernes</option>
                                    <option value="sabado">Sábado</option>
                                    <option value="domingo">Domingo</option>
                                </select>
                                <br />
                              </div>
                              
                              
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

                              <div class="custom-file">
                                 <select class="js-example-basic-multiple" id="id_label_multiple" name="generos[]" multiple="multiple">
                                    <?php foreach($generos as $genero): ?>
                                    <option value="<?php echo $genero['genero_id'];?>"><?php echo $genero['genero_nombre'];?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <small class="form-text text-muted">Géneros del anime</small>
                              
                              <br />
                              <div class="field center">
                                 <button type="submit" class="margin-top_30 btn btn-success">REGISTRAR ANIME</button>
                              </div>
                           </fieldset>
                        </form>
                        <br />
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script>

</script>

<?php require 'footer.php';?>