<?php

require ('Models/conexion.php');

$con = new Conexion();

$usuario = $con->getUsers();
require ('Views/V_verUsuarios.php');

?>