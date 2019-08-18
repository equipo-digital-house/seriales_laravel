//Validaciones Registro

window.onload = function(){
  var registro = document.querySelector("#formularioRegistro")
  registro.elements.name.focus()
  registro.onsubmit = function(evento){
    if(!validaciones()){
      evento.preventDefault()
    } else {
      registro.submit()
    }
  }

  function validaciones(){
    var name = registro.elements.name
    var
    if (!validateName(name.value)) return false
    return true
  }

  function validateName(name){
    var error = document.getElementById("name")
    if (name === "" || name.length <= 3){
      error.innerHTML = "El nombre debe tener más de 3 caracteres"
      error.setAttribute("class", "alert-danger")
      return false
    } else {
      error.innerHTML = ""
      error.removeAttribute("class", "alert-danger")
      registro.elements.name.focus()
      return true
    }
  }
}
