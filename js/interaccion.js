document.addEventListener("DOMContentLoaded",iniciarPagina);
function iniciarPagina(){

  "use strict";

  let logosSocial = document.getElementsByClassName("contenedor-logo-social");
  for (let i = 0; i < logosSocial.length; i++){
    logosSocial[i].addEventListener("mouseover", socialHover);
    logosSocial[i].addEventListener("mouseout", socialOut);
  }

  let links = document.getElementsByTagName("a");
  for (let i = 0; i < links.length; i++){
    links[i].addEventListener("mouseover", linkHover);
    links[i].addEventListener("mouseout", linkOut);
  }

  function linkHover(){
    this.classList.add("link-hover");
  }

  function linkOut(){
    this.classList.remove("link-hover");
  }

  function socialHover(){
    this.classList.add("social-hover");
  }

  function socialOut(){
    this.classList.remove("social-hover");
  }
  
  let botonMenu = document.getElementById('boton-menu');
  botonMenu.addEventListener("click", desplegarMenu);

  function desplegarMenu(){
    let linksNav = document.getElementsByClassName("link-nav");
    if (botonMenu.value == 1) {
      for (var i = 0; i < linksNav.length; i++) {
        mostrarOculto(linksNav[i]);
        document.getElementsByClassName("navigation")[0].classList.add("fondo-negro");
        document.getElementsByClassName("navigation")[0].classList.remove("fondo-transparente");
        botonMenu.value++;
      }
    }
    else {
      for (var i = 0; i < linksNav.length; i++) {
        ocultar(linksNav[i]);
        document.getElementsByClassName("navigation")[0].classList.add("fondo-transparente");
        document.getElementsByClassName("navigation")[0].classList.remove("fondo-negro");
        botonMenu.value = 1;
      }
    }

  }

  function mostrarOculto(elemento){
    elemento.classList.add("visible");
    elemento.classList.remove("oculto")

  }

  function ocultar(elemento) {
    elemento.classList.add("oculto");
    elemento.classList.remove("visible");
  }

  
}

