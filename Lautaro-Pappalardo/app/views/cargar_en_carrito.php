<?php
require_once "../clases/Productos.php";

// Crear una instancia de la clase Productos
$productos = new Productos();

// Obtener los datos enviados desde el formulario
$producto_id = $_POST['id'];

// Llamar a la función guardarProducto() para insertar el producto en la base de datos

if ($productos->agregar_al_carrito($producto_id)) {
    echo "El update se realizó correctamente";
    } else {
   // Ocurrió un error durante la operación 
   echo "Error al guardar el producto";
}

?>

