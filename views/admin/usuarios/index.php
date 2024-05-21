<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/usuarios/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Usuario
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if(!empty($usuarios)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th class="table__th">Nombre</th>
                    <th class="table__th">Email</th>
                    <th class="table__th">Rol</th>
                    <th class="table__th">Acciones</th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($usuarios as $usuario) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $usuario->nombre ?>
                            <?php echo $usuario->apellido ?>
                        </td>

                        <td class="table__td">
                            <?php echo $usuario->email ?>
                        </td>

                        <td class="table__td">
                            <?php if($usuario->admin ==1){?>
                                <span>Administrador</span>
                            <?php } else { ?>
                                <span>Usuario</span>
                            <?php } ?>
                        </td>
                        
                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/usuarios/editar?id=<?php echo $usuario->id; ?>">
                                <i class="fa-solid fa-pencil"></i>
                                Editar
                            </a>
                            <form method="POST" action="/admin/usuarios/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $usuario->id; ?>">
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
        <p class="text-center">No Hay Usuarios Aún</p>
    <?php } ?>
</div>

<?php 
    echo $paginacion;
?>