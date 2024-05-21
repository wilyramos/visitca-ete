<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información General</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input
            type="text"
            class="formulario__input"
            id="nombre"
            name="nombre"
            placeholder="Nombre"
            value="<?php echo $sitio->nombre ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripción</label>
        <input
            type="text"
            class="formulario__input"
            id="descripcion"
            name="descripcion"
            placeholder="Descripción"
            value="<?php echo $sitio->descripcion ?? ''; ?>"
        >
    </div>

    <!--  Categoria con opcionees-->


    <div class="formulario__campo">
        <label for="categoria" class="formulario__label">Categoria</label>
        <select id="categoria" name="categoria" class="formulario__select">
            <option value="playa">Playa</option>
            <option value="museo">Museo</option>
            <option value="parque">Parque</option>
            <option value="montaña">Montaña</option>
        </select>
    </div>
    
   
    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">ubicacion</label>
        <input
            type="text"
            class="formulario__input"
            id="ubicacion"
            name="ubicacion"
            placeholder="Ubicacion"
            value="<?php echo $sitio->ubicacion ?? ''; ?>"
        >
    </div>
    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Tarifa</label>
        <input
            type="text"
            class="formulario__input"
            id="tarifa"
            name="tarifa"
            placeholder="Tarifa Empresa"
            value="<?php echo $sitio->tarifa ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="telefono" class="formulario__label">Teléfono</label>
        <input
            type="tel"
            class="formulario__input"
            id="telefono"
            name="telefono"
            placeholder="Teléfono"
            value="<?php echo $sitio->telefono ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="email" class="formulario__label">Email</label>
        <input
            type="email"
            class="formulario__input"
            id="email"
            name="email"
            placeholder="Email"
            value="<?php echo $sitio->email ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">Imagen</label>
        <input
            type="file"
            class="formulario__input formulario__input--file"
            id="imagen"
            name="imagen"
        >
    </div>

    <?php if(isset($sitio->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/sitios/' . $sitio->imagen; ?>.webp" type="sitio/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/sitios/' . $sitio->imagen; ?>.png" type="sitio/png">
                <img src="<?php echo $_ENV['HOST'] . '/img/sitios/' . $sitio->imagen; ?>.png" alt="Imagen sitio">
            </picture>
        </div>

    <?php } ?>

    <div class="formulario__campo">
        <label for="valoracion" class="formulario__label">Valoración</label>
        <input
            type="number"
            class="formulario__input"
            id="valoracion"
            name="valoracion"
            placeholder="Valoración"
            value="<?php echo $sitio->valoracion ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="num_opiniones" class="formulario__label">Número de Opiniones</label>
        <input
            type="number"
            class="formulario__input"
            id="num_opiniones"
            name="num_opiniones"
            placeholder="Número de Opiniones"
            value="<?php echo $sitio->num_opiniones ?? ''; ?>"
        >
    </div>

</fieldset>