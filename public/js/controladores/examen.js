import Examen_Peticiones from "../peticiones/examen.peticiones.js";

var objExamen = new Examen_Peticiones()
var url = window.location.href;
var partesRuta = url.split('/');
var id_url = partesRuta[partesRuta.length - 1];
var objeto

$(document).ready(function() {
  $("#layoutSidenav_content").LoadingOverlay("show");

  (async function() {
    try {
      const jsonData = await objExamen.fetchResultListar(id_url);
      objeto = jsonData
      if (jsonData.error) {
          Swal.fire({
              title: 'Error',
              text: jsonData.error,
              icon: 'error',
              confirmButtonText: 'OK',
          });
      } else{
        agruparData(jsonData)     
      }
      $("#layoutSidenav_content").LoadingOverlay("hide");
    } catch (error) {
      console.error('Error al obtener los datos:', error);
    }
  })();
  
  function agruparData(array) {
    let pagina = 1;
    let c = 1;
    // Iterar sobre el array en pasos de 5
    for (let i = 0; i < array.length; i += 5) {
        // Obtener el subarray de 5 elementos
        const subArray = array.slice(i, i + 5);
        agregarElementos(subArray,pagina,c)
        pagina++;
        c +=5
    }
  }

  function agregarElementos(preguntas,n,c) {
    const div_pagina = $('<div>', {
      id: 'pagina' + n,
      class: 'pagina' + (n !== 1 ? ' oculto' : '')
    });
    // Recorre todas las preguntas en jsonData
    for (const pregunta of preguntas) {
      const pregunta_texto = pregunta.pregunta_texto;

      const div_pregunta = $('<div>', {
          class: 'card pregunta ',
      });

      const div_pregunta_texto = $('<div>', {
          class: 'card-header pregunta_texto',
          text: pregunta_texto
      });

      const div_respuestas = $('<div>', {
        class: 'card-body'
      });

      const texto = $('<div>', {
          text: 'Seleccione uno:'
      });

      div_pregunta.append(div_pregunta_texto);
      div_respuestas.append(texto)
      div_pregunta.append(div_respuestas);

      //#region Recorre todas las respuestas de la pregunta actual
      for (const respuesta of pregunta.respuestas) {
        const respuesta_texto = respuesta.respuesta_texto;

        const div = $('<div>');

        const input = $('<input>', {
            type: 'radio',
            name: 'r_pregunta'+c,
            // id: 'flexRadioDefault1'
        });

        const label = $('<label>', {
            // for: 'flexRadioDefault1',
            text: respuesta_texto
        });

        div.append(input);
        div.append(label);
        div_respuestas.append(div);
      }
      //#endregion
      c++
      div_pregunta.append(div_respuestas)
      div_pagina.append(div_pregunta);
      $('.paginas').append(div_pagina);
    }    
  }

  $(".boton").click(function() {
    // Oculta todos los contenidos
    $(".pagina").addClass("oculto")
    $(".boton").removeClass("btn-primary");
    $(this).addClass("btn-primary");
    
    // Muestra el contenido correspondiente al botón clickeado
    var target = $(this).data("target")
    $("#" + target).removeClass("oculto")
    window.scrollTo(0, 0);
  });

  // Captura el clic en el botón "Finalizar examen"
  $('#btnGuardar').click(function() {
    $("#layoutSidenav_content").LoadingOverlay("show");    
    for (var i = 0; i < objeto.length; i++) {

      var respuestas_usuario = [0, 0, 0, 0, 0];
      var array_ok = false
      
      if(objeto[i].respuestas.length != 0){
        $(`[name="r_pregunta${i+1}"]`).each(function(index) {
          if($(this).is(":checked")) {
            respuestas_usuario[index] = 1; // Marca la respuesta correspondiente en el arreglo
          }
        });
        for (var n = 0; n < respuestas_usuario.length; n++) {
          if(respuestas_usuario[n] == 1){
            array_ok = true   
          } 
        }
        if (array_ok) {
          // Reemplazar el arreglo original con el nuevo arreglo 
          objeto[i].respuestas = respuestas_usuario
        } else{
          $("#layoutSidenav_content").LoadingOverlay("hide");
          Swal.fire({
            title: 'Error',
            text: 'Debe marcar alguna respuesta en todas las preguntas',
            icon: 'error',
            confirmButtonText: 'OK',
          })
          return
        }
      }
    }
    (async function() {
      try {
        const jsonData = await objExamen.fetchResultEnviar(objeto, id_url);
        if (jsonData.error) {
          Swal.fire({
            title: 'Error',
            text: jsonData.error,
            icon: 'error',
            confirmButtonText: 'OK',
          });
        } else{
          localStorage.removeItem('key');
          window.location.href = '/notas';
        }
  
      } catch (error) {
        console.error('Error al obtener los datos:', error);
      }
    })();
  });
  $("#layoutSidenav_content").LoadingOverlay("hide");
});