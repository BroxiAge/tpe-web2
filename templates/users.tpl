
{include file="header.tpl"}

<link rel="stylesheet" type="text/css" href="../css/estilo.css">


<ul>
    {foreach from=$users item=user}
         <li>{$user->name}{if $user->rol eq 0}Acceso restringido{/if}{if $user->rol eq 1}Administrador{/if}</li>
    {/foreach}
</ul>

</form>
<h2> Editar rol. (0 Usuario Normal / 1 Usuario ADMIN.) </h2>
<form action="modifyRol" method="POST">
    <label for="input_modify_user">Usuario a modificar</label>
    <input type="text" name ="input_modify_user">

    <label for="input_modify_rol">Rol a asignar</label>
    <input type="number" MIN="0" MAX="1" name="input_modify_rol">

    

    <button type="submit">Modificar Rol</button>

</form>

{include file="footer.tpl"}

