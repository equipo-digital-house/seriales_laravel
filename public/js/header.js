window.onload = function(){

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

  let botones = document.querySelectorAll("#nav li");
  console.log(botones);
  for(var item of botones){
    botones.onmouseover = function(){
      item.padding-top = "3px";
    }

    botones.onmouseout = function(){
      item.padding-top = "0px";
    }
}

  



}
