<?php

class Usuario{

    private $pdo;

    public $id_usuario;
    public $nombre;
    public $contrasena;
    public $Empleado_idEmpleado;


    public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

    public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM usuario");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	} 
	public function verificar($data){
			
		// $sql="SELECT * FROM usuario WHERE nombre='$nombre' AND contraseña='$contrasena'";
		// $query = $this->pdo->query($sql);
		
		// if($query){
		// 	return $query->fetchAll(PDO::FETCH_ASSOC);
		// }else{	
		//  return false;
		// }
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuario WHERE nombre=? AND contraseña=?");
			          
			$stm->execute(array(
				$data->nombre,
				$data->contrasena
							));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			return false;
			die($e->getMessage());
		}
	}
	public function definirGere($nombre) {

		$sql="SELECT Cargo FROM empleado WHERE pNombre = '$nombre' AND Cargo = 'Gerente'";
		$query = $this->pdo->query($sql);
		
		if($query){
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}else{	
		 return false;
		}
	}
	
	public function definirTec($nombre) {

		$sql="SELECT Cargo FROM empleado WHERE pNombre = '$nombre' AND Cargo = 'Tecnico'";
		$query = $this->pdo->query($sql);
		
		if($query){
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}else{	
		 return false;
		}
	}
	
	public function definirAdm($nombre) {

		$sql="SELECT Cargo FROM empleado WHERE pNombre = '$nombre' AND Cargo = 'Administrador'";
		$query = $this->pdo->query($sql);
		
		if($query){
			return $query->fetchAll(PDO::FETCH_ASSOC);
		}else{	
		 return false;
		}
	}
	public function Obtener($id_usuario)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuario WHERE id_usuario= ?");
			          
			$stm->execute(array($id_usuario));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id_usuario)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM usuario WHERE id_usuario = ?");			          

			$stm->execute(array($id_usuario));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

} 
 ?>
