
<h1 class="page-header">
    <?php echo $emple->idCliente != null ? $emple->Nombre : 'Registrar Cliente'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Cliente">Cliente</a></li>
  <li class="active"><?php echo $emple->idCliente != null ? $emple->Nombre : 'Actualizar Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Cliente&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $emple->idCliente; ?>" />

    <div class="form-group">
        <label>Cedula</label>
        <input type="number" name="idCedula" value="<?php echo $emple->idCedula; ?>" class="form-control" placeholder="Ingrese su Cedula" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $emple->Nombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="Apellido" value="<?php echo $emple->Apellido; ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Direccion</label>
        <input type="text" name="Direccion" value="<?php echo $emple->Direccion; ?>" class="form-control" placeholder="Ingrese su direccion" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Telefono</label>
        <input type="number" name="Telefono" value="<?php echo $emple->Telefono; ?>" class="form-control" placeholder="Ingrese su numero de telefono" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Correo</label>
        <input type="text" name="Correo" value="<?php echo $emple->Correo; ?>" class="form-control" placeholder="Ingrese su correo" data-validacion-tipo="requerido" />
    </div>
     
    <th>ID_Empleado: &nbsp&nbsp </th>
    <select name="idEmpleado" >
            <?php foreach ($listare as $p): ?>
                <option value="<?php echo $p['idEmpleado']?>"><?php echo $p['pNombre']?></option>
            <?php endforeach; ?>
    </select>
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