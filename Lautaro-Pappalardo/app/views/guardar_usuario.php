<?php
require_once "../clases/Usuarios.php";
$usuarios = new Usuarios();

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $email = $_POST['email'];

  // Crear una instancia de la clase Productos

  // Llamar a la función guardarProducto() para insertar el producto en la base de datos
  if ($usuarios->agregarUsuario($nombre, $apellido, $email, $direccion, $telefono)) {
    // La inserción se realizó correctamente+
    echo "success";
  } else {
    // Ocurrió un error durante la inserción
    echo "error";
  }

?>