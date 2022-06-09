<h1 class="page-header">
    <?php echo $equi->idEquipo != null ? $equi->nombre_e : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Equipo">Equipo</a></li>
  <li class="active"><?php echo $equi->idEquipo != null ? $equi->nombre_e : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Equipo&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idEquipo" value="<?php echo $equi->idEquipo; ?>" />

    <div class="form-group">
        <label>ID del Equipo</label>
        <input type="text" name="idCodigo" value="<?php echo $equi->idCodigo; ?>" class="form-control" placeholder="Ingrese el serial del equipo" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Nombre del Equipo</label>
        <input type="text" name="nombre_e" value="<?php echo $equi->nombre_e; ?>" class="form-control" placeholder="Ingrese el nombre del equipo" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Descripcion</label>
        <input type="text" name="descripcion" value="<?php echo $equi->descripcion; ?>" class="form-control" placeholder="Ingrese descripcion del equipo" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Diagnostico Previo</label>
        <input type="text" name="prev_diag" value="<?php echo $equi->prev_diag; ?>" class="form-control" placeholder="Ingrese diagnostico del equipo" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Fecha de Ingreso</label>
        <input type="date" name="fecha_ingre" value="<?php echo $equi->fecha_ingre; ?>" class="form-control" placeholder="Ingrese la fecha de ingreso del equipo" data-validacion-tipo="requerido" />
    </div>
   
    <div class="form-group">
    <label>Cliente: &nbsp&nbsp</label> 
    <select name="idCliente" >
            <?php foreach ($listare as $p): ?>
                <option value="<?php echo $p['idCliente']?>"><?php echo $p['Nombre']?></option>
            <?php endforeach; ?>
    </select>
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