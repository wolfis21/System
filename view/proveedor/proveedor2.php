<h1 class="page-header">Proveedores</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre de la Empresa</th>
            <th>Categoria</th>
            <th>Direccion</th>
            <th>Telefono de contacto</th>
        </tr>
    </thead>
</table>
<tbody>
<?php foreach($this->model->Listar() as $p): ?>
                <td><?php echo $r->nombre_empre; ?></td>
                <td><?php echo $r->categoria; ?></td>
                <td><?php echo $r->direccion; ?></td>
                <td><?php echo $r->telefono; ?></td>
 <?php endforeach; ?>
 </tbody>  

 <!-- Opcional agregar  para que lo vean los tecnicos-->