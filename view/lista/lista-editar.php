
<h1 class="page-header">
    <?php echo $emple->idProducto != null ? $emple->nombre_pieza: 'Registrar Lista'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Lista">Lista</a></li>
  <li class="active"><?php echo $emple->idProducto != null ? $emple->nombre_pieza: 'Actualizar Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Lista&a=Guardar" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label>ID_Producto</label>
        <input type="number" name="idProducto" value="<?php echo $emple->idProducto; ?>" class="form-control" placeholder="Ingrese el serial" data-validacion-tipo="requerido" />
    </div>

    <div class="form-group">
        <label>Nombre de Pieza</label>
        <input type="text" name="nombre_pieza" value="<?php echo $emple->nombre_pieza; ?>" class="form-control" placeholder="Ingrese el nombre" data-validacion-tipo="requerido" />
    </div>
    
    <div class="form-group">
        <label>Precio</label>
        <input type="float" name="precio" value="<?php echo $emple->precio; ?>" class="form-control" placeholder="Ingrese el precio" data-validacion-tipo="requerido" />
    </div>

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<div align="center">
    <a href="?c=Lista&a=Index" class="btn btn-primary">Volver atrás</a>
    </div>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>