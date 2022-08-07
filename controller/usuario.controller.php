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
        
        $user->nombre = $_REQUEST['pNombre'];
        $user->contrasena = $_REQUEST['Cedula'];
        $user->Empleado_idEmpleado = $_REQUEST['id'];

        require_once 'view/header.php';
        require_once 'view/home_gere.php';
    }
    public function Cerrar(){
        require_once 'index.php';
    }
    public function Entrar(){
        $user = new Usuario();
        
        $user->nombre = $_REQUEST['nombre'];
        $user->contrasena = $_REQUEST['contraseña'];
      
        $resp = $user->verificar($user);
        $gere = $user->definirGere($user->nombre);
        $tec =  $user->definirTec($user->nombre);
        $adm =  $user->definirAdm($user->nombre);

        // selected para direccionar interfaz por rol
   
        if($resp == true && $gere == true){
            
            //home para los casos de gerente
            require_once 'view/header.php';
            require_once 'view/home_gere.php';
        }else if ($resp == true && $tec == true){

            //home para los casos de tecnico
            require_once 'view/header.php';
            require_once 'view/home_tec.php';
        } else if ($resp == true && $adm == true){

            //home para los casos de administrador
            require_once 'view/header.php';
            require_once 'view/home_adm.php';
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