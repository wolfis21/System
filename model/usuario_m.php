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
	} //falta desarrollar
	public function verificar($nombre, $contrasena){
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM usuario WHERE nombre= ? AND ");
			          

			$stm->execute(array($nombre,$contrasena));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
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

	public function Actualizar($data2)
	{
		try 
		{			
			 $sql22="UPDATE usuario SET nombre	=?, contraseña 	=? WHERE 1";

			 $this->pdo->prepare($sql22)
			 		->execute(
						 array(
				 		$data2->nombre,
				 		$data2->contraseña
					 )
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Registrar(Usuario $data)
	{
		try 
		{
		$sql = "INSERT INTO usuario (nombre, contraseña, Empleado_idEmpleado) 
		        VALUES (?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->nombre,
					$data->contrasena,
					$data->Empleado_idEmpleado
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

} 
 ?>
