<?php

class Equipo{

    private $pdo;

    public $idEquipo;
	public $idCodigo;
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
	public function Listarequi(){
		try
		{
			$this->consulta = $this->pdo->prepare("SELECT * FROM equipo");
            $this->consulta->execute();
            return $this->consulta;
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
						idCodigo		  = ?,
						nombre_e           = ?,
						descripcion        = ?, 
						prev_diag          = ?,
						fecha_ingre        = ?,
						Cliente_idCliente  = ?,
                        
				    WHERE idEquipo = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->idCodigo,
						$data->nombre_e,
                        $data->descripcion,
						$data->prev_diag, 
                        $data->fecha_ingre,
						$data->Cliente_idCliente
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
		$sql = "INSERT INTO equipo (idCodigo,nombre_e, descripcion, prev_diag, fecha_ingre, Cliente_idCliente) 
		        VALUES (?, ?, ?, ?, ?, ?)";


		$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->idCodigo,
                    $data->nombre_e,
                    $data->descripcion,
                    $data->prev_diag, 
                    $data->fecha_ingre,
                    $data->Cliente_idCliente
                )
			);
			

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

}