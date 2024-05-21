<main class="auth">
    <h2 class="auth__heading">
        <?php echo $titulo ?>
    </h2>

    <p class="auth_texto">Inicia Sesion en Visit Cañete</p>

    <?php
        require_once __DIR__ .'/../templates/alertas.php';
    ?>

    

    <form method="POST" action="/login" form="formulario">
        <div class="formulario__campo">
            <label for="email"class="formulario__label">Email</label>
            <input
                type="email"
                class="formulario__input"
                placeholder="Tu Email"
                id="email"
                name="email"
            >
        </div>
        <div class="formulario__campo">
            <label for="password" class="formulario__label">Contraseña</label>
            <input
                type="password"
                class="formulario__input"
                placeholder="Tu contraseña"
                id="password"
                name="password"
            >
        </div>

        <input type = "submit" class="formulario__submit" value="Iniciar sesion">

    </form>

    <div class="acciones">
            <a href="/registro" class="acciones__enlace">¿Sin cuenta? ¡Crea una!</a> 
            <a href="/olvide" class="acciones__enlace">¿Olvidó su contraseña?</a> 
    </div>
    

</main>