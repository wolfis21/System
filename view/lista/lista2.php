<h1 class="page-header">
    
    <div class="well well-sm text-right">
    Lista Repuestos
    <a class="btn btn-primary" href="?c=Cliente&a=Index">Seccion Clientes</a>
    <a class="btn btn-primary" href="?c=Equipo&a=Index">Seccion Equipos</a>
    <!-- el agregar equipos viene despues de la seccion equipos -->
    <a class="btn btn-primary" href="?c=Proveedor&a=Mostrar">Ver Proveedores</a>
    <a class="btn btn-primary" href="?c=Lista&a=Mostrar">Ver Lista</a>
    <!-- carta de entrega por implementar -->
    </div>
</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID_Producto</th>
            <th>Nombre del Repuesto</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($this->model->Listar() as $r): ?>
            <tr>
                <td><?php echo $r->idProducto; ?></td>
                <td><?php echo $r->nombre_pieza; ?></td>
                <td><?php echo $r->precio; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table> 
    <br>