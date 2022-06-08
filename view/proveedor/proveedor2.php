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

 <div align="center">
 <a href="javascript: history.go(-1)" class="btn btn-primary">Volver atrás</a> 
</div>