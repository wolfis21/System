<?php

class Rev{

    private  $pdo;

    public $idRev_equipo;
    public $fecha_rev;
    public $descrip_rev;
    public $descrip_reemp;
    public $prepuesto;
    public $Equipo_idEquipo;
    
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

			$stm = $this->pdo->prepare("SELECT * FROM rev_equipo");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

    public function Obtener($idRev_equipo)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM rev_equipo WHERE idRev_equipo = ?");
			$stm->execute(array($idRev_equipo));

			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    public function Eliminar($idRev_equipo)
	{
		try 
		{
			$stm = $this->pdo->prepare("DELETE FROM equipo WHERE idRev_equipo = ?");			          

			$stm->execute(array($idRev_equipo));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE rev_equipo SET 
						fecha_rev		  = ?,
						descrip_rev           = ?,
						descrip_reemp        = ?, 
						presupuesto          = ?,
						Equipo_idEquipo  = ?,
                        
				    WHERE idRev_equipo = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
						$data->fecha_rev,
						$data->descrip_rev,
                        $data->descrip_reemp,
						$data->presupuesto, 
						$data->Equipo_idEquipo
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function Registrar(Rev $data)
	{
		try 
		{
		$sql = "INSERT INTO rev_equipo (fecha_rev,descrip_rev,descrip_reemp, presupuesto, Equipo_idEquipo) 
		        VALUES (?, ?, ?, ?, ?)";

// $id_equi = $this->pdo->lastInsertId();

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->fecha_rev,
                    $data->descrip_rev,
                    $data->descrip_reemp,
                    $data->presupuesto, 
                    $data->Equipo_idEquipo
                )
			);
			

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}