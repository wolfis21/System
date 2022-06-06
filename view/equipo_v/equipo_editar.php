<h1 class="page-header">
    <?php echo $equi->idEquipo != null ? $equi->nombre_e : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Equipo">Equipo</a></li>
  <li class="active"><?php echo $equi->idEquipo != null ? $equi->nombre_e : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Equipo&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $equi->idEquipo; ?>" />

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
    <th>ID_Cliente: &nbsp&nbsp </th>
    <select name="Cliente_idCliente" >
            <?php foreach ($listare as $p): ?>
                <option value="<?php echo $p['Cliente_idCliente']?>"><?php echo $p['Nombre']?></option>
            <?php endforeach; ?>
    </select>
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>