{include file="header.tpl"}

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
                <td>{$repuesto->nombre}</td>
                <td>{$repuesto->vehiculo}</td> 
                <td>
                    {if $repuesto->id_categoria eq 1}
                        Chasis
                    {/if}
                    {if $repuesto->id_categoria eq 2}
                        Motor
                    {/if}
                    {if $repuesto->id_categoria eq 3}
                        Accesorios
                    {/if}
                    {if $repuesto->id_categoria eq 4}
                        Tren delantero
                    {/if}
                </td> 
                <td>{$repuesto->precio}</td>   
           </tr>
   
        {/foreach}
    </tbody>

</table>

{include file="footer.tpl"}

