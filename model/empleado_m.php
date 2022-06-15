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
	public function ListarGe()
	{
		try
		{
			$this->consulta = $this->pdo->prepare("SELECT * FROM empleado 
													WHERE Cargo = 'Gerente'");
            $this->consulta->execute();
            return $this->consulta;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public function ListarEm()
	{
		try
		{
			$this->consulta = $this->pdo->prepare("SELECT * FROM empleado 
													WHERE Cargo = 'Tecnico'");
            $this->consulta->execute();
            return $this->consulta;
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

	public function Buscar($where){
		try 
		{ 
			if(!empty($_POST)) {
				$valor = $_POST['buscar'];
				if (!empty($valor)){
					$where = "WHERE pNombre LIKE '%$valor%'";
					 }
				 }
				 $consulta = "SELECT * FROM empleado $where";
				 $resultado = $this->pdo->query($consulta);

				 return $resultado->fetchAll(PDO::FETCH_OBJ);
				 				 
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

	public function Actualizar(Empleado $data, Usuario $user)
	{
		$ver1 = "SELECT * FROM empleado WHERE Cedula = $data->Cedula";
		
		$query = $this->pdo->query($ver1);
		
			if($query->fetchAll(PDO::FETCH_ASSOC) == true){
				?>    
				<div>
				<br>
				<center><h1> ERROR!!</h1> </center>
				</div>
				<center>
				<h1>DATOS YA EXISTENTES</h1>
			   <br>
			   <h2>Vuelva a verificar la cedula</h2>
				<br>
				</center>
			<?php
			} else{
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

			 $sql22="UPDATE usuario SET nombre	=?, contraseña 	=? WHERE id_usuario =?";

			 $this->pdo->prepare($sql22)
			 		->execute(
						 array(
				 		$user->nombre,
				 		$user->contraseña,
						$user->id_usuario
					 )
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	}

	public function Registrar(Empleado $data, Usuario $user)
	{
		$ver1 = "SELECT * FROM empleado WHERE Cedula = $data->Cedula";
		
		$query = $this->pdo->query($ver1);
		
			if($query->fetchAll(PDO::FETCH_ASSOC) == true){
				?>    
				<div>
				<br>
				<center><h1> ERROR!!</h1> </center>
				</div>
				<center>
				<h1>DATOS YA EXISTENTES</h1>
			   <br>
			   <h2>Vuelva a registrar</h2>
				<br>
				</center>
			<?php
			} else{
		try 
		{

		$sql = "INSERT INTO empleado (Cedula, pNombre, sNombre, 
				pApellido, sApellido, Fecha_nacimiento, Direccion, Genero, telefono, Cargo) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$sql2 = "INSERT INTO usuario (nombre, contraseña, Empleado_idEmpleado) 
				 VALUES (?, ?,?)";

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
			//metodo para obtener el id autoincrementable 
			$id_emple = $this->pdo->lastInsertId();

		$this->pdo->prepare($sql2)
			->execute(
			   array(
				$user->nombre,
				$user->contraseña,
				$id_emple
			   )
		   );

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
		
		}
	}
}