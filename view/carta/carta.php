<?php 
// ob_start();
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        
        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

   <title>Carta de Entrega</title>
 </head>
 <body>
 <div class="container"> 
 <h1 class="page-header" align="Center"> CARTA DE ENTREGA</h1>

<?php foreach ($this->model2->Imprimir($rev->idRev_equipo) as $r) : ?>
    <tr>
       <h3 class="page-header">Tecnico</h3>
        <div class="form-group">
            <label>Cedula: </label>
            <td><?php echo $r->Cedula; ?></td>
        </div>
        <div > 
           <Label>Nombre: </Label>
           <td><?php echo $r->pNombre." ".$r->pApellido; ?></td>
        </div>

        <h3 class="page-header">Cliente</h3>
        <div class="form-group"> 
           <label>Cedula: </label>
           <td><?php echo $r->idCedula; ?></td>
        </div>
        
        <div class="form-group"> 
           <label>Nombre: </label>
           <td><?php echo $r->Nombre." ".$r->Apellido; ?></td>
        </div>
        
        <div class="form-group"> 
           <label> Direccion: </label>
           <td><?php echo $r->Direccion; ?></td>
        </div>
        
        <div class="form-group"> 
            <label>Telefono: </label>
            <td><?php echo $r->Telefono; ?></td>
        </div>
        
        <div class="form-group"> 
           <label>Correo: </label>
           <td><?php echo $r->Correo; ?></td>
        </div>
        <h3 class="page-header" align="center">Equipo</h3>
        <div class="form-group"> 
           <label>Codigo de Equipo: </label>
           <td><?php echo $r->idCodigo; ?></td>
        </div>
        
        <div class="form-group"> 
           <label>Nombre del equipo: </label>
           <td><?php echo $r->nombre_e; ?></td>
        </div>
        
        <div class="form-group"> 
           <label>Fecha de ingreso: </label>
           <td><?php echo $r->fecha_ingre; ?></td>
        </div>
          
        <div class="form-group"> 
           <label>Fecha de revision: </label>
           <td><?php echo $r->fecha_rev; ?></td>
        </div>

        <div class="form-group"> 
           <label>Descripcion de Revision: </label>
           <td><?php echo $r->descrip_rev; ?></td>
        </div>
        
        <div class="form-group"> 
           <label>Descripcion de Reemplazo: </label>
           <td><?php echo $r->descrip_reemp; ?></td>
        </div>
        
        <div class="form-group"> 
            <label>Monto: </label>
            <td><?php echo $r->presupuesto; ?></td>
        </div>

    </tr>
<?php endforeach; ?>

</div>
 </body>
 </html>

 <?php 
//  $html = ob_get_clean();
//  echo $html;
//    require_once './lib/dompdf/autoload.inc.php';
//    use Dompdf\Dompdf;
//    $dompdf = new Dompdf();

//    $options = $dompdf->getOptions();
//    $options -> set(array('isRemoteEnabled' => true));
//    $dompdf -> setOptions($options);

//    $dompdf-> setPaper('letter');
//    $dompdf ->loadHtml($html);
//    $dompdf->render();
//    //si ponemos true se nos descarga el pdf
//    $dompdf->stream ("Carta de entrega.pdf", array("Attachment" => false));
 ?>