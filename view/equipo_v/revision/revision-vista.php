<h1 class="page-header">Equipos Revisados</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>idRev_equipo</th>
            <th>Fecha revision</th>
            <th>Descripcion revision</th>
            <th>Descripcion reemplazo</th>
            <th>Presupuesto</th>
            <th style="width:60px;">ID Equipo</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model2->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->idRev_equipo;?></td>
            <td><?php echo $r->fecha_rev;?></td>
            <td><?php echo $r->descrip_rev; ?></td>
            <td><?php echo $r->descrip_reemp; ?></td>
            <td><?php echo $r->presupuesto; ?></td>
            <td><?php echo $r->Equipo_idEquipo; ?></td>
            <!-- <td>
                <a href="?c=Equipo&a=Crud&idEquipo=<?php echo $r->idEquipo; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Equipo&a=Eliminar&idEquipo=<?php echo $r->idEquipo; ?>">Eliminar</a>
            </td>
            <td>
            <a href="?c=Equipo&a=Crud2&idEquipo=<?php echo $r->idEquipo; ?>">Ag. Revision</a>
            </td> -->
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
<div align="center">
 <a href="javascript: history.go(-1)" class="btn btn-primary">Volver atrás</a> 
</div>