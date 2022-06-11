 lo que debe de salir aca es:

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


SELECT e.Cedula,e.pNombre,e.pApellido,c.idCliente,c.Nombre,c.Apellido,c.Direccion, c.Telefono, c.Correo, eq.idCodigo,eq.nombre_e,eq.fecha_ingre,rev.descrip_rev,rev.descrip_reemp,rev.presupuesto FROM empleado e,cliente c,equipo eq,rev_equipo rev,carta ca WHERE 1;