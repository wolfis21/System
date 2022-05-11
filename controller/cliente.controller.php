<?php
require_once 'model/cliente_m.php';
class clienteController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new Cliente();
    }
 /////
 public function Index(){
    require_once 'view/cliente/header.php';
    require_once 'view/cliente/cliente.php';
    require_once 'view/cliente/footer.php';
}

public function Crud(){
    $emple = new Cliente();
    
    if(isset($_REQUEST['id'])){
        $emple = $this->model->Obtener($_REQUEST['id']);
    }
    
    require_once 'view/cliente/header.php';
    require_once 'view/cliente/cliente-editar.php';
    require_once 'view/cliente/footer.php';
}
public function Mostrar(){
require_once 'view/cliente/header.php';
require_once 'view/cliente/cliente2.php';
} 

    public function Guardar(){
        $emple= new Cliente();

    $emple->idCliente = $_REQUEST['idCliente'];
    $emple->$Nombre = $_REQUEST['Nombre'];
    $emple->$Apellido= $_REQUEST['Apellido'];
    $emple->$Direccion= $_REQUEST['Direccion'];
    $emple->$Telefono= $_REQUEST['Telefono'];
    $emple->$Correo= $_REQUEST['Correo'];
    $emple->$Empleado_idEmpleado= $_REQUEST['Empleado_idEmpleado'];

        $emple->idCliente > 0 
            ? $this->model->Actualizar($emple)
            : $this->model->Registrar($emple);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}
?>