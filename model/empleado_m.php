<?php
class Empleado
{
	private $pdo;
    
    public $idEmpleado;
	public $Cedula;
    public $pNombre;
	public $sNombre;
    public $pApellido;
	public $sApellido;
    public $Fecha_nacimiento; 
	public $Direccion;
	public $Genero;
    public $telefono;
	public $Cargo;

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

			$stm = $this->pdo->prepare("SELECT * FROM empleado");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idEmpleado)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM empleado WHERE idEmpleado = ?");
			          

			$stm->execute(array($idEmpleado));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idEmpleado)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM empleado WHERE idEmpleado = ?");			          

			$stm->execute(array($idEmpleado));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE empleado SET 
						Cedula          = ?,
						pNombre          = ?, 
						sNombre          = ?,
						pApellido        = ?,
						sApellido        = ?,
                        Fecha_nacimiento = ?,
						Direccion        = ?,
						Genero            = ?, 
						telefono           	= ?,
						Cargo            = ?
				    WHERE idEmpleado = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->Cedula,
                        $data->pNombre,
						$data->sNombre, 
                        $data->pApellido,
						$data->sApellido,
                        $data->Fecha_nacimiento,
                        $data->Direccion,
                        $data->Genero,
						$data->telefono,
						$data->Cargo,
                        $data->idEmpleado
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Empleado $data, Usuario $user)
	{
		try 
		{
		$sql = "INSERT INTO empleado (Cedula, pNombre, sNombre, pApellido, sApellido, Fecha_nacimiento, Direccion, Genero, telefono, Cargo) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$sql2 = "INSERT INTO usuario (nombre, contraseña) 
				 VALUES (?, ?)";

					// $sql3= "UPDATE usuario u JOIN empleado e on e.idEmpleado=u.Empleado_idEmpleado";

					// falta de registro de la clave foranea en la tabla de users

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->Cedula,
					$data->pNombre,
					$data->sNombre, 
					$data->pApellido,
					$data->sApellido,
					$data->Fecha_nacimiento,
					$data->Direccion,
					$data->Genero,
					$data->telefono,
					$data->Cargo
                )
			);
			
		$this->pdo->prepare($sql2)
			->execute(
			   array(
				$user->nombre,
				$user->contraseña
				// $user->Empleado_idEmpleado 
			   )
		   );
		// $this->pdo->prepare($sql3)->execute();

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}