<h1 class="page-header">Registro de Equipos</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Equipo&a=Mostrar">Ver mas detalles</a>
    <a class="btn btn-primary" href="?c=Equipo&a=Crud">Nuevo Equipo</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Id Equipo</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Diagnostico</th>
            <th style="width:120px;">Fecha de ingreso</th>
            <th style="width:60px;">ID Cliente</th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->idEquipo?></td>
            <td><?php echo $r->nombre_e; ?></td>
            <td><?php echo $r->descripcion; ?></td>
            <td><?php echo $r->prev_diag; ?></td>
            <td><?php echo $r->fecha_ingre; ?></td>
            <td><?php echo $r->Cliente_idCliente; ?></td>
            <td>
                <a href="?c=Equipo&a=Crud&idEquipo=<?php echo $r->idEquipo; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Equipo&a=Eliminar&idEquipo=<?php echo $r->idEquipo; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
<div align="center">
    <a class="btn btn-primary" href="index.php">Ir a Home</a>
    </div>
