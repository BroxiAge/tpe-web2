<br>    ------------------------quedafeoperoesunadivision---------------------

<ul data-idspare = "{$spare->id}" data-iduser = {$user->id_user} id= "comentaries-list">
    
            
</ul>

{if $user->rol eq 0 || $user->rol eq 1}

    <article>
        <form id= "cometarie-form" method ="POST" >
            <section class="div-form">
                <label for="input-comentarie">Ingrese comentario:</label>
                <input type="text" name="input-comentarie">
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

<script src="../js/comentaries.js"></script>






