<h1 class="page-header">Registro de Lista Repuestos</h1>

<!-- <div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Lista&a=Mostrar">Ver mas detalles</a>
    <a class="btn btn-primary" href="?c=Lista&a=Crud">Nuevo Repuesto</a>
</div> -->


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
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table> 
    <br>
    <div align="center">
    <a class="btn btn-primary" href="home.php">Ir a Home</a>
    </div>