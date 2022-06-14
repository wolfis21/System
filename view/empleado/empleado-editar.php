<h1 class="page-header">
    <?php echo $emple->idEmpleado != null ? $emple->pNombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Empleado">Empleado</a></li>
  <li class="active"><?php echo $emple->idEmpleado != null ? $emple->pNombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Empleado&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $emple->idEmpleado; ?>" />

    <div class="form-group">
        <label>Cedula</label>
        <input type="number" name="Cedula" value="<?php echo $emple->Cedula; ?>" class="form-control" placeholder="Ingrese su Cedula" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Primer Nombre</label>
        <input type="text" name="pNombre" value="<?php echo $emple->pNombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Segundo Nombre</label>
        <input type="text" name="sNombre" value="<?php echo $emple->sNombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Primer Apellido</label>
        <input type="text" name="pApellido" value="<?php echo $emple->pApellido; ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Segundo Apellido</label>
        <input type="text" name="sApellido" value="<?php echo $emple->sApellido; ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Fecha de nacimiento</label>
        <input type="date" name="Fecha_nacimiento" value="<?php echo $emple->Fecha_nacimiento; ?>" class="form-control" placeholder="Ingrese su fecha de nacimiento" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Direccion</label>
        <input type="text" name="Direccion" value="<?php echo $emple->Direccion; ?>" class="form-control" placeholder="Ingrese su direccion" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Genero</label>
        <select name="Genero" class="form-control">
            <option <?php echo $emple->Genero == 1 ? 'selected' : ''; ?> value="1">Masculino</option>
            <option <?php echo $emple->Genero == 2 ? 'selected' : ''; ?> value="2">Femenino</option>
        </select>
    </div>
    
    <div class="form-group">
        <label>telefono</label>
        <input type="number" name="telefono" value="<?php echo $emple->telefono; ?>" class="form-control" placeholder="Ingrese su telefono" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Cargo</label>
        <select name="Cargo" class="form-control">
            <option <?php echo $emple->Cargo; ?> value="Gerente">Gerente</option>
            <option <?php echo $emple->Cargo; ?> value="Tecnico">Tecnico</option>
            <option <?php echo $emple->Cargo; ?> value="Administrador">Administrador</option>
        </select>
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<div align="center">
    <a href="?c=Empleado&a=Index" class="btn btn-primary">Volver atrás</a>
    </div>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>