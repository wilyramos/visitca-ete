<main class="devwebcamp contenedor seccion">
    <div class="devwebcamp__grid">

        <div class="container__recomendacion">
            <div class="formulario__recomendacion">
                <h2>Recomendación Personalizada</h2>
                <form id="filtroForm" action="#" method="post">
                    <div class="campo">
                        <label for="edad" class="label">Edad:</label>
                        <input type="number" id="edad" name="edad" class="input" min="1" max="120">
                    </div>
                    <div class="campo">
                        <label for="clima" class="label">Clima Preferido:</label>
                        <select id="clima" name="clima" class="select">
                            <option value="calido">Cálido</option>
                            <option value="templado">Templado</option>
                            <option value="frio">Frío</option>
                        </select>
                    </div>
                    <div class="campo">
                        <label for="actividad" class="label">Actividad Preferida:</label>
                        <select id="actividad" name="actividad" class="select">
                            <option value="aventura">Aventura</option>
                            <option value="cultura">museo</option>
                            <option value="relax">Relax</option>

                        </select>
                    </div>

                    <div class="campo">
                        <label for="sitio" class="label">Sitio Preferido:</label>
                        <select id="sitio" name="sitio" class="select">
                            <?php foreach($sitios as $sitio) { ?>
                                <option value="<?php echo $sitio->id; ?>"><?php echo $sitio->nombre; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="campo">
                        <label for="empresa" class="label">Empresa Preferida:</label>
                        <select id="empresa" name="empresa" class="select">
                            <?php foreach($empresas as $empresa) { ?>
                                <option value="<?php echo $empresa->id; ?>"><?php echo $empresa->nombre; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="campo">
                        <input type="button" value="Obtener Recomendación" class="boton" onclick="filtrar()">
                    </div>
                </form>
            </div>
        </div>

        <div id="recomendacion" class="devwebcamp__contenido">
            <h3 class="devwebcamp__subheading">Recomendación</h3>
            <div id="resultado" class="devwebcamp__texto"></div>

            <div class="swiper">
                <div class="swiper-wrapper" id="sitiosRecomendados">
                    <?php foreach($sitios as $sitio) { ?>
                        <div class="evento swiper-slide">                        
                            <div class="evento__informacion">
                                <h4 class="evento__nombre"><?php echo $sitio->nombre; ?></h4>
                                
                                <p class="evento__introduccion"><?php echo $sitio->descripcion; ?></p>               
                                
                                <picture>
                                    <source srcset="/img/sitios/<?php echo $sitio->imagen; ?>.webp" type="image/webp">
                                    <source srcset="/img/sitios/<?php echo $sitio->imagen; ?>.png" type="image/png">
                                    <img class="evento__imagen-autor" loading="lazy" width="200" height="300" src="/img/sitios/<?php 
                                        echo $sitio->imagen; ?>.png" alt="Imagen evento">
                                </picture>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function filtrar() {
        var clima = document.getElementById("clima").value;
        var actividad = document.getElementById("actividad").value;
        var sitiosRecomendados = document.getElementById("sitiosRecomendados");

        // Filtrar los sitios según el clima y la actividad seleccionada
        <?php
        foreach($sitios as $sitio) {
            ?>
            var sitio_<?php echo $sitio->id; ?>_clima = "<?php echo $sitio->clima; ?>";
            var sitio_<?php echo $sitio->id; ?>_actividad = "<?php echo $sitio->actividad; ?>";

            if (sitio_<?php echo $sitio->id; ?>_clima === clima && sitio_<?php echo $sitio->id; ?>_actividad === actividad) {
                document.getElementById("sitio_<?php echo $sitio->id; ?>").style.display = "block";
            }
            <?php
        }
        ?>
    }
</script>
