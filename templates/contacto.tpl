{include file="header.tpl"}

<article class="form-container">
    <h2>Contacto</h2>
    <span>Haga sus consultas aqui, en breve le responderemos</span>
    <form class="formulario-contacto">
      <section class="div-form">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" value=""/>
      </section>
      <section class="div-form">
        <label for="e-mail">E-mail:</label>
        <input type="text" name="e-mail" value=""/>
      </section>
      <section class="div-form">
        <textarea name="comentario" rows="5" cols="50" placeholder="ingrese aqui su consulta"></textarea>
      </section>
      <span>Introduzcar el siguiente valor:</span>
      <span id="valor-captcha" class="valor-captcha"></span>
      <section class="div-form">
        <input type="text" id="captcha" value="">
        <button class="button boton-verificar" type="submit" id="boton-verificar-captcha">COMPROBAR</button>
      </section>
      <span id="comprobacion-captcha"></span>
    </form>
 </article>

 {include file="footer.tpl"}