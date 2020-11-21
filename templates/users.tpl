{include file="header.tpl"}

<link rel="stylesheet" type="text/css" href="../css/estilo.css">

<table>
        <thead>
            <tr>
                <td>Pieza</td>
                <td>Vehiculo</td>
                <td>Categoria</td>
                <td>Precio</td>
            </tr>
        </thead>
        <tbody>
            {foreach from=$repuestos item=repuesto}
                    
            <tr>
                    <td><a href="{BASE_URL}producto/{$repuesto->id}">{$repuesto->name}</a></td>
                    <td>{$repuesto->vehicle}</td> 
                    <td>
                        {foreach from=$categorias item=categoria}
                             {if $categoria->id_categorie eq $repuesto->id_categorie}
                                {$categoria->name}
                            {/if}
                        {/foreach}
                    </td> 
                    <td>{$repuesto->price}</td>   
            </tr>
    
            {/foreach}
        </tbody>

    </table>


{include file="footer.tpl"}