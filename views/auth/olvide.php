<main class="auth">
    <h2 class="auth__heading">
        <?php echo $titulo ?>
    </h2>

    <p class="auth_texto">Recupera tu acceso a VisitCañete</p>

    <?php
        require_once __DIR__ . '/../templates/alertas.php';
    ?>
    <form method="POST" action="/olvide" class="formulario">
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
        <input type = "submit" class="formulario__submit" value="Enviar instrucciones">

    </form>

    <div class="acciones">             
            <a href="/login" class="acciones__enlace">¿Ya tienes una cuenta? Iniciar Sesión</a>
            <a href="/registro" class="acciones__enlace">¿Sin cuenta? ¡Crea una!</a> 
    </div>
    

</main>

