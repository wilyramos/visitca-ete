<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/sitios/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Sitio Turistico
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if(!empty($sitios)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Sitio</th>
                    <th scope="col" class="table__th">Categoria</th>
                    <th scope="col" class="table__th">Descripción</th>
                    <th scope="col" class="table__th">Temporada Alta</th>
                    <th scope="col" class="table__th">Ubicación</th>
                    <th scope="col" class="table__th">Acciones</th>
                    
                    

                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($sitios as $sitio) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $sitio->nombre ?>
                        </td>
                        <td class="table__td">
                            <?php echo $sitio->categoria ?>
                        </td>
                        <td class="table__td">
                            <?php echo $sitio->descripcion ?>
                        </td>
                        <td class="table__td">
                            <?php echo $sitio->temporada_alta ?>
                        </td>
                        <td class="table__td">
                            <?php echo $sitio->ubicacion ?>
                        </td>
                        
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/sitios/editar?id=<?php echo $sitio->id; ?>">
                                <i class="fa-solid fa-pencil"></i>
                                Editar
                            </a>

                            <form method="POST" action="/admin/sitios/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $sitio->id; ?>">
                                <button class="table__accion table__accion--eliminar" type="submit">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p class="text-center">No Hay Sitios Aún</p>
    <?php } ?>
</div>

<?php 
    echo $paginacion;
?>