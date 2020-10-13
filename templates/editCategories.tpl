<section id="contenedor-form-agregar-productos">
    <form action="addCategorie" method ="POST">
        <label for="input_categorie">Ingrese nueva categoría:</label>
        <input type="text" name="input_categorie">
        <button type="submit">Agregar</button>
    </form>
    <form action="deleteCategorie" method ="POST">
        <label for="input_categorie">Ingrese nombre categoría a eliminar:</label>
        <input type="text" name="input_categorie">
        <button type="submit">Eliminar</button>
    </form>
    <form action="modifyCategorie" method ="POST">
        <label for="input_categorie">Ingrese categoria a editar:</label>
        <input type="text" name="input_categorie">
        <input type="text" name="input_new_name">
        <button type="submit">Modificar</button>
    </form>
</section>

