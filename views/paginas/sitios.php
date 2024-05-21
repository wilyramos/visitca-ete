<main class="agenda">
    <h2 class="agenda__heading">Sitios turisticos</h2>
    <p class="agenda__description">Conoce los mejores sitios turisticos de la región. Descubre lugares increíbles, gastronomía y tradiciones.</p>

    <form class="agenda__form">
        <input type="text" class="agenda__input" placeholder="Buscar sitio turistico">
        <button class="agenda__button">Buscar</button>
    </form>

    <div class="sitios__grid">
        <?php foreach($sitios as $sitio) { ?>
            <div <?php aos_animacion(); ?> class="si">
                <picture>
                    <source srcset="/img/sitios/<?php echo $sitio->imagen; ?>.webp" type="image/webp">
                    <source srcset="/img/sitios/<?php echo $sitio->imagen; ?>.png" type="image/png">
                    <img class="sitio__imagen" loading="lazy" width="200" height="200" src="/img/sitios/<?php 
                        echo $sitio->imagen; ?>.png" alt="Imagen sitio">
                </picture>

                <div class="sitio__informacion">
                    <h4 class="sitio__nombre">
                        <?php echo $sitio->nombre; ?>
                    </h4>
                    <p class="sitio__ubicacion">
                        <?php echo $sitio->ubicacion; ?>
                    </p>

                    <p class="sitio__descripcion">
                        <?php echo $sitio->descripcion; ?>
                    </p>
                </div>
            </div>
        <?php } ?>
    </div>
</main>


<!-- <div class="sitios__grid">
        <?php foreach($empresas as $empresa) { ?>
            <div <?php aos_animacion(); ?> class="si">
                <picture>
                    <source srcset="/img/empresas/<?php echo $empresa->imagen; ?>.webp" type="image/webp">
                    <source srcset="/img/empresas/<?php echo $empresa->imagen; ?>.png" type="image/png">
                    <img class="empresa__imagen" loading="lazy" width="200" height="200" src="/img/empresas/<?php 
                        echo $empresa->imagen; ?>.png" alt="Imagen empresa">
                </picture>

                <div class="empresa__informacion">
                    <h4 class="empresa__nombre">
                        <?php echo $empresa->nombre; ?>
                    </h4>
                    <p class="empresa__ubicacion">
                        <?php echo $empresa->ciudad .", ".$empresa->pais; ?>
                    </p>
                </div>
            </div>
        <?php } ?>
    </div> -->