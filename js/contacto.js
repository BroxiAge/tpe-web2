"use strict";

let botonVerificarCaptcha = document.getElementById('boton-verificar-captcha');
botonVerificarCaptcha.addEventListener("click", function (e){
  e.preventDefault();
  verificarCaptcha();
});

let captcha;

generarCaptcha();

function generarCaptcha() {
  captcha = Math.floor((Math.random()*999999)+1);
  document.getElementById("valor-captcha").innerHTML = captcha;

}

function verificarCaptcha() {
  let inputValue = document.getElementById('captcha').value;
  if (inputValue == captcha) {
      document.getElementById("comprobacion-captcha").innerHTML = "El mensaje fue enviado";
      
  }
  else {
    document.getElementById("comprobacion-captcha").innerHTML = "El captcha es incorrecto";
    
  }

}
