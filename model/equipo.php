<?php

class Equipo{

    private $pdo;

    public $idEquipo;
    public $nombre_e;
    public $descripcion;
    public $prev_diag;
    public $fecha_ingre;
    public $Cliente_idCliente;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM equipo");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

    public function Obtener($idEquipo)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM equipo WHERE idEquipo = ?");
			$stm->execute(array($idEquipo));

			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    public function Eliminar($idEquipo)
	{
		try 
		{
			$stm = $this->pdo->prepare("DELETE FROM equipo WHERE idEquipo = ?");			          

			$stm->execute(array($idEquipo));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE equipo SET 
						nombre_e           = ?,
						descripcion        = ?, 
						prev_diag          = ?,
						fecha_ingre        = ?,
						Cliente_idCliente  = ?,
                        
				    WHERE idEquipo = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->nombre_e,
                        $data->descripcion,
						$data->prev_diag, 
                        $data->fecha_ingre,
						$data->Cliente_idCliente,
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function Registrar(Equipo $data)
	{
		try 
		{
		$sql = "INSERT INTO equipo (idEquipo,nombre_e, descripcion, prev_diag, fecha_ingre, Cliente_idCliente) 
		        VALUES (?, ?, ?, ?, ?, ?)";


					// $sql3= "UPDATE usuario u JOIN empleado e on e.idEmpleado=u.Empleado_idEmpleado";

					// falta de registro de la clave foranea en la tabla de cliente

		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->idEquipo,
                    $data->nombre_e,
                    $data->descripcion,
                    $data->prev_diag, 
                    $data->fecha_ingre,
                    $data->Cliente_idCliente,
                )
			);
			
				// $this->pdo->prepare($sql3)->execute();

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

}