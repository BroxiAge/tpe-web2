{include file="header.tpl"}

<article id="spares-container">
    <section id="contenedor-tabla-productos">
        <h2>Nuestro catalogo de productos</h2>
        <table>
            <thead>
                <tr>
                    <td>Pieza</td>
                    <td>Vehiculo</td>
                    <td>Categoria</td>
                    <td>Precio</td>
                </tr>
            </thead>
            <tbody>
                {foreach from=$repuestos item=repuesto}
                        
                <tr>
                        <td><a href="{BASE_URL}producto/{$repuesto->id}">{$repuesto->name}</a></td>
                        <td>{$repuesto->vehicle}</td> 
                        <td>
                            {foreach from=$categorias item=categoria}
                                {if $categoria->id_categorie eq $repuesto->id_categorie}
                                    {$categoria->name}
                                {/if}
                            {/foreach}
                        </td> 
                        <td>{$repuesto->price}</td> 
                        {if $user->rol eq 1}<td><a href="{BASE_URL}delete/{$repuesto->id}">Eliminar repuesto</a></td>{/if} 
                </tr>
        
                {/foreach}
            </tbody>

        </table>
        
    

    </section>
    
    {if $user->rol eq 1}
        <form action="edit" method ="POST" enctype="multipart/form-data">
            <span>Agregar o modificar repuesto</span>
            <label for="input_name">Pieza:</label>
            <input type="text" name="input_name">
            <label for="input_vehicle">Vehiculo:</label>
            <input type="text" name="input_vehicle">
            <select name="select_categorie" id="select_categorie">
                {foreach from=$categorias item=categoria}
                    <option value={$categoria->id_categorie}>{$categoria->name}</option>              
                {/foreach}
            </select>
            <label for="input_price">Precio:</label>
            <input type="number" name="input_price">
            <textarea name="input_description" id="input_description" cols="30" rows="10" placeholder="ingrese la descripcion del producto"></textarea>
            <input type="file" name="input_name" id="imageToUpload">
            <button type="submit">Agregar</button>
        </form>
    {/if}
   

</article>


{include file="footer.tpl"}

