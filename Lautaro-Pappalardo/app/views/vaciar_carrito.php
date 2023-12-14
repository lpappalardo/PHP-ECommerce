<?php
require_once "../clases/Carritos.php";

// Crear una instancia de la clase Productos
$carrito = new Carritos();



    if ($carrito->vaciar_carrito()) {
      // Eliminación exitosa
      echo "success";
    } else {
      // Ocurrió un error durante la eliminación
      echo "error";
    }
  

?>