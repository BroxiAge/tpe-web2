{include file="header.tpl"}

<section id="contenedor-tabla-productos">
    <table>
        <thead>
            <tr>
                <td>Pieza</td>
                <td>Vehiculo</td>
                <td>Precio</td>
            </tr>
        </thead>
        <tbody>
            {foreach from=$repuestos item=repuesto}
                    
            <tr>
                    <td><a href="{BASE_URL}producto/{$repuesto->id}">{$repuesto->name}</a></td>
                    <td>{$repuesto->vehicle}</td> 
                    <td>{$repuesto->price}</td>   
            </tr>
    
            {/foreach}
        </tbody>

    </table>
</section>

{include file="footer.tpl"}

