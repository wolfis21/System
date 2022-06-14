<?php
require_once 'model/cliente_m.php';
require_once 'model/empleado_m.php';
class clienteController{

    private $model;
    private $model2;

    public function __CONSTRUCT(){
        $this->model = new Cliente();
        $this->model2 = new Empleado();
    }
 /////
 public function Index(){
    require_once 'view/cliente/header.php';
    require_once 'view/cliente/cliente.php';
    require_once 'view/cliente/footer.php';
}

public function Crud(){
    $emple = new Cliente();
    $asis = new Empleado();

    $listare = $asis ->ListarEm();
    // $datos['listare'] = $listare;
    // $this->view->show_source('cliente-editar.php',$datos);

    if(isset($_REQUEST['idCliente'])){
        $emple = $this->model->Obtener($_REQUEST['idCliente']);
    }
    
    require_once 'view/cliente/header.php';
    require_once 'view/cliente/cliente-editar.php';
    require_once 'view/cliente/footer.php';
}
public function Mostrar(){
require_once 'view/cliente/header.php';
require_once 'view/cliente/cliente2.php';

} 
//falta implementar
public function Buscar(){
    $emple = new Cliente();
     if(!empty($_POST)) {
        $valor = $_POST['buscar'];
        if (!empty($valor)){
            $where = "WHERE Nombre LIKE '%$valor%'";
$emple = $where;
$this->model->Buscar($emple);
             }
         } 

require_once 'view/cliente/header.php';
require_once 'view/cliente/cliente2.php';
    
}

    public function Guardar(){
        $emple= new Cliente();

    $emple->idCliente = $_REQUEST['idCliente'];
    $emple->idCedula = $_REQUEST['idCedula'];
    $emple->Nombre = $_REQUEST['Nombre'];
    $emple->Apellido= $_REQUEST['Apellido'];
    $emple->Direccion= $_REQUEST['Direccion'];
    $emple->Telefono= $_REQUEST['Telefono'];
    $emple->Correo= $_REQUEST['Correo'];
    $emple->Empleado_idEmpleado= $_REQUEST['idEmpleado'];

        $emple->idCliente > 0 
            ? $this->model->Actualizar($emple)
            : $this->model->Registrar($emple);
        
    require_once 'view/cliente/header.php';
    require_once 'view/cliente/cliente.php';
    require_once 'view/cliente/footer.php';
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        require_once 'view/cliente/header.php';
        require_once 'view/cliente/cliente.php';
        require_once 'view/cliente/footer.php';
    }
}
?>