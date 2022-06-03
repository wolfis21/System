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

    public function Guardar(){
        $emple = new Lista();
        
        $emple->idProducto = $_REQUEST['idProducto'];
        $emple->nombre_pieza = $_REQUEST['nombre_pieza'];
        $emple->precio = $_REQUEST['precio'];
        
        // arreglar condicional para que registre y a la vez actualice
        
        $emple->idProducto > 0 
            ? $this->model->Actualizar($emple)
            : $this->model->Registrar($emple);
        
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