window.addEventListener("load", function(){

  //Hamburguesa

  let hamburguesa = document.getElementById("hamburguesa");
  hamburguesa.onclick = function(){
    let divLi = document.querySelectorAll("#nav li");
    for(var item of divLi){
      if (item.style.display == "block"){
        item.style.display = "none";
      } else {
        item.style.display = "block";
      }
    }
}

  // Efecto logo nav

  let logoNav = document.querySelector('.logo');
  logoNav.onmouseover = function(){
    this.style.opacity = "0.5";
  }

  logoNav.onmouseout = function(){
    this.style.opacity = "1";
  }


  // Efecto botones

  let botones = document.querySelectorAll(".menu-items a");
  for(var boton of botones){
    boton.onmouseover = function(){
      this.style.backgroundColor = "#f34472";
    }

    boton.onmouseout = function(){
      this.style.backgroundColor = "#75cac3";
      this.style.paddingTop = "10px";
    }

  let paddingBotones = document.querySelectorAll(".menu-items");
  for(var paddingBoton of paddingBotones){
    paddingBoton.onmouseover = function(){
      this.style.paddingTop = "50px";
    }

    paddingBoton.onmouseout = function(){
      this.style.paddingTop = "10px";
    }
  }
  }

});
