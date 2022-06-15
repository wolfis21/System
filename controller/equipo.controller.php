<?php
require_once 'model/equipo_m.php';
require_once 'model/cliente_m.php';
require_once 'model/revision_m.php';
class EquipoController{
    
    private $model;
    private $model2;
    
    public function __CONSTRUCT(){
        $this->model = new Equipo();
        $this->model2 = new Rev();
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
    public function Crud2(){
        $equi = new Equipo();
        $rev = new Rev();
        
        $listare = $equi ->Listarequi();

        if(isset($_REQUEST['idEquipo'])){
            $equi = $this->model->Obtener($_REQUEST['idEquipo']);
        }

        require_once 'view/header.php';
        require_once 'view/equipo_v/revision/revision-editar.php';
        require_once 'view/footer.php';
    }
    public function Mostrar(){
        require_once 'view/header.php';
        require_once 'view/equipo_v/equipo2.php';
    }
    public function MostrarRev(){
        require_once 'view/header.php';
        require_once 'view/equipo_v/revision/revision-vista.php';
    } 
    public function Solicitar(){
        $rev = new Rev();
        
        if(isset($_REQUEST['idRev_equipo'])){
            $rev = $this->model2->Obtener($_REQUEST['idRev_equipo']);
         }
         require_once 'view/carta/carta.php';
       
    }

    public function Buscar(){
        $emple = new Rev();
         if(!empty($_POST)) {
            $valor = $_POST['buscar'];
            if (!empty($valor)){
                $where = "WHERE nombre_e LIKE '%$valor%'";
    $emple = $where;
    $this->model2->Buscar($emple);
                 }
             } 
    
             require_once 'view/header.php';
             require_once 'view/equipo_v/revision/revision-vista.php';
        
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

    public function Guardar2(){
        $rev = new Rev();
        $equi = new Equipo();

        $rev->idRev_equipo = $_REQUEST['idRev_equipo'];
        $rev->fecha_rev = $_REQUEST['fecha_rev'];
        $rev->descrip_rev = $_REQUEST['descrip_rev'];
        $rev->descrip_reemp = $_REQUEST['descrip_reemp'];
        $rev->presupuesto = $_REQUEST['presupuesto'];
        $rev->Equipo_idEquipo = $_REQUEST['idEquipo'];
        
    
        $rev->idRev_equipo > 0 
            ? $this->model2->Actualizar($rev)
            : $this->model2->Registrar($rev);
        
    require_once 'view/header.php';
    require_once 'view/equipo_v/equipo_vista.php';
    require_once 'view/equipo_v/footer.php';
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idEquipo']);
        
        require_once 'view/header.php';
        require_once 'view/equipo_v/equipo_vista.php';
        require_once 'view/equipo_v/footer.php';
    }
}