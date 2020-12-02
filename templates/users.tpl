
{include file="header.tpl"}

<link rel="stylesheet" type="text/css" href="../css/estilo.css">


<article id= "users-container">
    <h2>Usuarios registrados</h2>
    <ul>
    {foreach from=$users item=u}
        {if $user->id_user != $u->id_user}
            <li>
                {if  $u->rol eq 0 ||  $u->rol eq 1 }{$u->name}{/if}
                {if $u->rol eq 0}<a  href="{BASE_URL}modifyRol/{$u->id_user}" >Hacer admin</a>{/if}
                {if $u->rol eq 1}<a  href="{BASE_URL}modifyRol/{$u->id_user}" >Quitar admin</a>{/if}
                {if  $u->rol eq 0 ||  $u->rol eq 1 }<a href= "{BASE_URL}deleteUser/{$u->id_user}">Eliminar usuario</a>{/if}
            </li>
        {/if}
    {/foreach}
    </ul>
</article>

{include file="footer.tpl"}

