<header class="header">
    <div class="header__contenedor">
        <nav class="header__navegacion">
            <a href="/" class="header__enlace">Inicio</a>
            <a href="/sitios" class="header__enlace" <?php echo pagina_actual('/sitios') ? 'navegacion__enlace--actual' : ''; ?>">Sitios</a>
            <a href="/empresas" class="header__enlace" <?php echo pagina_actual('/paquetes') ? 'navegacion__enlace--actual' : ''; ?>">Experiencias</a>
            <a href="/recomendacion" class="header__enlace" <?php echo pagina_actual('/recomendacion') ? 'navegacion__enlace--actual' : ''; ?>">Recomendacion</a>
            <!-- <a href="/registro" class="header__enlace" <?php echo pagina_actual('/registro') ? 'navegacion__enlace--actual' : ''; ?>">Gastronomía</a> -->
                <?php if(is_auth()){ ?>
                    <a href="<?php echo is_admin() ? '/admin/dashboard' : '/finalizar-registro'; ?>" class="header__enlace">Cuenta</a>
                    <form method="POST" action="/logout" class="header__form">
                        <input type="submit" value="Cerrar Sesion" class="header__submit">
                    </form>
                <?php } else { ?> 
                    <a href="/registro" class="header__enlace">Registro</a>
                    <a href="/login" class="header__enlace">Iniciar Sesion</a>
                <?php } ?>
        </nav>  
        <div cñass="header__contenido">
            <a href="/">
                <h1 class="header__logo">
                    VisitCañete
                </h1>
            </a>
            <p class="header__texto">Un tesoro por descubrir. Déjate cautivar por sus encantos naturales y su rica cultura.</p>
        </div>
    </div>
</header>


