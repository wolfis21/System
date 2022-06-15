<?php

class Proveedor{

    private $pdo;

    public $idProveedores;
    public $nombre_empre;
    public $categoria;
    public $direccion;
    public $telefono;
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

			$stm = $this->pdo->prepare("SELECT * FROM proveedores");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
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
			$this->consulta = $this->pdo->prepare('SELECT * FROM empleado');
            $this->consulta->execute();
            return $this->consulta;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

    public function Obtener($idProveedores)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM proveedores WHERE idProveedores = ?");
			          

			$stm->execute(array($idProveedores));
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
					$where = "WHERE nombre_empre LIKE '%$valor%'";
					 }
				 }
				 $consulta = "SELECT * FROM proveedores $where";
				 $resultado = $this->pdo->query($consulta);

				 return $resultado->fetchAll(PDO::FETCH_OBJ);
				 				 
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}

	}

	public function Eliminar($idProveedores)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM proveedores WHERE idProveedores = ?");			          

			$stm->execute(array($idProveedores));

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
     
    public function Actualizar($data){
		$ver1 = "SELECT * FROM proveedores WHERE nombre_empre = $data->nombre_empre";
		
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
			   <h2>Vuelva a verficar el nombre de la empresa</h2>
				<br>
				</center>
			<?php
			} else{
		try{
            $sql = "UPDATE proveedores SET 
                    nombre_empre        =?,
                    categoria           =?,
                    direccion           =?,
                    telefono            =?,
                    Empleado_idEmpleado =?
                    
                    WHERE idProveedores = ?";
        
        $this->pdo->prepare($sql)
        ->execute(
           array(
               $data->nombre_empre,
               $data->categoria,
               $data->direccion,
               $data->telefono, 
               $data->Empleado_idEmpleado,
               $data -> idProveedores
                )
            );
        }
        catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    }

    public function Registrar(Proveedor $data)
	{
		$ver1 = "SELECT * FROM proveedores WHERE nombre_empre = $data->nombre_empre";
		
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
		$sql = "INSERT INTO proveedores (nombre_empre, categoria,
				 direccion, telefono,Empleado_idEmpleado) 
		        VALUES (?, ?, ?, ?, ?)";


		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nombre_empre,
                    $data->categoria,
                    $data->direccion,
                    $data->telefono, 
                    $data->Empleado_idEmpleado     
                )
			);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	}
}