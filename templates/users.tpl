
{include file="header.tpl"}

<link rel="stylesheet" type="text/css" href="../css/estilo.css">

<input type="text" name="input_vehicle">
        <button type="submit">Borrar</button>

<ul>
    {foreach from=$users item=user}
         <li>{$user->name}{if $user->rol eq 0}Acceso restringido{/if}{if $user->rol eq 1}Administrador{/if}</li>
    {/foreach}
</ul>


{include file="footer.tpl"}

