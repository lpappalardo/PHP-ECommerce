<?php
require_once 'Conexion.php';

class Carritos{
    public $id;
    public $producto_id;
    public $cantidad;

    public function traer_carrito():array{

        $conexion = new Conexion(); 
            $db = $conexion->getConexion(); 
            $query = "SELECT * FROM carrito"; 
            $stmt = $db->prepare($query);
            $stmt->execute(); 
      
            $carrito = [];
      
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               $productos = new self();
               $productos->id = $row['id'];
               $productos->producto_id = $row['producto_id'];
               $productos->cantidad = $row['cantidad'];
               $carrito[] = $productos;
            }
      
            return $carrito;
     }
    
     //   eliminar productos del carrito

     public function eliminar_carrito($producto_id){


      $conexion = new Conexion();
      $db = $conexion->getConexion();

      $query = "DELETE FROM carrito WHERE producto_id = :producto_id";

      $stmt = $db->prepare($query);
      $stmt->bindValue(':producto_id', $producto_id);

      if ($stmt->execute()) {
     // La eliminación se realizó correctamente
     return true;
    } else {
     // Ocurrió un error durante la eliminación
      return false;
    }
    }

    public function vaciar_carrito(){

      $conexion = new Conexion();
      $db = $conexion->getConexion();

      $query = "DELETE FROM carrito";

      $stmt = $db->prepare($query);

      if ($stmt->execute()) {
     // La eliminación se realizó correctamente
      return true;
      } else {
     // Ocurrió un error durante la eliminación
      return false;
      }
    }

    public function traer_total(){

	    $conexion = new Conexion(); 
            $db = $conexion->getConexion(); 
            $query = "SELECT * FROM carrito"; 
            $stmt = $db->prepare($query);
            $stmt->execute(); 
      
            $carrito = [];
		        $total = 0;
      
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               $productos = new self();
               $productos->cantidad = $row['cantidad'];
               $carrito[] = $productos;
            }

            foreach($carrito as $producto){
              $total = $total + $producto->cantidad;
            } 
      
            return $total;
	    }

}