<?php
require_once "../clases/Carritos.php";

// Crear una instancia de la clase Productos
$carrito = new Carritos();


if (isset($_POST['id'])) {
    // Obtener el ID del producto a eliminar
    $id = $_POST['id'];  

    if ($carrito->eliminar_carrito($id)) {
      // Eliminación exitosa
      echo "success";
    } else {
      // Ocurrió un error durante la eliminación
      echo "error";
    }
  }

?>