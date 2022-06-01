<?php
require_once 'model/proveedor_m.php';
require_once 'model/empleado_m.php';
class ProveedorController{
    
    private $model;
    private $model2;
    
    public function __CONSTRUCT(){
        $this->model2 = new Empleado();
        $this->model = new Proveedor();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/proveedor/proveedor.php';
        require_once 'view/proveedor/footer.php';
    }
    
    public function Crud(){
        $emple = new Proveedor();
        $asis = new Empleado();

        $listare = $asis ->ListarEm();

        if(isset($_REQUEST['idProveedores'])){
            $emple = $this->model->Obtener($_REQUEST['idProveedores']);
        }
        
        require_once 'view/header.php';
        require_once 'view/proveedor/proveedor-editar.php';
        require_once 'view/proveedor/footer.php';
    }
   public function Mostrar(){
    require_once 'view/header.php';
    require_once 'view/proveedor/proveedor2.php';
   } 

    public function Guardar(){
        $emple = new Proveedor();
        
        $emple->idProveedores = $_REQUEST['idProveedores'];
        $emple->nombre_empre = $_REQUEST['nombre_empre'];
        $emple->categoria = $_REQUEST['categoria'];
        $emple->direccion = $_REQUEST['direccion'];
        $emple->telefono = $_REQUEST['telefono'];
        $emple->Empleado_idEmpleado = $_REQUEST['idEmpleado'];
        
        $emple->idProveedores > 0 
            ? $this->model->Actualizar($emple)
            : $this->model->Registrar($emple);
        
            require_once 'view/header.php';
            require_once 'view/proveedor/proveedor.php';
            require_once 'view/proveedor/footer.php';
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idProveedores']);
        require_once 'view/header.php';
        require_once 'view/proveedor/proveedor.php';
        require_once 'view/proveedor/footer.php';
    }
}