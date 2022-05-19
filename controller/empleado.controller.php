<?php
require_once 'model/empleado_m.php';
require_once 'model/usuario_m.php';
class EmpleadoController{
    
    private $model;
    private $model2;
    
    public function __CONSTRUCT(){
        $this->model = new Empleado();
        $this->model2 = new Usuario();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/empleado/empleado.php';
        require_once 'view/empleado/footer.php';
    }
    
    public function Crud(){
        $emple = new Empleado();
        
        if(isset($_REQUEST['id'])){
            $emple = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/empleado/empleado-editar.php';
        require_once 'view/empleado/footer.php';
    }
   public function Mostrar(){
    require_once 'view/header.php';
    require_once 'view/empleado/empleado2.php';
   } 

    public function Guardar(){
        $emple = new Empleado();
        
        $emple->idEmpleado = $_REQUEST['id'];
        $emple->Cedula = $_REQUEST['Cedula'];
        $emple->pNombre = $_REQUEST['pNombre'];
        $emple->sNombre = $_REQUEST['sNombre'];
        $emple->pApellido = $_REQUEST['pApellido'];
        $emple->sApellido = $_REQUEST['sApellido'];
        $emple->Fecha_nacimiento = $_REQUEST['Fecha_nacimiento'];
        $emple->Direccion = $_REQUEST['Direccion'];
        $emple->Genero = $_REQUEST['Genero'];
        $emple->telefono = $_REQUEST['telefono'];
        $emple->Cargo = $_REQUEST['Cargo'];
        
        $user = new Usuario();
        
        $user->id_usuario = $_REQUEST['id'];
        $user->nombre = $_REQUEST['pNombre'];
        $user->contraseña = $_REQUEST['Cedula'];
      //  $user->Empleado_idEmpleado = $_REQUEST['id'];

        $emple->idEmpleado > 0 
            ? $this->model->Actualizar($emple,$user)
            : $this->model->Registrar($emple,$user);
        
        header('Location: index.php?c=Empleado&a=Index');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        $this->model2->Eliminar($_REQUEST['id']);
        header('Location: index.php?c=Empleado&a=Index');
    }
}