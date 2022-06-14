 <!-- lo que debe de salir aca es:

 atendido por (empleado tec.) 
 *Cedula
 *pNombre
 *pApellido

 Datos del cliente:
 *idCedula
 *Nombre
 *Apellido
 *Direccion
 *Telefono
 *Correo

 datos del equipo:
 *idCodigo
 *nombre_e
 *fecha_ingre

 datos de revision:
*descrip_rev
*descrip_reemp
*presupuesto

datos que se guardan en la propia tabla de carta son:

-idCarta (autoincrementable)
-fecha_e
-total (siendo el mismo valor del presupuesto)
-Rev_idRev_equipo

SELECT e.Cedula,e.pNombre,e.pApellido,c.idCliente,c.Nombre,
c.Apellido,c.Direccion, c.Telefono, c.Correo, eq.idCodigo,
eq.nombre_e,eq.fecha_ingre,rev.descrip_rev,rev.descrip_reemp,
rev.presupuesto FROM empleado e,
cliente c,equipo eq,rev_equipo rev,carta ca WHERE 1;


SELECT e.Cedula,e.pNombre,e.pApellido,c.idCliente,c.Nombre,c.Apellido,c.Direccion, c.Telefono, c.Correo, eq.idCodigo,eq.nombre_e,eq.fecha_ingre,rev.descrip_rev,rev.descrip_reemp,rev.presupuesto FROM empleado e,cliente c,equipo eq,rev_equipo rev,carta ca WHERE 1; -->

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
            <label> Direccion</label>
            <td><?php echo $r->Direccion; ?></td>
         </div>
         
         <div class="form-group"> 
             <label>Telefono</label>
             <td><?php echo $r->Telefono; ?></td>
         </div>
         
         <div class="form-group"> 
            <label></label>
         </div>

         <div class="form-group"> 
            <label></label>
         </div>
         
         <div class="form-group"> 
            <label></label>
         </div>
         
         <div class="form-group"> 
            <label></label>
         </div>
         
         <div class="form-group"> 
            <label></label>
         </div>
         <td><?php echo $r->Correo; ?></td>
         <td><?php echo $r->idCodigo; ?></td>
         <td><?php echo $r->nombre_e; ?></td>
         <td><?php echo $r->fecha_ingre; ?></td>
         <td><?php echo $r->descrip_rev; ?></td>
         <td><?php echo $r->descrip_reemp; ?></td>
         <td><?php echo $r->presupuesto; ?></td>

     </tr>
 <?php endforeach; ?>