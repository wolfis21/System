<h1 class="page-header">Registro de Empleados</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Empleado&a=Mostrar">Ver mas detalles</a>
    <a class="btn btn-primary" href="?c=Empleado&a=Crud">Nuevo Empleado</a>
</div>


<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Direccion</th>
            <th style="width:120px;">Genero</th>
            <th style="width:120px;">Nacimiento</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($this->model->Listar() as $r): ?>
            <tr>
                <td><?php echo $r->pNombre; ?></td>
                <td><?php echo $r->pApellido; ?></td>
                <td><?php echo $r->Direccion; ?></td>
                <td><?php echo $r->Genero == 1 ? 'Hombre' : 'Mujer'; ?></td>
                <td><?php echo $r->Fecha_nacimiento; ?></td>
                <td>
                    <a href="?c=Empleado&a=Crud&id=<?php echo $r->idEmpleado; ?>">Editar</a>
                </td>
                <td>
                    <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Empleado&a=Eliminar&id=<?php echo $r->idEmpleado; ?>">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table> 
    <br>
    <div align="center">
    <a class="btn btn-primary" href="home.php">Ir a Home</a>
    </div>