<h1 class="page-header">
    <div class="well well-sm text-right">
    Proveedores
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
            <th>Nombre de la Empresa</th>
            <th>Categoria</th>
            <th>Direccion</th>
            <th>Telefono de contacto</th>
        </tr>
    </thead>

<tbody>
<?php foreach($this->model->Listar() as $p): ?>
               <tr>
                <td><?php echo $p->nombre_empre; ?></td>
                <td><?php echo $p->categoria; ?></td>
                <td><?php echo $p->direccion; ?></td>
                <td><?php echo $p->telefono; ?></td>
                </tr>
 <?php endforeach; ?>
 </tbody>  
 </table>
