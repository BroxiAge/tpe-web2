{include file="header.tpl"}



        <ul>
            {foreach from=$categories item=categorie}
                <li><a href="{BASE_URL}categories/{$categorie->name}">{$categorie->name}</a></li>
            {/foreach}
        </ul>

{if $user->rol eq 1}
    {include file="editCategories.tpl"}
{/if}
{include file="footer.tpl"}

