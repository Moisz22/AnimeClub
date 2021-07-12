//script para las tablas borradas
$(document).ready(function(){
  //si el select cambia de estado se activa la función
  $('#tablas_traer').on('change', function (){
    if($('#tablas_traer').val() == 1){
      $('#tabla_dibujar').load('views/tablas/tabla_animes_eliminados.php');
    }else if($('#tablas_traer').val() == 2){
      $('#tabla_dibujar').load('views/tablas/tabla_reseñas_eliminadas.php');
    }else{
      //limpiar comtenido del html con ese id
      document.getElementById("tabla_dibujar").innerHTML="";
    }
  });

   /*script para todas las tablas
  si el select cambia de estado se activa la función */
  $('#tablas_bd').on('change', function (){
    if($('#tablas_bd').val() == 1){
      $('#tablas_traer_todas').load('views/tablas/tabla_todos_los_animes.php');
    }else if($('#tablas_bd').val() == 2){
      $('#tablas_traer_todas').load('views/tablas/tabla_todas_las_reseñas.php');
    }else if($('#tablas_bd').val() == 3){
      $('#tablas_traer_todas').load('views/tablas/tabla_todos_los_generos.php');
    }else {
      //limpiar contenido del html con ese id
      document.getElementById("tablas_traer_todas").innerHTML="";
    }
  });


});

