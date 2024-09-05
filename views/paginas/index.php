<?php 
    include_once __DIR__ . '/sitios.php';
?>

<section class="empresas">
    <h2 class="empresas__heading">Empresas</h2>
    <p class="empresas__descripcion">Conoce a las empresas que nos acompañan</p>

    <div class="empresas__grid">
        <?php foreach($empresas as $empresa) { ?>
            <div <?php aos_animacion(); ?> class="empresa">
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
                        <?php echo $empresa->ciudad ?>
                    </p>
                </div>
            </div>
        <?php } ?>
    </div>

</section>

<section class="resumen">
    <div class="resumen__grid">
        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $empresas_total; ?></p>
            <p class="resumen__texto">Agencias de turismo</p>
        </div>

        <div <?php aos_animacion(); ?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $sitios_total; ?></p>
            <p class="resumen__texto">Sitios Turisticos</p>
        </div>
    </div>
</section>


<div id="mapa" class="mapa"></div>
