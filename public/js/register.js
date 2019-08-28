window.addEventListener("load", function(){
    let formulario = document.getElementById("formularioRegistro");
    formulario.elements.name.focus();
    formulario.onsubmit = function(evento){
       if(!validateRegisterForm()){
           evento.preventDefault()
       } else {
           registerForm.submit();
       }
    }

    function validateRegisterForm(){
        let {name, email, password, password_confirmation, terCo} = formulario.elements;

        if(!validateName(name)) return false;
        if(!validateEmail(email)) return false;
        if(!validatePassword(password)) return false;
        if(!validatePasswordConfirmation(password, password_confirmation)) return false;
        if(!validateTerCo(terCo)) return false;
        return true;
    }

    function validateName(name){
        let regex = /^[A-Za-z]{4,}\d*$/;
        let error = document.getElementById("errorName");

        if  (!regex.test(name.value)){
            name.classList.add('is-invalid');
            console.log(errorName);
            error.innerHTML = "El nombre debe tener cuatro letras como mínimo";
            return false
        } else {
            error.innerHTML = "";
            name.classList.remove('is-invalid');
            name.classList.add('is-valid');
            formulario.elements.email.focus();
            return true;
        }
    }


    function validateEmail(email){
        let regex = 	
        /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        let error = document.getElementById('errorEmail');
  
        if  (!regex.test(email.value)){    
            email.classList.add('is-invalid'); 
            console.log(errorEmail);
            error.innerHTML = "Por favor, ingresa un email válido";
            return false;
        } else {
            error.innerHTML= "";
            email.classList.remove('is-invalid'); 
            email.classList.add('is-valid');
            formulario.elements.password.focus()
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
            formulario.elements.password_confirmation.focus();
            return true;
        }
    }


    function validatePasswordConfirmation(password, password_confirmation){
        if (password.value != password_confirmation.value) {
          errorPassword_confirmation.innerHTML = "Las contraseñas no coinciden";
          password_confirmation.classList.add('is-invalid');
          return false;
        } else {
          errorPassword_confirmation.innerHTML = "";
          password_confirmation.classList.remove('is-invalid');
          password_confirmation.classList.add('is-valid');
          formulario.elements.terCo.focus();
          return true;
        }
        
    }


    function validateTerCo(terCoChecked){
        let errorTerCo = document.getElementById('errorTerCo');
        if (!terCoChecked.checked){
          errorTerCo.innerHTML = "Debes leer y aceptar el spoiler alert";
          terCoChecked.classList.add('is-invalid');
          return false;
        } else {
          errorTerCo.innerHTML = "";
          terCoChecked.classList.remove('is-invalid');
          terCoChecked.classList.add('is-valid');
          return true;
        }

    }


});