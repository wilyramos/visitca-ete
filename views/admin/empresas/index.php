<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/empresas/crear">
        <i class="fa-solid fa-circle-plus"></i>
        Añadir Empresa
    </a>
</div>

<div class="dashboard__contenedor">
    <?php if(!empty($empresas)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Empresa</th>
                    <th scope="col" class="table__th">Dirección</th>
                    <th scope="col" class="table__th">Ciudad</th>
                    <th scope="col" class="table__th">Teléfono</th>
                    <th scope="col" class="table__th">Email</th>
                    <th scope="col" class="table__th">Categoría</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>
            <tbody class="table__tbody">
                <?php foreach($empresas as $empresa) { ?>
                    <tr class="table__tr">

                        <td class="table__td">
                            <?php echo $empresa->nombre ?>
                        </td>
                        
                        <td class="table__td">
                            <?php echo $empresa->direccion ?>
                        </td>

                        <td class="table__td">
                            <?php echo $empresa->ciudad ?>
                        </td>

                        <td class="table__td">
                            <?php echo $empresa->telefono ?>
                        </td>

                        <td class="table__td">
                            <?php echo $empresa->email ?>
                        </td>

                        <td class="table__td">
                            <?php echo $empresa->categoria ?>
                        </td>

                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/admin/empresas/editar?id=<?php echo $empresa->id; ?>">
                                <i class="fa-solid fa-pencil"></i>
                                Editar
                            </a>

                            <form method="POST" action="/admin/empresas/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $empresa->id; ?>">
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
        <p class="text-center">No Hay Empresa Aún</p>
    <?php } ?>
</div>

<?php 
    echo $paginacion;
?>