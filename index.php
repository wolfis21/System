<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <?php require_once 'view/header.php'; ?>

    <div class="well well-sm text-right">
        <a class="btn btn-primary" href="home_empleado.php">Seccion Empleados</a>
        <a class="btn btn-primary" href="home_clientes.php">Seccion Clientes</a>
        <a class="btn btn-primary" href="home_equipo.php">Seccion Equipos</a>
        <a href="view/login/login.php">Iniciar Seccion</a>
    </div>

    <?php require_once 'view/footer.php'; ?>

</body>

</html>