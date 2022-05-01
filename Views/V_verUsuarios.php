<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Users</title>
</head>
<link rel="stylesheet" type="text/css" href="../Resources/css/bootstrap.css">
<body>
    
<table>
    <thead>
        <tr>
            <td>ID_usuario</td>
            <td>Nombre</td>
            <td>Contraseña</td>
            <td>Empleado_IDEmpleado</td>
        </tr>
    </thead>
    <tbody>
        <?php

            foreach($usuario as $user){
                echo "<tr>";
                echo "<td>". $user['id_usuario']."</td>";
                echo "<td>". $user['nombre']."</td>";
                echo "<td>". $user['contraseña']."</td>";
                echo "<td>". $user['Empleado_idEmpleado']."</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
</body>
</html>