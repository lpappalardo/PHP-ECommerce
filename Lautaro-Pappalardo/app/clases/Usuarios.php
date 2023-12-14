<?php
require_once 'Conexion.php';

class Usuarios {
 public $id;
 public $nombre;
 public $apellido;
 public $email;
 public $telefono;
 public $direccion;

//metodo
public function traer_usuarios(): array {
    $conexion = new Conexion(); 
    $db = $conexion->getConexion(); 
   
    $query = "SELECT * FROM usuarios"; 
    $stmt = $db->prepare($query);
    $stmt->execute(); 

    $usuarios = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       $usuario = new self();
       $usuario->id = $row['id'];
       $usuario->nombre = $row['nombre'];
       $usuario->apellido = $row['apellido'];
       $usuario->email = $row['email'];
       $usuario->telefono = $row['telefono'];
       $usuario->direccion = $row['direccion']; 
       $usuarios[] = $usuario;
    }

    return $usuarios;
 }

 public function agregarUsuario($nombre, $apellido, $email, $direccion, $telefono){

   $conexion = new Conexion();  
   $db = $conexion->getConexion();

   // Preparar la consulta INSERT
   $sql = "INSERT INTO usuarios (nombre, apellido, email, telefono, direccion) VALUES (:nombre, :apellido, :email, :telefono, :direccion)";

   // Preparar la sentencia
   $stmt = $db->prepare($sql);

   // Asociar los valores de los parámetros
   $stmt->bindValue(':nombre', $nombre);
   $stmt->bindValue(':apellido', $apellido);
   $stmt->bindValue(':direccion', $direccion);
   $stmt->bindValue(':telefono', $telefono);
   $stmt->bindValue(':email', $email);

   // Ejecutar la consulta
   if ($stmt->execute() ) {
     // La inserción se realizó correctamente
     return true;
   } else {
     // Ocurrió un error durante la inserción
     return false;
   }
 }

};

?>