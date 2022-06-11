<h1 class="page-header">
    <?php echo $equi->idEquipo != null ? $equi->nombre_e : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Equipo">Revision de Equipo</a></li>
  <li class="active"><?php echo $equi->idEquipo != null ? $equi->nombre_e : 'Nuevo Registro'; ?></li>
</ol>


<form id="frm-alumno" action="?c=Equipo&a=Guardar2" method="post" enctype="multipart/form-data">
<input type="hidden" name="idRev_equipo" value="<?php echo $rev->idRev_equipo; ?>" />

    <div class="form-group">
    <label>Confirmacion de Equipo es: &nbsp&nbsp</label> 
    <select name="idEquipo" >
            <?php foreach ($listare as $p): ?>
                <option value="<?php echo $p['idEquipo']?>"><?php echo $p['nombre_e']?></option>
            <?php endforeach; ?>
    </select>
    </div>
    <div class="form-group">
        <label>Fecha de Revision</label>
        <input type="date" name="fecha_rev" value="<?php echo $rev->fecha_rev; ?>" class="form-control" placeholder="Ingrese fecha de revision" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Descripcion de Revision completa</label>
        <input type="text" name="descrip_rev" value="<?php echo $rev->descrip_rev; ?>" class="form-control" placeholder="Ingrese detalles de revision" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Descripcion de Reparacion</label>
        <input type="text" name="descrip_reemp" value="<?php echo $rev->descrip_reemp; ?>" class="form-control" placeholder="Ingrese descripcion del reemplazo" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Presupuesto de reparacion</label>
        <input type="number" name="presupuesto" value="<?php echo $rev->presupuesto; ?>" class="form-control" placeholder="Ingrese la monto" data-validacion-tipo="requerido" />
    </div>
       
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<div align="center">
    <a href="javascript: history.go(-1)" class="btn btn-primary">Volver atrás</a>
    </div>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>