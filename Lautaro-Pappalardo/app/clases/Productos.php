<?php

class Productos{
    public $id;
    public $nombre;
    public $precio;
    public $descripcion;
    public $genero;
    public $generoId;
    public $cantidadDePaginas;
    public $autor;
    public $tieneDescuento;
    public $porcentajeDescuento;
    public $imagen;
    public $stock;
    public $isbn;
    public $formato;
    public $saga;
    public $sagaNumero;

    public function  traerCatalogo() {

        $json = file_get_contents("../data/productos.json");
        $jsonData = json_decode($json);

        $catalogo = [];

        foreach ($jsonData as $value) {
            $producto = new self();
            $producto->id = $value->id;
            $producto->nombre = $value->nombre;
            $producto->precio = $value->precio;
            $producto->descripcion = $value->descripcion;
            $producto->genero = $value->genero;
            $producto->generoId = $value->generoId;
            $producto->cantidadDePaginas = $value->cantidadDePaginas;
            $producto->autor = $value->autor;
            $producto->tieneDescuento = $value->tieneDescuento;
            $producto->porcentajeDescuento = $value->porcentajeDescuento;
            $producto->imagen = $value->imagen;
            $producto->stock = $value->stock;
            $producto->isbn = $value->isbn;
            $producto->formato = $value->formato;
            $producto->saga = $value->saga;
            $producto->sagaNumero = $value->sagaNumero;

            $catalogo[] = $producto;
        }

        return $catalogo;
    }

    public function  traerOfertas() {

        $json = file_get_contents("../data/productos.json");
        $jsonData = json_decode($json);

        $ofertas = [];

        foreach ($jsonData as $value) {
            if($value->tieneDescuento){
                $producto = new self();
                $producto->id = $value->id;
                $producto->nombre = $value->nombre;
                $producto->precio = $value->precio;
                $producto->descripcion = $value->descripcion;
                $producto->genero = $value->genero;
                $producto->cantidadDePaginas = $value->cantidadDePaginas;
                $producto->autor = $value->autor;
                $producto->tieneDescuento = $value->tieneDescuento;
                $producto->porcentajeDescuento = $value->porcentajeDescuento;
                $producto->imagen = $value->imagen;
                $producto->stock = $value->stock;
                $producto->isbn = $value->isbn;
                $producto->formato = $value->formato;
                $producto->saga = $value->saga;
                $producto->sagaNumero = $value->sagaNumero;

                $ofertas[] = $producto;
            }
        }

        return $ofertas;
    } 

    public function detalleDeProducto($idProducto) {
        $json = file_get_contents("../data/productos.json");
        $jsonData = json_decode($json);

        $productoElegido = [];

        foreach ($jsonData as $value) {
            if($value->id == $idProducto){
                $producto = new self();
                $producto->id = $value->id;
                $producto->nombre = $value->nombre;
                $producto->precio = $value->precio;
                $producto->descripcion = $value->descripcion;
                $producto->genero = $value->genero;
                $producto->generoId = $value->generoId;
                $producto->cantidadDePaginas = $value->cantidadDePaginas;
                $producto->autor = $value->autor;
                $producto->tieneDescuento = $value->tieneDescuento;
                $producto->porcentajeDescuento = $value->porcentajeDescuento;
                $producto->imagen = $value->imagen;
                $producto->stock = $value->stock;
                $producto->isbn = $value->isbn;
                $producto->formato = $value->formato;
                $producto->saga = $value->saga;
                $producto->sagaNumero = $value->sagaNumero;

                $productoElegido[] = $producto;
            }
        }

        return $productoElegido[0];
    }

    public function recomendacionesProducto($idProducto){
        $productoElegido = $this->detalleDeProducto($idProducto);

        $json = file_get_contents("../data/productos.json");
        $jsonData = json_decode($json);

        $recomendaciones = [];
        $contador = 0;

        foreach ($jsonData as $value) {
            if($value->generoId == $productoElegido->generoId && $value->id != $idProducto && $contador < 6){
                $producto = new self();
                $producto->id = $value->id;
                $producto->nombre = $value->nombre;
                $producto->precio = $value->precio;
                $producto->descripcion = $value->descripcion;
                $producto->genero = $value->genero;
                $producto->generoId = $value->generoId;
                $producto->cantidadDePaginas = $value->cantidadDePaginas;
                $producto->autor = $value->autor;
                $producto->tieneDescuento = $value->tieneDescuento;
                $producto->porcentajeDescuento = $value->porcentajeDescuento;
                $producto->imagen = $value->imagen;
                $producto->stock = $value->stock;
                $producto->isbn = $value->isbn;
                $producto->formato = $value->formato;
                $producto->saga = $value->saga;
                $producto->sagaNumero = $value->sagaNumero;

                $recomendaciones[] = $producto;
                $contador++;
            }
        }

       return $recomendaciones;
    }
}

//metodos
//public function filtroPorTema(etiquetas){}
//public function favoritos(){}
//public function comprar(){}
//public function agregar_al_carrito(){}
//public function quitar_del_carrito(){}
//public function pagos(){}
//public function detalledelregisto(){//mail - hsm - sms} 
//public function Recomendados(){//producto similar - a partir de etiquetas}
//public function listadoDeproductos_editar(){}
//public function listadoDeproductos_eliminar(){}
//public function listadoDeProductos_agregar(){}

?>