<?php
require_once 'model/database.php';
require_once 'view/header.php'; 

?>
<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Empleado&a=Index">Seccion Empleados</a>
    <a class="btn btn-primary" href="?c=Proveedor&a=Index">Seccion Proveedor</a>
    <a class="btn btn-primary" href="?c=Lista&a=Index">Seccion Lista</a>
    
</div>
<!-- nota: puede hacer la seccion de empleado (crud), seccion proveedores (crud)
operar la seccion entera de listas y gestiona usuarios por empleados -->


<h1 class="page-header"> GERENTE </h1>
<?php

if (isset($_REQUEST['c']) == 'Empleado') {
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func(array($controller, $accion));
}   else if (isset($_REQUEST['c']) == 'Proveedor') {

    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func(array($controller, $accion));
}   else if (isset($_REQUEST['c']) == 'Lista') {

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

?>

<!-- <div class="well well-sm text-center">
    <img src="https://us.123rf.com/450wm/pixelalex/pixelalex1602/pixelalex160200046/52881293-icono-servicio-de-inform%C3%A1tica-soporte-t%C3%A9cnico-servicio-de-reparaci%C3%B3n-de-equipo.jpg"/>
    </div> -->
<?php require_once 'view/footer.php'; ?>