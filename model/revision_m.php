<?php

class Rev{

    private  $pdo;

    public $idRev_equipo;
    public $fecha_rev;
    public $descrip_rev;
    public $descrip_reemp;
    public $presupuesto;
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

			$stm = $this->pdo->prepare("SELECT * FROM rev_equipo, equipo WHERE idEquipo = Equipo_idEquipo");
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
	 
	public function Buscar($where){
		try 
		{ 
			if(!empty($_POST)) {
				$valor = $_POST['buscar'];
				if (!empty($valor)){
					$where = "WHERE nombre_e LIKE '%$valor%'";
					 }
				 }


				 $consulta = "SELECT * FROM rev_equipo INNER JOIN equipo ON idEquipo = Equipo_idEquipo $where";
				 $resultado = $this->pdo->query($consulta);

				 return $resultado->fetchAll(PDO::FETCH_OBJ);
				 				 
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
	public function Imprimir($data){
		try
		{
			$result = array();
			$consulta = $this->pdo->prepare("SELECT e.Cedula,e.pNombre,e.pApellido,c.idCedula,c.Nombre,c.Apellido,c.Direccion, c.Telefono, 
													c.Correo, eq.idCodigo,eq.nombre_e,eq.fecha_ingre,rev.fecha_rev,rev.descrip_rev,
													rev.descrip_reemp,rev.presupuesto 
													FROM empleado e,cliente c,equipo eq,rev_equipo rev
													 WHERE e.idEmpleado = c.Empleado_idEmpleado AND c.idCliente = eq.Cliente_idCliente AND
													 eq.idEquipo = rev.Equipo_idEquipo AND idRev_equipo = $data;");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
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