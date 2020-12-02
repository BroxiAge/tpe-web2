{include file="header.tpl"}

<article id="categories-container">
    <ul>
        {foreach from=$categories item=categorie}
            <li>
                <a class="categorie-link" href="{BASE_URL}categories/{$categorie->name}">{$categorie->name}</a>
                {if $user->rol eq 1}
                    <a href="{BASE_URL}deleteCategorie/{$categorie->id_categorie}">Eliminar categoria</a>
                    <form action="modifyCategorie/{$categorie->id_categorie}" method ="POST" >
                            <label for="input_new_name">Ingrese nuevo nombre de categoria:</label>
                            <input type="text" cols="30" name="input_new_name">
                            <button type="submit">Modificar</button>
                    </form>
                {/if}
                
            </li>
        {/foreach}
    </ul>

    {if $user->rol eq 1}
        <form action="addCategorie" method ="POST" >
            <section class="div-form">
                <label for="input_categorie">Ingrese nueva categoría:</label>
                <input type="text" name="input_categorie">
                <button type="submit">Agregar</button>
            </section>
        </form>
    {/if}
</article>


{include file="footer.tpl"}

