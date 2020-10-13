{include file="header.tpl"}

<link rel="stylesheet" type="text/css" href="../css/estilo.css">

{$spare->name}
{$spare->vehicle}

                        {if $spare->id_categorie eq 1}
                            Chasis
                        {/if}
                        {if $spare->id_categorie eq 2}
                            Motor
                        {/if}
                        {if $spare->id_categorie eq 3}
                            Accesorios
                        {/if}
                        {if $spare->id_categorie eq 4}
                            Tren delantero
                        {/if}

{$spare->price}
{$spare->description}
<a href="../productos">atras</a>


{include file="footer.tpl"}