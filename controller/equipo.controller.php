<?php
require_once 'model/equipo_m.php';
require_once 'model/cliente_m.php';
class EquipoController{
    
    private $model;
    
    
    public function __CONSTRUCT(){
        $this->model = new Equipo();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/equipo_v/equipo_vista.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $equi = new Equipo();
        $cli = new Cliente();

        $listare = $cli ->ListarCli();
        
        if(isset($_REQUEST['idEquipo'])){
            $equi = $this->model->Obtener($_REQUEST['idEquipo']);
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
        
        $equi->idEquipo = $_REQUEST['idEquipo'];
        $equi->idCodigo = $_REQUEST['idCodigo'];
        $equi->nombre_e = $_REQUEST['nombre_e'];
        $equi->descripcion = $_REQUEST['descripcion'];
        $equi->prev_diag = $_REQUEST['prev_diag'];
        $equi->fecha_ingre = $_REQUEST['fecha_ingre'];
        $equi->Cliente_idCliente = $_REQUEST['idCliente'];
        
        

        $equi->idEquipo > 0 
            ? $this->model->Actualizar($equi)
            : $this->model->Registrar($equi);
        
    require_once 'view/header.php';
    require_once 'view/equipo_v/equipo_vista.php';
    require_once 'view/equipo_v/footer.php';
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idEquipo']);
        require_once 'view/equipo/header.php';
        require_once 'view/equipo_v/equipo_vista.php';
        require_once 'view/equipo/footer.php';
    }
}