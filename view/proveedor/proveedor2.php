<h4 align="right"><a href="?c=Usuario&a=Index">Cerrar Sesion</a></h4>

<h1 class="page-header">
    <div class="well well-sm text-right">
    <a class="btn btn-primary" href="javascript: history.go(-1)">Volver atrás</a> 
    <p align="left">Proveedores</p>
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
