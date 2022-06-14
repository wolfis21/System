<h4 align="right"><a href="?c=Usuario&a=Index">Cerrar Sesion</a></h4>

<h1 class="page-header">
    <div class="well well-sm text-right">
        <a class="btn btn-primary" href="?c=Empleado&a=Index">Seccion Empleados</a>
        <a class="btn btn-primary" href="?c=Lista&a=Index">Seccion Lista</a>
        <p align="left"> Registro de Proveedores </p>
    </div>
</h1>

<div class="well well-sm text-right">
<!--quitar el ver mas, esta rebundante 
    <a class="btn btn-primary" href="?c=Proveedor&a=Mostrar">Ver mas detalles</a> -->
    <a class="btn btn-primary" href="?c=Proveedor&a=Crud">Nuevo Proveedor</a>
</div>


<table class="table table-striped">
    <thead>
        <tr>
            <th>ID_Empresa</th>
            <th>Nombre de la Empresa</th>
            <th>Categoria</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($this->model->Listar() as $r): ?>
            <tr>
                <td><?php echo $r->idProveedores; ?></td>
                <td><?php echo $r->nombre_empre; ?></td>
                <td><?php echo $r->categoria; ?></td>
                <td><?php echo $r->direccion; ?></td>
                <td><?php echo $r->telefono; ?></td>
                <td>
                    <a href="?c=Proveedor&a=Crud&idProveedores=<?php echo $r->idProveedores; ?>">Editar</a>
                </td>
                <!-- <td>
                    arreglar el eliminar 
                    <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Proveedor&a=Eliminar&idProveedores=<?php echo $r->$idProveedores; ?>">Eliminar</a>
                </td> -->
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table> 
    <br>
