 <?php
    require_once 'model/database.php';
    require_once 'view/header.php';

    ?>
 <div class="well well-sm text-right">
     <a class="btn btn-primary" href="?c=Cliente&a=Index">Seccion Clientes</a>
     <a class="btn btn-primary" href="?c=Equipo&a=Index">Seccion Equipos</a>
     <a class="btn btn-primary" href="?c=Proveedor&a=Mostrar">Ver Proveedores</a>
     <a class="btn btn-primary" href="?c=Lista&a=Mostrar">Ver Lista</a>

 </div>

 <h1 class="page-header"> TECNICO </h1>
 <?php
    if (isset($_REQUEST['c']) == 'Cliente') {

        // Obtenemos el controlador que queremos cargar
        $controller = strtolower($_REQUEST['c']);
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

        // Instanciamos el controlador
        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller) . 'Controller';
        $controller = new $controller;

        // Llama la accion
        call_user_func(array($controller, $accion));
    } else if (isset($_REQUEST['c']) == 'Equipo') {

        // Obtenemos el controlador que queremos cargar
        $controller = strtolower($_REQUEST['c']);
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

        // Instanciamos el controlador
        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller) . 'Controller';
        $controller = new $controller;

        // Llama la accion
        call_user_func(array($controller, $accion));
    } else if (isset($_REQUEST['c']) == 'Proveedor') {

        // Obtenemos el controlador que queremos cargar
        $controller = strtolower($_REQUEST['c']);
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

        // Instanciamos el controlador
        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller) . 'Controller';
        $controller = new $controller;

        // Llama la accion
        call_user_func(array($controller, $accion));
    } else if (isset($_REQUEST['c']) == 'Lista') {

        // Obtenemos el controlador que queremos cargar
        $controller = strtolower($_REQUEST['c']);
        $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

        // Instanciamos el controlador
        require_once "controller/$controller.controller.php";
        $controller = ucwords($controller) . 'Controller';
        $controller = new $controller;

        // Llama la accion
        call_user_func(array($controller, $accion));
    }
