<?php
class Cliente
{
	private $pdo;
    
    public $idCliente;
	public $Nombre;
	public $Apellido;
    public $Direccion;
	public $Telefono;
    public $Correo;
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

			$stm = $this->pdo->prepare("SELECT * FROM cliente");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idCliente)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM cliente WHERE idCliente = ?");
			          
			          
			$stm->execute(array($idCliente));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idCliente)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM cliente WHERE idCliente = ?");			          

			$stm->execute(array($idCliente));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE cliente SET 
						idCedula			= ?,
						Nombre              = ?,
						Apellido            = ?, 
						Direccion           = ?,
						Telefono            = ?,
						Correos             = ?,
                        Empleado_idEmpleado = ?
						
				    WHERE idCliente = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->idCedula,
						$data->Nombre,
                        $data->Apellido,
						$data->Direccion, 
                        $data->Telefono,
						$data->Correo,
                        $data->Empleado_idEmpleado,
                        $data->idCliente
                        
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Cliente $data)
	{
		try 
		{
		$sql = "INSERT INTO cliente (idCedula,Nombre, Apellido, Direccion, Telefono, Correo, Empleado_idEmpleado) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";


		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->idCliente,
					$data->Nombre,
                    $data->Apellido,
					$data->Direccion, 
                    $data->Telefono,
					$data->Correo,
                    $data->Empleado_idEmpleado
                )
			);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}