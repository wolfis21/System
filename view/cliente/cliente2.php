<h1 class="page-header">Clientes</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=cliente&a=Index">Retroceder</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>ID_empleado</th>

        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->idCliente; ?></td>
            <td><?php echo $r->idCedula; ?></td>
            <td><?php echo $r->Nombre; ?></td>
            <td><?php echo $r->Apellido; ?></td>
            <td><?php echo $r->Direccion; ?></td>
            <td><?php echo $r->Telefono; ?></td>
            <td><?php echo $r->Correo; ?></td>
            <td><?php echo $r->Empleado_idEmpleado; ?></td>
         
            <!-- <td>
                <a href="?c=Empleado&a=Crud&id=<?php echo $r->idcliente; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Empleado&a=Eliminar&id=<?php echo $r->idEmpleado; ?>">Eliminar</a>
            </td>
        </tr> -->
    <?php endforeach; ?>
    </tbody>
</table>