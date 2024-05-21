<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información general</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre sitio</label>
        <input
            type="text"
            id="nombre"
            name="nombre"
            class="formulario__input"
            placeholder="Nombre del sitio turistico"
            value="<?php echo s($evento->nombre); ?>"
        >            
    </div>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripcion</label>
        <input
            id="descripcion"
            name="descripcion"
            class="formulario__input formulario__input--textarea"
            placeholder="Nombre del sitio turistico"
            rows="8"
            value="<?php echo s($evento->descripcion); ?>"
        >            
    </div>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Categoria o tipo</label>
        <select
            class="formulario__select"
            id="categoria"
            name="categoria_id"

        >
            <option value="">- Seleccione -</option>

            <?php foreach($categorias as $categoria) { ?>
                <option <?php echo ($evento->categoria_id === $categoria->id) ? 'selected' : '' ?> value="<?php echo $categoria->id; ?>"><?php echo $categoria->nombre; ?></option>
            <?php } ?>
            

                                
        </select>         
    </div>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Selecciona el dia</label>
        <div class="formulario__radio">
            <?php foreach($dias as $dia) { ?>

                <div>
                    <label for="<?php echo strtolower($dia->nombre); ?>"><?php echo $dia->nombre; ?></label>
                    <input
                        type="radio"
                        id="<?php echo strtolower($dia->nombre); ?>"
                        name="dia"
                        value="<?php echo $dia->id; ?>"
                        <?php echo ($evento->dia_id === $dia->id ) ? 'checked' :'' ?>
                    />
                </div>
            <?php } ?>
        </div>

        <input type="hidden" name="dia_id" value="<?php echo $evento->dia_id; ?>">
    </div>

    <div id="horas" class="formulario__campo">
        <label class="formulario__label">Selecciona la hora</label>

        <ul id="horas" class="horas">
            <?php foreach($horas as $hora) { ?>
                <li data-hora-id="<?php echo $hora->id; ?>" class="horas__hora horas__hora--deshabilitada"><?php echo $hora->hora; ?></li>
            <?php } ?>
        </ul>

        <input type="hidden" name="hora_id" value="<?php echo $evento->hora_id ?>"
</fieldset>



<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información extra</legend>

    <div class="formulario__campo">
        <label for="ponenetes" class="formulario__label">Ponentes</label>
        <input
            type="text"
            id="ponentes"
            name="ponentes"
            class="formulario__input"
            placeholder="Buscar ponente"
        >

        <ul id="listado-ponentes" class="listado-ponentes"></ul>
        <input type="hidden" name="ponente_id" value="<?php echo $evento->$ponente_id; ?>">
    </div>

    <div class="formulario__campo">
        <label for="disponibles" class="formulario__label">Lugares Disponibles</label>
        <input
            type = "number"
            min="1"
            class="formulario__input"
            id="disponibles"
            name="disponibles"
            placeholder="Ej. 10"
            value="<?php echo s($evento->disponibles); ?>"

        >
    </div>
</fieldset>