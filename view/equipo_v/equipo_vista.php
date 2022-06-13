<h1 class="page-header">
<div class="well well-sm text-right">
    Registro de Equipos
    <a class="btn btn-primary" href="?c=Cliente&a=Index">Seccion Clientes</a>
    <a class="btn btn-primary" href="?c=Equipo&a=Index">Seccion Equipos</a>
    <!-- el agregar equipos viene despues de la seccion equipos -->
    <a class="btn btn-primary" href="?c=Proveedor&a=Mostrar">Ver Proveedores</a>
    <a class="btn btn-primary" href="?c=Lista&a=Mostrar">Ver Lista</a>
    <!-- carta de entrega por implementar -->
    </div>
</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Equipo&a=MostrarRev">Equipos Revisados</a>
    <a class="btn btn-primary" href="?c=Equipo&a=Crud">Nuevo Equipo</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Serial / Codigo</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Diagnostico</th>
            <th style="width:120px;">Fecha de ingreso</th>
            <th style="width:60px;">ID Cliente</th>
            <th style="width:60px;">Cliente</th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->idCodigo?></td>
            <td><?php echo $r->nombre_e; ?></td>
            <td><?php echo $r->descripcion; ?></td>
            <td><?php echo $r->prev_diag; ?></td>
            <td><?php echo $r->fecha_ingre; ?></td>
            <td><?php echo $r->idCedula; ?></td>
            <td><?php echo $r->Nombre; ?></td>
            <td><?php echo $r->Apellido; ?></td>
            <td>
                <a href="?c=Equipo&a=Crud&idEquipo=<?php echo $r->idEquipo; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Equipo&a=Eliminar&idEquipo=<?php echo $r->idEquipo; ?>">Eliminar</a>
            </td>
            <td>
            <a href="?c=Equipo&a=Crud2&idEquipo=<?php echo $r->idEquipo; ?>">Ag. Revision</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 