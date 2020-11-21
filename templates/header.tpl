<!doctype html>
        <html lang="en">
            <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <link rel="stylesheet" type="text/css" href="./css/estilo.css">

            <title>{$title}</title>
            <script type="text/javascript" src="js/interaccion.js"></script>
            </head>
            <body>
                <nav id = "nav">
                    <article class = "ingreso">
                        <a href="{if $user->rol eq 2}{LOGIN}{/if}{if ($user->rol eq 0) OR ($user->rol eq 1)}{LOGOUT}{/if}"> {if $user->rol eq 2}login{/if}{if ($user->rol eq 0) OR ($user->rol eq 1)}logout{/if}</a>
                    </article>
                    <article>
                        <img class ="logo" src="images/logo.png" alt="">
                    </article>
                    <ul class = "navigation">
                        <li>
                        <button value="1" id="boton-menu"type="button" name="button"><img src="images/menu.png" alt=""></button>
                        <li><a class="link-nav" href="{BASE_URL}home">Home</a></li>
                        <li><a class="link-nav" href="{BASE_URL}spares">Producto</a></li>
                        <li><a class="link-nav" href="{BASE_URL}categories">Categorias</a></li>
                        <li><a class="link-nav" href="{BASE_URL}contacto">Contacto</a></li>
                        {if $user->rol eq 1}<li><a class="link-nav" href="{BASE_URL}users">Usuarios</a></li>{/if}
                        

                        </li>
                    </ul>
                </nav>