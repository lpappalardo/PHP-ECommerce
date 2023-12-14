<?php
require_once "../clases/Productos.php";
$productos = new Productos();
// Verificar si se recibieron los datos esperados

  // Obtener los datos del formulario
  $nombre = $_POST['nombre'];
  $precio = $_POST['precio'];
  $descripcion = $_POST['descripcion'];
  $genero = $_POST['genero'];
  $paginas = $_POST['paginas'];
  $autor = $_POST['autor'];
  $imagen = $_POST['imagen'];
  $stock = $_POST['stock'];
  $isbn = $_POST['isbn'];
  $formato = $_POST['formato'];
  // Crear una instancia de la clase Productos

  // Llamar a la función guardarProducto() para insertar el producto en la base de datos
  if ($productos->agregarProducto($nombre, $precio, $descripcion, $genero, $paginas, $autor, $imagen, $stock, $isbn, $formato)) {
    // La inserción se realizó correctamente
    echo "success";
  } else {
    // Ocurrió un error durante la inserción
    echo "error";
  }

?>