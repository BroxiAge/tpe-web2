<article id= "comentaries-container">
    <h4>Comentarios:</h4>
    <ul data-idspare = "{$spare->id}" data-iduser = {$user->id_user} id= "comentaries-list">
        
                
    </ul>

    {if $user->rol eq 0 || $user->rol eq 1}

        <article class= "commentary-form-container">
            <form id= "cometarie-form" method ="POST" >
                <section class="div-form">
                    <label for="input-comentarie">Ingrese comentario:</label>
                    <textarea cols = 60 rows= 10 name="input-comentarie"></textarea>
                    <select name="select-spare-score" id="select-spare-score">
                        <option value= 1>1</option> 
                        <option value= 2>2</option> 
                        <option value= 3>3</option> 
                        <option value= 4>4</option> 
                        <option value= 5>5</option> 
                    </select>
                    <button type="submit">Enviar</button>
                </section>
            </form>
        </article>

    {/if}
</article>




<script src="../js/comentaries.js"></script>






