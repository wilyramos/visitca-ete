<?php 
$empresaAleatoria = $empresas[array_rand($empresas)];
?>

<main class="recomendacion contenedor seccion">
    <div class="recomendacion__grid">
        <div class="container">
            <h2>Recomendación Personalizada</h2>
            <form id="filtroForm" action="#" method="post">
                <div class="usuario">
                    <p class="usuario__nombre">Nombre completo: <?php echo htmlspecialchars($usuario_nuevo->nombre . ' ' . $usuario_nuevo->apellido); ?></p>
                    <p class="usuario__email">Email: <?php echo htmlspecialchars($usuario_nuevo->email); ?></p>
                </div>

                <div class="formulario__campo">
                    <label for="actividad" class="formulario__label">Actividad Preferida:</label>
                    <select id="actividad" name="actividad" class="formulario__select">
                        <option value="1">Visita a museo</option>
                        <option value="2">Visita a parque</option>
                        <option value="3">Visita a playa</option>
                        <option value="4">Caminata</option>
                        <option value="1" selected><?php echo ($usuario_nuevo->preferencias->actividad_id === 1 ? 'Museo' : 
                                 ($usuario_nuevo->preferencias->actividad_id === 2 ? 'Parque' : 
                                 ($usuario_nuevo->preferencias->actividad_id === 3 ? 'Playa' : 'Senderismo'))); ?></option>
                    </select>
                </div>

                <div class="formulario__campo">
                    <label for="edad" class="formulario__label">Edad:</label>
                    <input type="number" id="edad" name="edad" class="formulario__input" value="<?php echo htmlspecialchars($usuario_nuevo->preferencias->edad); ?>">
                </div>

                <div class="formulario__campo">
                    <label for="genero" class="formulario__label">Género:</label>
                    <select id="genero" name="genero" class="formulario__select">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        <option value="" selected><?php echo ($usuario_nuevo->preferencias->genero == 'M' ? 'Masculino' : 'Femenino'); ?></option>
                    </select>
                </div>

                <div class="formulario__campo">
                    <label for="clima" class="formulario__label">Clima preferido:</label>
                    <select id="clima" name="clima" class="formulario__select">
                        <option value="calido">Cálido</option>
                        <option value="templado">Templado</option>
                        <option value="frio">Frío</option>
                        <option value="" selected><?php echo ($usuario_nuevo->preferencias->clima ===1 ? 'Soleado' : 
                                ($usuario_nuevo->preferencias->clima === 2 ? 'Lluvioso' : 'Nublado'));
                        ?></option>


                    </select>
                </div>

                <div class="formulario__campo">
                    <label for="momento_dia" class="formulario__label">Momento del día:</label>
                    <select id="momento_dia" name="momento_dia" class="formulario__select">
                        <option value="mañana">Mañana</option>
                        <option value="tarde">Tarde</option>
                        <option value="noche">Noche</option>
                        <option value="" selected><?php 
                            echo ($usuario_nuevo->preferencias->momento_dia == 1 ? 'Mañana' : 
                                 ($usuario_nuevo->preferencias->momento_dia == 2 ? 'Tarde' : 'Noche')); 
                        ?></option>
                    </select>
                </div>

                <div class="formulario__campo">
                    <label for="estacion" class="formulario__label">Estación del año:</label>
                    <select id="estacion" name="estacion" class="formulario__select">
                        <option value="verano">Verano</option>
                        <option value="primavera">Primavera</option>
                        <option value="otoño">Otoño</option>
                        <option value="invierno">Invierno</option>
                        <option value="" selected><?php 
                            echo ($usuario_nuevo->preferencias->estacion == 1 ? 'Primavera' : 
                                 ($usuario_nuevo->preferencias->estacion == 2 ? 'Verano' : 
                                 ($usuario_nuevo->preferencias->estacion == 3 ? 'Otoño' : 'Invierno'))); 
                        ?></option>
                    </select>
                </div>

                <div class="formulario__campo">
                    <input type="button" value="Obtener Recomendación" class="formulario__submit" onclick="filtrar()">
                </div>
            </form>
        </div>

        <div class="resultados">
            <h3 class="recomendacion__subheading">Sitios Recomendados</h3>
            <div id="resultadosSitios" class="recomendacion__texto"></div>
            <div class="swiper">
                <div class="swiper-wrapper" id="sitiosRecomendados">
                    <?php foreach($sitios as $sitio) { ?>
                        <div class="sitio swiper-slide">
                            <div class="sitio__informacion">
                                <h4 class="sitio__nombre"><?php echo htmlspecialchars($sitio->nombre); ?></h4>
                                <!-- <p class="sitio__introduccion"><?php echo htmlspecialchars($sitio->descripcion); ?></p> -->
                                <picture>
                                    <source srcset="/img/sitios/<?php echo htmlspecialchars($sitio->imagen); ?>.webp" type="image/webp">
                                    <source srcset="/img/sitios/<?php echo htmlspecialchars($sitio->imagen); ?>.png" type="image/png">
                                    <img class="sitio__imagen-autor" loading="lazy" width="200" height="300" src="/img/sitios/<?php echo htmlspecialchars($sitio->imagen); ?>.png" alt="Imagen sitio">
                                </picture>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="resultados">
            <h3 class="recomendacion__subheading">Empresas Recomendadas</h3>
            <div>
                <h4 class="sitio__nombre"><?php echo htmlspecialchars($empresaAleatoria->nombre); ?></h4>
                <p class="sitio__introduccion"><?php echo htmlspecialchars($empresaAleatoria->descripcion); ?></p>
                <picture>
                    <source srcset="/img/empresas/<?php echo htmlspecialchars($empresaAleatoria->imagen); ?>.webp" type="image/webp">
                    <source srcset="/img/empresas/<?php echo htmlspecialchars($empresaAleatoria->imagen); ?>.png" type="image/png">
                    <img class="sitio__imagen-autor" loading="lazy" width="200" height="300" src="/img/empresas/<?php echo htmlspecialchars($empresaAleatoria->imagen); ?>.png" alt="Imagen empresa">
                </picture>
                <p>Con base en tus preferencias, te recomendamos visitar la empresa <strong><?php echo htmlspecialchars($empresaAleatoria->nombre); ?></strong>.</p>
            </div>
        </div>

        
    </div>

    <section class=section-similares>
        <h3 class="usuarios similares">Usuario: </h3>
        <div class="usuarios__grid">
            <?php foreach($recomendaciones as $usuario => $recomendacion) { ?>
                <div class="usuario">
                    <p class="usuario__nombre">Nombre: <?php echo ($usuario); ?></p>
                    <p class="usuario__similitud">Similitud: <?php echo ($recomendacion['similitud']); ?></p>

                    <div class="preferencias">
                        <p class="preferencias__titulo">Preferencias:</p>
                        <p class="preferencias__actividad">Actividad: <?php 
                            $actividad_id = $recomendacion['usuario']->preferencias->actividad_id;
                            $actividades = array(
                                1 => "Museo",
                                2 => "Parque",
                                3 => "Playa",
                                4 => "Senderismo",
                                // Agrega más asociaciones según sea necesario
                            );

                            if (array_key_exists($actividad_id, $actividades)) {
                                echo $actividades[$actividad_id];
                            } else {
                                echo "Desconocido"; // O cualquier otro mensaje de error o manejo de caso no válido.
                            }
                        ?></p>


                        <p class="preferencias__edad">Edad: <?php echo ($recomendacion['usuario']->preferencias->edad); ?></p>
                        <p class="preferencias__genero">Género: <?php echo ($recomendacion['usuario']->preferencias->genero == 1) ? "Masculino" : "Femenino"; ?></p>
                        <p class="preferencias__clima">Clima: <?php 
                            $clima = $recomendacion['usuario']->preferencias->clima;
                            if ($clima == 1) {
                                echo "Cálido";
                            } elseif ($clima == 2) {
                                echo "Templado";
                            } elseif ($clima == 3) {
                                echo "Frío";
                            } else {
                                echo "Desconocido"; // O cualquier otro mensaje de error o manejo de caso no válido.
                            }
                        ?></p>
                        <p class="preferencias__momento_dia">Momento del día: <?php 
                            $momento_dia = $recomendacion['usuario']->preferencias->momento_dia;
                            if ($momento_dia == 1) {
                                echo "Mañana";
                            } elseif ($momento_dia == 2) {
                                echo "Tarde";
                            } elseif ($momento_dia == 3) {
                                echo "Noche";
                            } else {
                                echo "Desconocido"; // O cualquier otro mensaje de error o manejo de caso no válido.
                            }
                        ?></p>

                        <p class="preferencias__estacion">Estación del año: <?php 
                            $estacion = $recomendacion['usuario']->preferencias->estacion;
                            if ($estacion == 1) {
                                echo "Primavera";
                            } elseif ($estacion == 2) {
                                echo "Verano";
                            } elseif ($estacion == 3) {
                                echo "Otoño";
                            } elseif ($estacion == 4) {
                                echo "Invierno";
                            } else {
                                echo "Desconocido"; // O cualquier otro mensaje de error o manejo de caso no válido.
                            }
                        ?></p>                      
                    </div>
                </div>                
            <?php } ?>
        </div>   
    </section>
</main>
