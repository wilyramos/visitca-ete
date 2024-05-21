<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información General</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input
            type="text"
            class="formulario__input"
            id="nombre"
            name="nombre"
            placeholder="Nombre Empresa"
            value="<?php echo $empresa->nombre ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripción</label>
        <input
            type="text"
            class="formulario__input"
            id="descripcion"
            name="descripcion"
            placeholder="Descripción Empresa"
            value="<?php echo $empresa->descripcion ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="direccion" class="formulario__label">Dirección</label>
        <input
            type="text"
            class="formulario__input"
            id="direccion"
            name="direccion"
            placeholder="Dirección Empresa"
            value="<?php echo $empresa->direccion ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="ciudad" class="formulario__label">Ciudad</label>
        <input
            type="text"
            class="formulario__input"
            id="ciudad"
            name="ciudad"
            placeholder="Ciudad Empresa"
            value="<?php echo $empresa->ciudad ?? ''; ?>"
        >
    </div>
    

    <div class="formulario__campo">
        <label for="email" class="formulario__label">Email</label>
        <input
            type="email"
            class="formulario__input"
            id="email"
            name="email"
            placeholder="Email Empresa"
            value="<?php echo $empresa->email ?? ''; ?>"
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

    <?php if(isset($empresa->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen Actual:</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/img/empresas/' . $empresa->imagen; ?>.webp" type="empresa/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/img/empresas/' . $empresa->imagen; ?>.png" type="empresa/png">
                <img src="<?php echo $_ENV['HOST'] . '/img/empresas/' . $empresa->imagen; ?>.png" alt="Imagen Empresa">
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
            placeholder="Valoración Empresa"
            value="<?php echo $empresa->valoracion ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="num_opiniones" class="formulario__label">Número de Opiniones</label>
        <input
            type="number"
            class="formulario__input"
            id="num_opiniones"
            name="num_opiniones"
            placeholder="Número de Opiniones Empresa"
            value="<?php echo $empresa->num_opiniones ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="categoria" class="formulario__label">latitud</label>
        <input
            type="text"
            class="formulario__input"
            id="latitud"
            name="latitud"
            placeholder="latitud Empresa"
            value="<?php echo $empresa->latitud ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="categoria" class="formulario__label">longitud</label>
        <input
            type="text"
            class="formulario__input"
            id="longitud"
            name="longitud"
            placeholder="longitud Empresa"
            value="<?php echo $empresa->longitud ?? ''; ?>"
        >
    </div>

</fieldset>