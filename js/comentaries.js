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
    const container = document.querySelector("#comentaries-list");
    id_spare = container.dataset.idspare;
    
    fetch('http://localhost/web2/tpe-web2/api/comentaries/'+ id_spare)
        .then(response => response.json())
        .then(comentaries => render(comentaries)) 
        .catch(error => console.log(error));
}

function inicButtons(){
    let deleteButtons = document.getElementsByClassName("delete-button");
    for (let i = 0; i < deleteButtons.length; i++) {
         deleteButtons[i].addEventListener("click",deleteComentarie);
        
    }
}

function render(comentaries){
    const container = document.querySelector("#comentaries-list");
    container.innerHTML = ""; 
    let rol = container.dataset.roluser;
    
    if(comentaries != ""){
        for (let comentarie of comentaries){
            let cont = document.createElement("article");
            let user = document.createElement("h5");
            user.innerText = comentarie.id_usuarios;
            let commentary = document.createElement("p");
            commentary.innerText = comentarie.commentary;
            let score = document.createElement ("p");
            score.innerText = "Valoracion de usuario: " + comentarie.score;
            cont.appendChild(user);
            cont.appendChild(commentary);
            cont.appendChild(score);
            if(rol == 1){
                let btn = document.createElement("input");
                btn.setAttribute("type", "button");
                btn.setAttribute("data-idcommentary", comentarie.id);
                btn.setAttribute("value", "Eliminar comentario");
                btn.setAttribute("class","delete-button");
                cont.appendChild(btn);
            }
            container.appendChild(cont);

        }
        inicButtons();
    
    }else{
        container.innerText = "Aun no se han hecho comentarios";
    }
        
}

function addComentarie(){
    const container = document.querySelector("#comentaries-list");
    id_spare = container.dataset.idspare;
    id_user = container.dataset.iduser;
    const commentary = {
        commentary: document.querySelector('textarea[name="input-comentarie"]').value,
        score: document.querySelector('select[name="select-spare-score"]').value,
        id_spare: id_spare,
        id_user: id_user
        
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

function deleteComentarie(){
    id = this.dataset.idcommentary;
    fetch("http://localhost/web2/tpe-web2/api/comentaries/" + id,{
        method : "DELETE",
       }).then(m =>getComentaries())
    
}