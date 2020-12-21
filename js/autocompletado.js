$(document).ready(function() {
  $('#b').on('keyup', function() {
    var key = $(this).val();    
    var dataString = 'b='+key;
    $.ajax({
      type: "POST",
      url: "autocompletado.php",
      data: dataString,
      success: function(data) {
        //Escribimos las sugerencias que nos manda la consulta
        $('#suggestions').fadeIn(1000).html(data);
        //Al hacer click en algua de las sugerencias
        $('.suggest-element').on('click', function(){
          //Obtenemos la id unica de la sugerencia pulsada
          var id = $(this).attr('id');
          //redirecciona al anime donde se le hace clic
          location.href='single_anime?id='+id;
          //Editamos el valor del input con data de la sugerencia pulsada
          //$('#b').val($('#'+id).attr('data'));
          //Hacemos desaparecer el resto de sugerencias
          $('#suggestions').fadeOut(1000);
          //alert('Has seleccionado el '+id+' '+$('#'+id).attr('data'));
          return false;
               });
            }
      });
      });
      }); 
