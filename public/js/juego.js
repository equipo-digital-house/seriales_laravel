window.onload = function () {

  function shuffle(array) {
    var currentIndex = array.length, temporaryValue, randomIndex;

    // While there remain elements to shuffle...
    while (0 !== currentIndex) {

      // Pick a remaining element...
      randomIndex = Math.floor(Math.random() * currentIndex);
      currentIndex -= 1;

      // And swap it with the current element.
      temporaryValue = array[currentIndex];
      array[currentIndex] = array[randomIndex];
      array[randomIndex] = temporaryValue;
    }

    return array;
  }

  //add Modal
  let series;
  let modal = document.querySelector('.modal');
  let seriesElegidas = [];
  let preguntasElegidas = [];

  (function addModal () {

    modal.style.display = "block";
  })();

  window.onsubmit = function(event) {
    (function removeModal() {

      let form = document.querySelector('#series-form');

      event.preventDefault()

      if (event.target == form) {
        modal.style.display = "none";
      }
    })();

    //Get the series
    series = document.getElementsByClassName('serie-checked');

    let preguntas = document.getElementsByClassName('tituloA');

    for(serie of series) {
      if(serie.checked == true) {
        seriesElegidas.push(serie.id);
      }
    }

    for(pregunta of preguntas) {
      for(serieElegida of seriesElegidas) {
        //VERIFICO QUE LA SERIE ELEGIDA SEA LA MISMA QUE EL ATRIBUTO SERIE-ID
        let serieId = pregunta.getAttribute("data-serie-id");
        //SI SON IGUALES LO MANDO AL ARRAY PREGUNTASELEGIDAS
        if(serieId == serieElegida) {
          preguntasElegidas.push(pregunta);
        }
      }
    }

    //Mezclar preguntasElegidas

    (function mostrarPregunta() {
      let indice = 0;
      let clicks = 0;
      let preguntasMezcladas = shuffle(preguntasElegidas);
      let respuestas = document.getElementsByClassName("response");
      let pregunta = preguntasMezcladas[indice];

      pregunta.parentElement.style.display = 'flex';

      function answers(e) {
        let correctAnswer = this.getAttribute("data-correct");

        if(correctAnswer != 0) {
          this.classList.add("respuestaCorrecta");
        } else {
          this.classList.add("respuestaIncorrecta");
        }

        clicks++;

        (function quitarEventoARespuesta() {
          if(clicks!= 0) {
            for(respuesta of respuestas) {
              respuesta.removeEventListener('click', answers);
            }
          }
        })()

        setTimeout(
          function() {
            let indiceMaximo = preguntasMezcladas.length - 1;
            if(indice < indiceMaximo && indice < 14) {
              pregunta.parentElement.style.display = 'none';
              clicks = 0;
              if(respuestasIncorrectas() == false) {
                agregarEventoARespuesta();
                proximaPregunta();
              } else {
                respuestasIncorrectas();
              }
            }
          }, 1000);
      }

      agregarEventoARespuesta();


      function proximaPregunta() {
        indice++;

        pregunta = preguntasMezcladas[indice];
        pregunta.parentElement.style.display = 'flex';
      }

      function agregarEventoARespuesta() {
        let respuestas = document.getElementsByClassName("response");
        for(respuesta of respuestas) {
          respuesta.addEventListener('click', answers);
        }
      };

      function respuestasIncorrectas() {
        let respuestasIncorrectas = document.querySelectorAll('.respuestaIncorrecta');
        console.log(respuestasIncorrectas.length);

        if(respuestasIncorrectas.length == 3) {
          let mensaje =
          Swal.fire({
            type: 'error',
            title: 'No estas de suerte!',
            text: 'Queres seguir jugando?',
            confirmButtonText: 'Jugar!',
            confirmButtonColor: '#F34573',
            onClose: () => {
              refresh();
              mostrarPregunta();
            }
          })

          return mensaje;
        } else {
          return false;
        }
      }

      function refresh() {
        let respuestasIncorrectas = document.querySelectorAll('.respuestaIncorrecta');
        let respuestasCorrectas = document.querySelectorAll('.respuestaCorrecta');

        if(respuestasIncorrectas.length!= 0) {
          for(respuesta of respuestasIncorrectas) {
            respuesta.classList.remove('respuestaIncorrecta');
          }
        }

        if(respuestasCorrectas.length!=0) {
          for(respuesta of respuestasCorrectas) {
            respuesta.classList.remove('respuestaCorrecta');
          }
        }
      }
    })()



  }

}
