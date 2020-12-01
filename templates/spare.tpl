{include file="header.tpl"}


<article id="spare-container">
    <section>
        <h2>{$spare->name} {$spare->vehicle}</h2>
        <h3>{foreach from=$categories item=categorie}
            {if $spare->id_categorie eq $categorie->id_categorie}
                {$categorie->name}
            {/if}          
            {/foreach}
        </h3>     

                        
        <span>Precio:${$spare->price}</span>
        <p>descripcion:{$spare->description}</p>


        <a href="spares">atras</a>
    </section>

    {if isset($spare->imagen)}
        <img src="{$spare->imagen}"/>
    {/if}
    {if $user->rol eq 1}
        <form action="edit/{$spare->id}" method ="POST" enctype="multipart/form-data">
            <span>Editar producto</span>
            <label for="input_name">Pieza:</label>
            <input type="text" name="input_name">
            <label for="input_vehicle">Vehiculo:</label>
            <input type="text" name="input_vehicle">
            <select name="select_categorie" id="select_categorie">
                {foreach from=$categories item=categoria}
                    <option value={$categoria->id_categorie}>{$categoria->name}</option>              
                {/foreach}
            </select>
            <label for="input_price">Precio:</label>
            <input type="number" name="input_price">
            <textarea name="input_description" id="input_description" cols="30" rows="10" placeholder="ingrese la descripcion del producto"></textarea>
            <input type="file" name="input_name" id="imageToUpload">
            <button type="submit">Modificar</button>
        </form>

    {/if}
</article>



{include file="comentaries.tpl"}




{include file="footer.tpl"}
