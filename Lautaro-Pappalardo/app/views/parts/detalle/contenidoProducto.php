<?php

    require '../clases/Productos.php';

    $miObjeto = new Productos;


    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        $miProduco = $miObjeto->detalleDeProducto($product_id);

?>        
        <section class="container ">
        <div class="detalleProducto">
            <div class="detalleProducto-imagen">
                <img src="<?php echo $miProduco->imagen; ?>" alt="<?php echo $miProduco->nombre; ?>">
            </div>
            <div class="detalleProducto-contenido">

                <?php 
                    if(strlen($miProduco->saga) > 0){
                ?>
                    <h3><?php echo $miProduco->saga . ' #' . $miProduco->sagaNumero; ?></h3>
                <?php 
                    } 
                ?>

                <h2 class="detalleProducto-contenido-titulo"><?php echo $miProduco->nombre; ?></h2>
                <h3 class="detalleProducto-contenido-autor"><?php echo $miProduco->autor; ?></h3>

                <?php 
                            if($miProduco->tieneDescuento){
                        ?>

                            <?php 
                            $descuentoPrecio = $miProduco->precio * $miProduco->porcentajeDescuento;
                            $precioFinal = $miProduco->precio - $descuentoPrecio; 
                            ?>
                            <div class="row">
                                <p class="detalleProducto-contenido-precio"><?php echo '$' . $precioFinal; ?></p>
                                <p class="card-body-price-tachado"><?php echo '$' .  $miProduco->precio; ?></p>
                            </div>
                        <?php 
                            } else {
                        ?>
                            <h3 class="detalleProducto-contenido-precio"><?php echo '$' . $miProduco->precio; ?></h3>
                        <?php
                            }
                        ?>

                <h4 class="detalleProducto-contenido-titulo-descripcion">Descripcion</h4>
                <p class="detalleProducto-contenido-descripcion"><?php echo $miProduco->descripcion; ?></p>
                <div class="detalleProducto-contenido-elementos">
                    <div class="detalleProducto-contenido-elemento"><span class="detalleProducto-contenido-item">Genero: </span><span><?php echo $miProduco->genero; ?></span></div>
                    <div class="detalleProducto-contenido-elemento"><span class="detalleProducto-contenido-item">Cantidad de páginas: </span><span><?php echo $miProduco->cantidadDePaginas; ?></span></div>
                    <div class="detalleProducto-contenido-elemento"><span class="detalleProducto-contenido-item">ISBN: </span><span><?php echo $miProduco->isbn; ?></span></div>
                    <div class="detalleProducto-contenido-elemento"><span class="detalleProducto-contenido-item">Formato: </span><span><?php echo $miProduco->formato; ?></span></div>
                    <div class="detalleProducto-contenido-elemento"><span class="detalleProducto-contenido-item">Stock disponible: </span><span><?php echo $miProduco->stock; ?></span></div>
                </div>
                <div class="detalleProducto-buttons">
                    <button class="detalleProducto-button button-secundario2">Añadir a favoritos</button>
                    <button class="detalleProducto-button button-principal2">Añadir a carrito</button>
                </div>
            </div>
        </div>
    </section>
    <?php
    }
?>
