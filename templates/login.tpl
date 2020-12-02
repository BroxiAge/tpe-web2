<link rel="stylesheet" type="text/css" href="./css/login.css">
{$message}
<article id="login-container">
    <section>
        <h2> Logearse </h2>
        <form action="verifyUser" method="POST">
            <label for="user">Usuario</label>
            <input type="text" name ="input_user">

            <label for="pass">Password</label>
            <input type="password" name="input_pass">

            <button type="submit">Ingresar</button>

        </form>
        {$message}
    </section>
    <section>
        <h2> Registrarse </h2>
        <form action="registerUser" method="POST">
            <label for="user">Usuario</label>
            <input type="text" name ="input_register_user">

            <label for="pass">Password</label>
            <input type="password" name="input_register_pass">

            

            <button type="submit">Crear Nuevo Usuario</button>

        </form>
    </section>
</article>



