<!-- <div class="evento swiper-slide">
    <p class="evento__hora"><?php echo $evento->hora->hora; ?>
                        
    <div class="evento__informacion">
    +<h4 class="evento__nombre"><?php echo $evento->nombre; ?></h4>
                        
    <p class="evento__introduccion"><?php echo $evento->descripcion; ?></p>               
            
    <div class="evento__autor-info">
            <picture>
                <source srcset="/img/speakers/<?php echo $evento->ponente->imagen; ?>.webp" type="image/webp">
                <source srcset="/img/speakers/<?php echo $evento->ponente->imagen; ?>.png" type="image/png">
                <img class="evento__imagen-autor" loading="lazy" width="200" height="300" src="/img/speakers/<?php 
                    echo $evento->ponente->imagen; ?>.png" alt="Imagen evento">
            </picture>

            <p class="evento__autor-nombre">
                <?php echo $evento->ponente->nombre ." ".$evento->ponente->apellido; ?>
            </p>
        </div>
    </div>
</div> -->

<div class="evento swiper-slide">                        
    <div class="evento__informacion">
    <h4 class="evento__nombre"><?php echo $sitio->nombre; ?></h4>
                        
    <p class="evento__introduccion"><?php echo $sitio->descripcion; ?></p>               
            
    <div class="evento__autor-info">

            <p class="evento__autor-nombre">
                <?php echo $sitio->sitio->nombre ." ".$sitio->sitio->apellido; ?>
            </p>
        </div>
    </div>
</div>