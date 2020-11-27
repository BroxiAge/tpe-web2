document.addEventListener("DOMContentLoaded",iniciarPagina);
function iniciarPagina(){

    "use strict";

    getComentaries();
    
    document.querySelector('#cometarie-form').addEventListener('submit', e => {
        // evita el envio del form default
        e.preventDefault();

        addComentarie();
    });
   


}



function getComentaries(){
    
    
    fetch('http://localhost/web2/tpe-web2/api/comentaries')
        .then(response => response.json())
        .then(comentaries => render(comentaries)) 
        .catch(error => console.log(error));
}

function render(comentaries){
    const container = document.querySelector("#comentaries-list");
    container.innerHTML = ""; 
    for (let comentarie of comentaries){
        container.innerHTML += comentarie.commentary;
    }
        
}

function addComentarie(){
    const commentary = {
        commentary: document.querySelector('input[name="input-comentarie"]').value,
        score: document.querySelector('select[name="select-spare-score"]').value
    }
    

    fetch('http://localhost/web2/tpe-web2/api/comentaries', {
        method: 'POST',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(commentary)
    })
        .then(response => response.json())
        .then(c => getComentaries())
        .catch(error => console.log(error));
}