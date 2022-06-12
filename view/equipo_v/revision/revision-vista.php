<h1 class="page-header">Equipos Revisados</h1>

<div class="well well-sm text-right">
    <h3>Procesamiento</h3>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width: 60px;">Nombre del Equipo</th>
            <th>Fecha revision</th>
            <th>Descripcion revision</th>
            <th>Descripcion reemplazo</th>
            <th>Presupuesto</th>
            <th>Carta de Entrega</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model2->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nombre_e; ?></td>
            <td><?php echo $r->fecha_rev;?></td>
            <td><?php echo $r->descrip_rev; ?></td>
            <td><?php echo $r->descrip_reemp; ?></td>
            <td><?php echo $r->presupuesto; ?></td>
            <td>
                    <a onclick="javascript:return confirm('¿Seguro de procesar carta de entrega?');" href=" =<?php echo $r->idRev_equipo; ?>">Solicitar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
<div align="center">
 <a href="javascript: history.go(-1)" class="btn btn-primary">Volver atrás</a> 
</div>