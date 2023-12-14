<?php
require_once "../clases/Productos.php";

// Crear una instancia de la clase Productos
$productos = new Productos();

// Obtener los datos enviados desde el formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];
$genero = $_POST['genero'];
$paginas = $_POST['paginas'];
$autor = $_POST['autor'];
// $imagen = $_POST['imagen'];
$stock = $_POST['stock'];
$isbn = $_POST['isbn'];
$formato = $_POST['formato'];

// Llamar a la función guardarProducto() para insertar el producto en la base de datos

if ($productos->editarProducto($id,$nombre, $precio, $descripcion, $genero, $paginas, $autor, $stock, $isbn, $formato)) {
   // La inserción se realizó correctamente
   echo "Producto guardado correctamente";
} else {
   // Ocurrió un error durante la inserción
   echo "Error al guardar el producto";
}

?>