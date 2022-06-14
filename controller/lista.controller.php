<?php
require_once 'model/lista_m.php';

class ListaController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new lista();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/lista/lista.php';
        require_once 'view/lista/footer.php';
    }

    public function Crud(){
        $emple = new Lista();
     
        if(isset($_REQUEST['idProducto'])){
            $emple = $this->model->Obtener($_REQUEST['idProducto']);
        }
        
        require_once 'view/header.php';
        require_once 'view/lista/lista-editar.php';
        require_once 'view/lista/footer.php';
    }

    public function Mostrar(){
        require_once 'view/header.php';
        require_once 'view/lista/lista2.php';
    }

    public function Buscar(){
        $emple = new Lista();
         if(!empty($_POST)) {
            $valor = $_POST['buscar'];
            if (!empty($valor)){
                $where = "WHERE nombre_pieza LIKE '%$valor%'";
    $emple = $where;
    $this->model->Buscar($emple);
                 }
             } 
    
             require_once 'view/header.php';
             require_once 'view/lista/lista2.php';
        
    }

    public function Guardar(){
        $emple = new Lista();
        
        $emple->idProducto = $_REQUEST['idProducto'];
        $emple->nombre_pieza = $_REQUEST['nombre_pieza'];
        $emple->precio = $_REQUEST['precio'];  

        $resp= $emple->Obtener($emple->idProducto);

        if ($resp == true){
            $this->model->Actualizar($emple);
        } else {
            $this->model->Registrar($emple);
        }
        
            require_once 'view/header.php';
            require_once 'view/lista/lista.php';
            require_once 'view/lista/footer.php';
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idProducto']);
        require_once 'view/header.php';
        require_once 'view/lista/lista.php';
        require_once 'view/lista/footer.php';
    }
}