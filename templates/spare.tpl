{include file="header.tpl"}

<link rel="stylesheet" type="text/css" href="../css/estilo.css">



<h2>{$spare->name} {$spare->vehicle}</h2>
    <h3>{foreach from=$categories item=categorie}
        {if $spare->id_categorie eq $categorie->id_categorie}
            {$categorie->name}
        {/if}          
         {/foreach}
    </h3>     
    
                       
<span>Precio:${$spare->price}</span>
<p>descripcion:{$spare->description}</p>
<a href="../spares">atras</a>

{include file="comentaries.tpl"}




{include file="footer.tpl"}