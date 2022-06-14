<h4 align="right"><a href="?c=Usuario&a=Index">Cerrar Sesion</a></h4>

<h1 class="page-header">
    <div class="well well-sm text-right">
     <a class="btn btn-primary" href="javascript: history.go(-1)">Volver atrás</a> 
     <p align="left">lista de Repuestos</p>
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