
<h1 class="page-header">Registro de Cliente</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Cliente&a=Mostrar">Ver mas detalles</a>
    <a class="btn btn-primary" href="?c=Cliente&a=Crud">Nuevo Cliente</a>
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
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($this->model->Listar() as $r): ?>
        <tr>
        <td><?php echo $r->idCliente; ?></td>
        <td><?php echo $r->idCedula; ?></td>
            <td><?php echo $r->Nombre; ?></td>
            <td><?php echo $r->Apellido; ?></td>
            <td><?php echo $r->Direccion; ?></td>
            <td><?php echo $r->Telefono;  ?></td>
            <td><?php echo $r->Correo; ?></td>
            <td>
                <a href="?c=Cliente&a=Crud&idCliente=<?php echo $r->idCliente; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Cliente&a=Eliminar&id=<?php echo $r->idCliente; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
<br>
<div align="center">
 <a href="javascript: history.go(-1)" class="btn btn-primary">Volver atrás</a> 
</div>