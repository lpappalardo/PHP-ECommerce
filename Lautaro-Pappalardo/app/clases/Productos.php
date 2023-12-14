<?php
require_once 'Conexion.php';

class Productos{
    public $id;
    public $nombre;
    public $precio;
    public $descripcion;
    public $genero;
    public $paginas;
    public $autor;
    public $imagen;
    public $stock;
    public $isbn;
    public $formato;


    // MOSTRAR PRODUCTOS
    public function traer_catalogo(): array {
        $conexion = new Conexion(); 
        $db = $conexion->getConexion(); 
        $query = "SELECT * FROM productos"; 
        $stmt = $db->prepare($query);
        $stmt->execute(); 
  
        $catalogo = [];
  
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
           $productos = new self();
           $productos->id = $row['id'];
           $productos->nombre = $row['nombre'];
           $productos->precio = $row['precio'];
           $productos->descripcion = $row['descripcion'];
           $productos->genero = $row['genero'];
           $productos->paginas = $row['paginas'];
           $productos->autor = $row['autor'];
           $productos->imagen = $row['imagen'];
           $productos->stock = $row['stock'];
           $productos->isbn = $row['isbn'];
           $productos->formato = $row['formato'];
           $catalogo[] = $productos;
        }
  
        return $catalogo;
     }

    //  AGREGAR PRODUCTO A DB
     public function agregarProducto($nombre, $precio, $descripcion, $genero, $paginas, $autor, $imagen, $stock, $isbn, $formato) {
 
        $conexion = new Conexion();  
        $db = $conexion->getConexion();
     
        // Preparar la consulta INSERT
        $sql = "INSERT INTO productos (nombre, precio, descripcion, genero, paginas, autor, imagen, stock, isbn, formato) VALUES (:nombre, :precio, :descripcion, :genero, :paginas, :autor, :imagen, :stock, :isbn, :formato)";
     
        // Preparar la sentencia
        $stmt = $db->prepare($sql);
     
        // Asociar los valores de los parámetros
        $stmt->bindValue(':nombre', $nombre);
        $stmt->bindValue(':precio', $precio);
        $stmt->bindValue(':descripcion', $descripcion);
        $stmt->bindValue(':genero', $genero);
        $stmt->bindValue(':paginas', $paginas);
        $stmt->bindValue(':autor', $autor);
        $stmt->bindValue(':imagen', $imagen); 
        $stmt->bindValue(':stock', $stock);   
        $stmt->bindValue(':isbn', $isbn);
        $stmt->bindValue(':formato', $formato);
     
        // Ejecutar la consulta
        if ($stmt->execute() ) {
          // La inserción se realizó correctamente
          return true;
        } else {
          // Ocurrió un error durante la inserción
          return false;
        }
      }

    //ELIMINAR
    public function eliminarProducto($id) {
   
        $conexion = new Conexion();
        $db = $conexion->getConexion();
 
        // Preparar la consulta DELETE
        $sql = "DELETE FROM productos WHERE id = :id";
 
 
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id);
 
        // Ejecutar la consulta
        if ($stmt->execute()) {
        // La eliminación se realizó correctamente
            return true;
        } else {
        // Ocurrió un error durante la eliminación
        return false;
        }
    }

    // EDITAR PRODUCTO
    public function editarProducto($id,$nombre, $precio, $descripcion, $genero, $paginas, $autor, $stock, $isbn, $formato) {

        $conexion = new Conexion();
        $db = $conexion->getConexion();
     
        // Preparar la consulta UPDATE
        $sql = "UPDATE productos SET nombre = :nombre, precio = :precio, descripcion = :descripcion, genero = :genero, paginas = :paginas, autor = :autor, stock = :stock, isbn = :isbn, formato = :formato WHERE id = :id";
     
     
        $stmt = $db->prepare($sql);
     
        // Asociar los valores de los parámetros
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':nombre', $nombre);
        $stmt->bindValue(':precio', $precio);
        $stmt->bindValue(':descripcion', $descripcion);
        $stmt->bindValue(':genero', $genero);
        $stmt->bindValue(':paginas', $paginas);
        $stmt->bindValue(':autor', $autor);
        // $stmt->bindValue(':imagen', $imagen);
        $stmt->bindValue(':stock', $stock);
        $stmt->bindValue(':isbn', $isbn);
        $stmt->bindValue(':formato', $formato);

     
        // Ejecutar la consulta
        if ($stmt->execute()) {
           // La actualización se realizó correctamente
           return true;
        } else {
           // Ocurrió un error durante la actualización
           return false;
        }
     }

    // public function  traerOfertas() {

    //     $json = file_get_contents("../data/productos.json");
    //     $jsonData = json_decode($json);

    //     $ofertas = [];

    //     foreach ($jsonData as $value) {
    //         if($value->tieneDescuento){
    //             $producto = new self();
    //             $producto->id = $value->id;
    //             $producto->nombre = $value->nombre;
    //             $producto->precio = $value->precio;
    //             $producto->descripcion = $value->descripcion;
    //             $producto->genero = $value->genero;
    //             $producto->cantidadDePaginas = $value->cantidadDePaginas;
    //             $producto->autor = $value->autor;
    //             $producto->tieneDescuento = $value->tieneDescuento;
    //             $producto->porcentajeDescuento = $value->porcentajeDescuento;
    //             $producto->imagen = $value->imagen;
    //             $producto->stock = $value->stock;
    //             $producto->isbn = $value->isbn;
    //             $producto->formato = $value->formato;
    //             $producto->saga = $value->saga;
    //             $producto->sagaNumero = $value->sagaNumero;

    //             $ofertas[] = $producto;
    //         }
    //     }

    //     return $ofertas;
    // } 

    public function traer_producto($idProducto){
        $resultado = [];
        $catalogo = $this->traer_catalogo();
        foreach ($catalogo as $producto) {
           if($producto->id == $idProducto){
                $resultado[] = $producto;
           }
        }        
        return $resultado[0];
    
     }


     public function agregar_al_carrito($producto_id){

        $conexion = new Conexion();  
        $db = $conexion->getConexion();
  
        $query = "SELECT producto_id FROM carrito WHERE producto_id = :producto_id";
        $base = $db->prepare($query);
        $base->bindValue(':producto_id', $producto_id);
        $base->execute();
        $producto_existente = $base->fetch();
    
        if($producto_existente){
           echo 'Producto ya agregado al carrito';
  
           $update_query = "UPDATE carrito SET cantidad = cantidad + 1 WHERE producto_id = :producto_id";
           $stmt = $db->prepare($update_query);
           $stmt->bindValue(':producto_id', $producto_id);
  
           if ($stmt->execute()) {
           // La actualización se realizó correctamente
           return true;
        } else {
           // Ocurrió un error durante la actualización
           return false;
        }
        }else {
  
           // Preparar la consulta INSERT
        $sql = "INSERT INTO carrito (producto_id, cantidad) VALUES (:producto_id, :cantidad)";
  
        // Preparar la sentencia
        $stmt = $db->prepare($sql);
  
        // Asociar los valores de los parámetros
        $stmt->bindValue(':producto_id', $producto_id);
        $stmt->bindValue(':cantidad', 1);
        // $stmt->bindValue(':usuario_id', $usuario_id);
  
        // Ejecutar la consulta
        if ($stmt->execute()) {
        // La inserción se realizó correctamente
        return true;
        } else {
        // Ocurrió un error durante la inserción
        return false;
        }
     }
     
   }


 

    // public function recomendacionesProducto($idProducto){
    //     $productoElegido = $this->detalleDeProducto($idProducto);

    //     $json = file_get_contents("../data/productos.json");
    //     $jsonData = json_decode($json);

    //     $recomendaciones = [];
    //     $contador = 0;

    //     foreach ($jsonData as $value) {
    //         if($value->generoId == $productoElegido->generoId && $value->id != $idProducto && $contador < 6){
    //             $producto = new self();
    //             $producto->id = $value->id;
    //             $producto->nombre = $value->nombre;
    //             $producto->precio = $value->precio;
    //             $producto->descripcion = $value->descripcion;
    //             $producto->genero = $value->genero;
    //             $producto->generoId = $value->generoId;
    //             $producto->cantidadDePaginas = $value->cantidadDePaginas;
    //             $producto->autor = $value->autor;
    //             $producto->tieneDescuento = $value->tieneDescuento;
    //             $producto->porcentajeDescuento = $value->porcentajeDescuento;
    //             $producto->imagen = $value->imagen;
    //             $producto->stock = $value->stock;
    //             $producto->isbn = $value->isbn;
    //             $producto->formato = $value->formato;
    //             $producto->saga = $value->saga;
    //             $producto->sagaNumero = $value->sagaNumero;

    //             $recomendaciones[] = $producto;
    //             $contador++;
    //         }
    //     }

    //    return $recomendaciones;
    // }
}
?>