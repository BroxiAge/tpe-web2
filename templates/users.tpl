
{include file="header.tpl"}

<link rel="stylesheet" type="text/css" href="../css/estilo.css">


<ul>
    {foreach from=$users item=user}
         <li>
            {if  $user->rol eq 0 ||  $user->rol eq 1 }{$user->name}{/if}
            {if $user->rol eq 0}<a  href="{BASE_URL}modifyRol/{$user->id_user}" >Hacer admin</a>{/if}
            {if $user->rol eq 1}<a  href="{BASE_URL}modifyRol/{$user->id_user}" >Quitar admin</a>{/if}
            {if  $user->rol eq 0 ||  $user->rol eq 1 }<a href= "{BASE_URL}deleteUser/{$user->id_user}">Eliminar usuario</a>{/if}
        </li>
    {/foreach}
</ul>

{include file="footer.tpl"}

