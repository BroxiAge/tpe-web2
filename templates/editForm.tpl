<section class="contenedor-edit-spares">
    <section id="contenedor-form-agregar-productos">
        <form action="edit" method ="POST">
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
        <textarea name="input_description" id="input_description" cols="30" rows="10">ingrese la descripcion del producto</textarea>
        <button type="submit">Agregar</button>
        </form>
    </section>
    <section id="contenedor-form-agregar-productos">
    <form action="delete" method ="POST">
        <span>Eliminar repuesto</span>
        <label for="input_name">Pieza:</label>
        <input type="text" name="input_name">
        <label for="input_vehicle">Vehiculo:</label>
        <input type="text" name="input_vehicle">
        <button type="submit">Borrar</button>
    </form>
    </section>
</section>
