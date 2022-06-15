<?php

class Lista{

    private $pdo;

    public $idProducto;
    public $nombre_pieza;
    public $precio;

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

			$stm = $this->pdo->prepare("SELECT * FROM lista");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}

    }
    public function Obtener($idProducto)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM lista WHERE idProducto = ?");
			          

			$stm->execute(array($idProducto));
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
					$where = "WHERE nombre_pieza LIKE '%$valor%'";
					 }
				 }
				 $consulta = "SELECT * FROM lista $where";
				 $resultado = $this->pdo->query($consulta);

				 return $resultado->fetchAll(PDO::FETCH_OBJ);
				 				 
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}

	}

    public function Eliminar($idProducto)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM lista WHERE idProducto = ?");			          

			$stm->execute(array($idProducto));

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    public function Actualizar($data){
		$ver1 = "SELECT * FROM lista WHERE idProducto = $data->idProducto";
		
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
			   <h2>Vuelva a verificar el ID</h2>
				<br>
				</center>
			<?php
			} else{
		try{
            $sql = "UPDATE lista SET 
                    nombre_pieza        =?,
                    precio              =?
                    
                    WHERE idProducto = ?";
        
        $this->pdo->prepare($sql)
        ->execute(
           array(
               $data->nombre_pieza,
               $data->precio,
               $data -> idProducto
                )
            );
        }
        catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    }

    public function Registrar(Lista $data)
	{
		$ver1 = "SELECT * FROM lista WHERE idProducto = $data->idProducto";
		
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
		$sql = "INSERT INTO lista (idProducto, nombre_pieza, precio) 
		        VALUES (?, ?, ?)";


		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->idProducto,
                    $data->nombre_pieza,
                    $data->precio     
                )
			);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	}
}

?>