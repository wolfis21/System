
<h1 class="page-header">
    <?php echo $emple->idProveedores != null ? $emple->nombre_empre : 'Registrar Proveedor'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Proveedor">Proveedor</a></li>
  <li class="active"><?php echo $emple->idProveedores != null ? $emple->nombre_empre : 'Actualizar Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Proveedor&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idProveedores" value="<?php echo $emple->idProveedores; ?>" />

    <div class="form-group">
        <label>Nombre de Empresa</label>
        <input type="text" name="nombre_empre" value="<?php echo $emple->nombre_empre; ?>" class="form-control" placeholder="Ingrese nombre" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Categoria</label>
        <input type="text" name="categoria" value="<?php echo $emple->categoria; ?>" class="form-control" placeholder="Ingrese la categoria" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Direccion</label>
        <input type="text" name="direccion" value="<?php echo $emple->direccion; ?>" class="form-control" placeholder="Ingrese su direccion" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Telefono</label>
        <input type="number" name="telefono" value="<?php echo $emple->telefono; ?>" class="form-control" placeholder="Ingrese su numero de telefono" data-validacion-tipo="requerido" />
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