<h4 align="right"><a href="?c=Usuario&a=Index">Cerrar Sesion</a></h4>

<h1 class="page-header">
    <div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Empleado&a=Index">Seccion Empleados</a>
    <a class="btn btn-primary" href="?c=Proveedor&a=Index">Seccion Proveedor</a>
    <p align="left"> Registro de lista de Repuestos </p>    
</div>
</h1>
<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Lista&a=Mostrar">Ver mas detalles</a>
    <a class="btn btn-primary" href="?c=Lista&a=Crud">Nuevo Repuesto</a>
</div>


<table class="table table-striped">
    <thead>
        <tr>
            <th>ID_Producto</th>
            <th>Nombre del Repuesto</th>
            <th>Precio</th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($this->model->Listar() as $r): ?>
            <tr>
                <td><?php echo $r->idProducto; ?></td>
                <td><?php echo $r->nombre_pieza; ?></td>
                <td><?php echo $r->precio; ?></td>
                <td>
                    <a href="?c=Lista&a=Crud&idProducto=<?php echo $r->idProducto; ?>">Editar</a>
                </td>
                <!-- <td> 
                    arreglar el eliminar 
                    <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Lista&a=Eliminar&idProducto=<?php echo $r->$idProducto; ?>">Eliminar</a>
                </td> -->
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table> 
    <br>
