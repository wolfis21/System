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

    public function Registrar(Lista $data)
	{
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

?>