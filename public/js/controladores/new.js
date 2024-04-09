$(document).ready(function() {
    $(".boton").click(function() {        
      // Oculta todos los contenidos
      $(".pagina").hide();
      
      // Muestra el contenido correspondiente al botón clickeado
      var target = $(this).data("target");
      $("#" + target).show();
    });
  });