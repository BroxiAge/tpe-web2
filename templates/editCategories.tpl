<article class="form-edit-container">
    <form action="addCategorie" method ="POST" >
        <section class="div-form">
            <label for="input_categorie">Ingrese nueva categoría:</label>
            <input type="text" name="input_categorie">
            <button type="submit">Agregar</button>
        </section>
    </form>
    <form action="deleteCategorie" method ="POST" >
        <section class="div-form">
            <label for="input_categorie">Ingrese nombre categoría a eliminar:</label>
            <input type="text" name="input_categorie">
            <button type="submit">Eliminar</button>
        </section>
    </form>
    <form action="modifyCategorie" method ="POST" >
        <section class="div-form">
            <label for="input_categorie">Ingrese categoria a editar:</label>
            <input type="text" name="input_categorie">
            <label for="input_new_name">Ingrese nuevo nombre de categoria:</label>
            <input type="text" name="input_new_name">
            <button type="submit">Modificar</button>
        </section>
    </form>
</article>

