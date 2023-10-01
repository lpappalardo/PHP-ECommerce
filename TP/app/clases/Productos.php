<?php

class Productos{
    public $id;
    public $nombre;
    public $precio;
    public $descripcion;
    public $genero;
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

}

//metodos
//public function detalleDeProducto(){};
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