<?php
require_once 'model/equipo.php';
require_once 'model/cliente.php';

class EquipoController{
    
    private $model;
    private $model2;
    
    public function __CONSTRUCT(){
        $this->model = new Equipo();
        $this->model2 = new Cliente();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/equipo_v/equipo_vista.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $emple = new Equipo();
        
        if(isset($_REQUEST['id'])){
            $emple = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/equipo_v/equipo_editar.php';
        require_once 'view/footer.php';
    }
   public function Mostrar(){
    require_once 'view/header.php';
    require_once 'view/equipo_v/equipo2.php';
   } 

    public function Guardar(){
        $equi = new Equipo();
        
        $equi->idEquipo = $_REQUEST['id'];
        $equi->nombre_e = $_REQUEST['nombre_e'];
        $equi->descripcion = $_REQUEST['descripcion'];
        $equi->prev_diag = $_REQUEST['prev_diag'];
        $equi->fecha_ingre = $_REQUEST['fecha_ingre'];
        $equi->Cliente_idCliente = $_REQUEST['Cliente_idCliente'];
        
        

        $equi->idEquipo > 0 
            ? $this->model->Actualizar($equi)
            : $this->model->Registrar($equi);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        $this->model2->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}