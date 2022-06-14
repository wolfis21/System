<h4 align="right"><a href="?c=Usuario&a=Index">Cerrar Sesion</a></h4>
<h1 class="page-header">Empleados</h1>

<div class="well well-sm text-right">
<div align="right">
    <a href="javascript: history.go(-1)" class="btn btn-primary">Volver atrás</a>
</div>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID_empleado</th>
            <th>Cedula</th>
            <th>Primer Nombre</th>
            <th>Segundo Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Fecha de Nacimiento</th>
            <th>Direccion</th>
            <th style="width:120px;">Genero</th>
            <th style="width:120px;">Telefono</th>
            <th>Cargo</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->idEmpleado; ?></td>
            <td><?php echo $r->Cedula; ?></td>
            <td><?php echo $r->pNombre; ?></td>
            <td><?php echo $r->sNombre; ?></td>
            <td><?php echo $r->pApellido; ?></td>
            <td><?php echo $r->sApellido; ?></td>
            <td><?php echo $r->Fecha_nacimiento; ?></td>
            <td><?php echo $r->Direccion; ?></td>
            <td><?php echo $r->Genero == 1 ? 'Hombre' : 'Mujer'; ?></td>
            <td><?php echo $r->telefono; ?></td>
            <td><?php echo $r->Cargo; ?></td>
         
            <!-- <td>
                <a href="?c=Empleado&a=Crud&id=<?php echo $r->idEmpleado; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Empleado&a=Eliminar&id=<?php echo $r->idEmpleado; ?>">Eliminar</a>
            </td> -->
        </tr> 
    <?php endforeach; ?>
    </tbody>
</table> 