<?php 
    $empresaAleatoria = $empresas[array_rand($empresas)];
?>

<main class="recomendacion contenedor seccion">
    <div class="recomendacion__grid">
        <div class="container">
            <div class="">
                <h2>Recomendación Personalizada</h2>
                <form id="filtroForm" action="#" method="post">
                    <div class="usuario">
                        <p class="usuario__nombre">Nombre completo: <?php echo htmlspecialchars($usuario_nuevo->nombre . ' ' . $usuario_nuevo->apellido); ?></p>
                        <p class="usuario__email">Email: <?php echo htmlspecialchars($usuario_nuevo->email); ?></p>
                    </div>

                    <div class="formulario__campo">
                        <label for="actividad" class="formulario__label">Actividad Preferida:</label>
                        <select id="actividad" name="actividad" class="formulario__select">
                            <option value="1">Excursión en bicicleta</option>
                            <option value="2">Visita a museo</option>
                            <option value="3">Caminata en el bosque</option>
                            <option value="<?php echo htmlspecialchars($preferencia_nueva->actividad_id); ?>" selected><?php echo htmlspecialchars($actividades[$preferencia_nueva->actividad_id - 1]->nombre); ?></option>
                        </select>
                    </div>

                    <div class="formulario__campo">
                        <label for="edad" class="formulario__label">Edad:</label>
                        <input type="number" id="edad" name="edad" class="formulario__input" value="<?php echo htmlspecialchars($preferencia_nueva->edad); ?>">
                    </div>

                    <div class="formulario__campo">
                        <label for="genero" class="formulario__label">Género:</label>
                        <select id="genero" name="genero" class="formulario__select">
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                            <option value="<?php echo htmlspecialchars($preferencia_nueva->genero); ?>" selected><?php echo htmlspecialchars($preferencia_nueva->genero == 'M' ? 'Masculino' : 'Femenino'); ?></option>
                        </select>
                    </div>

                    <div class="formulario__campo">
                        <label for="clima" class="formulario__label">Clima preferido:</label>
                        <select id="clima" name="clima" class="formulario__select">
                            <option value="calido">Cálido</option>
                            <option value="templado">Templado</option>
                            <option value="frio">Frío</option>
                            <option value="<?php echo htmlspecialchars($preferencia_nueva->clima); ?>" selected><?php echo ucfirst(htmlspecialchars($preferencia_nueva->clima)); ?></option>
                        </select>
                    </div>

                    <div class="formulario__campo">
                        <label for="momento_dia" class="formulario__label">Momento del día:</label>
                        <select id="momento_dia" name="momento_dia" class="formulario__select">
                            <option value="mañana">Mañana</option>
                            <option value="tarde">Tarde</option>
                            <option value="noche">Noche</option>
                            <option value="<?php echo htmlspecialchars($preferencia_nueva->momento_dia); ?>" selected><?php echo ucfirst(htmlspecialchars($preferencia_nueva->momento_dia)); ?></option>
                        </select>
                    </div>

                    <div class="formulario__campo">
                        <label for="estacion" class="formulario__label">Estación del año:</label>
                        <select id="estacion" name="estacion" class="formulario__select">
                            <option value="verano">Verano</option>
                            <option value="primavera">Primavera</option>
                            <option value="otoño">Otoño</option>
                            <option value="invierno">Invierno</option>
                            <option value="<?php echo htmlspecialchars($preferencia_nueva->estacion); ?>" selected><?php echo ucfirst(htmlspecialchars($preferencia_nueva->estacion)); ?></option>
                        </select>
                    </div>

                    <div class="formulario__campo">
                        <input type="button" value="Obtener Recomendación" class="formulario__submit" onclick="filtrar()">
                    </div>
                </form>
            </div>
        </div>

        <div class="resultados">
            <h3 class="recomendacion__subheading">Sitios Recomendadas</h3>
            <div id="resultadosSitios" class="recomendacion__texto"></div>

            <div class="swiper">
                <div class="swiper-wrapper" id="sitiosRecomendados">
                    <?php foreach($sitios as $sitio) { ?>
                        <div class="evento swiper-slide">
                            <div class="evento__informacion">
                                <h4 class="evento__nombre"><?php echo htmlspecialchars($sitio->nombre); ?></h4>
                                <p class="evento__introduccion"><?php echo htmlspecialchars($sitio->descripcion); ?></p>
                                <picture>
                                    <source srcset="/img/sitios/<?php echo htmlspecialchars($sitio->imagen); ?>.webp" type="image/webp">
                                    <source srcset="/img/sitios/<?php echo htmlspecialchars($sitio->imagen); ?>.png" type="image/png">
                                    <img class="evento__imagen-autor" loading="lazy" width="200" height="300" src="/img/sitios/<?php echo htmlspecialchars($sitio->imagen); ?>.png" alt="Imagen evento">
                                </picture>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="resultados">
            <h3 class="recomendacion__subheading">Empresas Recomendadas</h3>
            <div id="resultadosEmpresas" class="recomendacion__texto"></div>
            <div id="recomendacion" class="recomendacion__contenido">
                <div class="swiper">
                    <div class="swiper-wrapper" id="empresasRecomendadas">
                        <div class="evento swiper-slide">
                            <div class="evento__informacion">
                                <h4 class="evento__nombre"><?php echo htmlspecialchars($empresaAleatoria->nombre); ?></h4>
                                <p class="evento__introduccion"><?php echo htmlspecialchars($empresaAleatoria->descripcion); ?></p>
                                <picture>
                                    <source srcset="/img/empresas/<?php echo htmlspecialchars($empresaAleatoria->imagen); ?>.webp" type="image/webp">
                                    <source srcset="/img/empresas/<?php echo htmlspecialchars($empresaAleatoria->imagen); ?>.png" type="image/png">
                                    <img class="evento__imagen-autor" loading="lazy" width="200" height="300" src="/img/empresas/<?php echo htmlspecialchars($empresaAleatoria->imagen); ?>.png" alt="Imagen empresa">
                                </picture>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="recomendacion__contenido">
            <div class="recomendacion__texto">
                <p>Con base en tus preferencias, te recomendamos visitar la empresa <strong><?php echo htmlspecialchars($empresaAleatoria->nombre); ?></strong>.</p>
            </div>
        </div>
        </div>
    </div>

    <div class="recomendaciones">
        <div class="recomendacion__container">
            <h3 class="recomendacion__subheading">Actividades recomendadas según tus preferencias</h3>
            <div class="recomendacion__texto">
                <?php foreach ($recomendaciones as $actividad_id => list($preferencia, $similitud)) { ?>
                    <?php $actividad = $actividades[$actividad_id - 1]; ?>
                    <div class="recomendacion__actividad">
                        <h3 class="actividad__nombre">Actividad: <?php echo $actividad->nombre; ?></h3>
                        <p class="actividad__descripcion">Descripción: <?php echo $actividad->descripcion; ?></p>
                        <div class="preferencia">
                            <p>Preferencia del usuario que la recomienda:</p>
                            <ul>
                                <li>Clima: <?php echo $preferencia->clima; ?></li>
                                <li>Momento del día: <?php echo $preferencia->momento_dia; ?></li>
                                <li>Estación: <?php echo $preferencia->estacion; ?></li>
                            </ul>
                        </div>
                        <p class="actividad__similitud">Similitud con el usuario nuevo: <?php echo $similitud; ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>


</main>




<!-- <div class="formulario__campo">
                            <label for="sitio" class="formulario__label">Sitio Preferido:</label>
                            <select id="sitio" name="sitio" class="formulario__select">
                                <?php foreach($sitios as $sitio) { ?>
                                    <option value="<?php echo $sitio->id; ?>"><?php echo $sitio->nombre; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="formulario__campo">
                            <label for="empresa" class="formulario__label">Empresa Preferida:</label>
                            <select id="empresa" name="empresa" class="formulario__select">
                                <?php foreach($empresas as $empresa) { ?>
                                    <option value="<?php echo $empresa->id; ?>"><?php echo $empresa->nombre; ?></option>
                                <?php } ?>
                            </select>
                        </div> -->
