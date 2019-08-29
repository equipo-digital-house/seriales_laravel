window.addEventListener("load", function(){
    
    let formulario = document.getElementById("formularioLogin");
    formulario.elements.email.focus();
    formulario.onsubmit = function(evento){
       if(!validateLoginForm()){
           evento.preventDefault();
       } else {
           loginForm.submit();
       }
    }

    function validateLoginForm(){
        let {email, password} = formulario.elements;

        if(!validateEmail(email)) return false;
        if(!validatePassword(password)) return false;
        return true;
    }

    function validateEmail(email){
        let regex = 	
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        let error = document.getElementById('errorEmail');
  
        if  (!regex.test(email.value)){    
            email.classList.add('is-invalid');
            error.innerHTML = "Por favor, ingresa un email válido";
            return false;
        } else {
            error.innerHTML= "";
            email.classList.remove('is-invalid'); 
            email.classList.add('is-valid');
            formulario.elements.password.focus();
            return true;
        }
      }

      function validatePassword(password){
        let errorPassword = document.getElementById('errorPassword');

        if (password.value.length < 6) {
            errorPassword.innerHTML = "La contraseña debe tener seis caracteres como mínimo";
            password.classList.add('is-invalid');
            return false;
        } else {
            errorPassword.innerHTML = "";
            password.classList.remove('is-invalid');
            password.classList.add('is-valid');
            return true;
        }
    }

    // Efecto boton login

    let botonLogin = document.querySelector(".btn-formulario");
    botonLogin.onmouseover = function(){
        this.style.backgroundColor = "#2b6170";
        this.style.color = "#f34573";
        this.style.border = "2px dashed #75cac2";
    }

    botonLogin.onmouseout = function(){
        this.style.backgroundColor = "#75cac2";
        this.style.color = "white";
        this.style.border = "2px solid #2b6170";
    }

});