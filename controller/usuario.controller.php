 <?php
require_once 'model/usuario_m.php';

class UsuarioController{
    private $model;

    public function __CONSTRUCT(){
        $this->model = new Usuario();
    }

    public function Index(){
     require_once 'view/login/login.php';
    }
    public function Guardar(){
        $user = new Usuario();
        
        // $user->id_usuario = $_REQUEST['id'];
        $user->nombre = $_REQUEST['pNombre'];
        $user->contrasena = $_REQUEST['Cedula'];
        $user->Empleado_idEmpleado = $_REQUEST['id'];

        header('Location: index.php');
    }
    public function Entrar(){
        $user = new Usuario();
        
        // $user->id_usuario = $_REQUEST['id'];
        $user->nombre = $_REQUEST['nombre'];
        $user->contrasena = $_REQUEST['contraseña'];
       // $user->Empleado_idEmpleado = $_REQUEST['id'];
        
        $resp=$user->verificar($user->nombre, $user->contrasena);

        if($resp == true){
            header('location: index.php');
        } else{
        ?>
		<h1> ERROR!!</h1>
		</div>
		<h2>Contrasena y/o usuario son incorrectos o no existen!!</h2>
		<br>
		<form action="?c=Usuario&a=Entrar">
		<input type="submit" class="btn btn-primary" value="<--" id="btn">
		</form>
        <?php
        }
    }
}