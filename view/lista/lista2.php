<h1 class="page-header">Lista Repuestos</h1>

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
    <div align="center">
    <a href="javascript: history.go(-1)" class="btn btn-primary">Volver atrás</a>
    <!-- <a class="btn btn-primary" href="home.php">Ir a Home</a> -->
    </div>