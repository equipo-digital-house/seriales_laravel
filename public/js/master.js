window.onload = function(){

  // Efecto logo nav

  let logoNav = document.querySelector('.logo');
  logoNav.onmouseover = function(){
    this.style.opacity = "0.5";
  }

  logoNav.onmouseout = function(){
    this.style.opacity = "1";
  }


  //Efecto botones nav

  let botones = document.querySelectorAll('menu-items a');
  console.log(botones);
  botones.onmouseover = function(){
    this.style.width = "90%";
  }

  botones.onmouseout = function(){
    this.style.width = "100%";
  }

}
