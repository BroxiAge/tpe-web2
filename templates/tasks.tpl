{include file="header.tpl"}
<div class="container">

          <ul class="list-group">

              {foreach from=$tareas_s item=tarea}
                {if $tarea->completed eq 1}
                    <li class="list-group-item list-group-item-success">{$tarea->title|upper}<span class="badge badge-primary badge-pill">{$tarea->description}</span> <button type="button" class="btn btn-outline-danger"><a href="delete/{$tarea->id}">Borrar</a></button></li>
                {else}
                    <li class="list-group-item ">{$tarea->title}<span class="badge badge-primary badge-pill">{$tarea->description}</span> <button type="button" class="btn btn-outline-danger"><a href="delete/{$tarea->id}">Borrar</a></button><button type="button" class="btn btn-outline-success"><a href="completar/{$tarea->id}">Completar</a></button></li>    
                {/if}
              {/foreach}
          
          </ul>
          </div>

{include file="createTask.tpl"}      

{include file="footer.tpl"}