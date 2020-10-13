<section id="contenedor-form-agregar-productos">
    <form action="edit" method ="POST">
    <span>Agregar o modificar repuesto</span>
    <label for="input_name">Pieza:</label>
    <input type="text" name="input_name">
    <label for="input_vehicle">Vehiculo:</label>
    <input type="text" name="input_vehicle">
    <select name="select_categorie" id="select_categorie">
        <option value=1>Chasis</option> 
        <option value=2>Motor</option> 
        <option value=3>Accesorios</option> 
        <option value=4>Tren delantero</option> 
    </select>
    <label for="input_price">Precio:</label>
    <input type="number" name="input_price">
    <textarea name="input_description" id="input_description" cols="30" rows="10">ingrese la descripcion del producto</textarea>
    <button type="submit">Agregar</button>
    </form>
</section>
