<?php 
        $misRecomendaciones = $miObjeto->recomendacionesProducto($product_id);

?>
<div class="ofertas container">
    <hr>
    <div class="encabezadoOfertas">
        <h3 class="Ofertas-titulo">Tambien podría gustarte</h3>
        <a href="../../../../../Lautaro-Pappalardo/app/views/productos.php" class="ofertas-link">Ver catálogo</a>
    </div>
</div>
<button class="pre-btn"><img src="../../../../../Lautaro-Pappalardo/app/resources/img/icons/arrow.png" alt="pre-btn"></button>
<button class="nxt-btn"><img src="../../../../../Lautaro-Pappalardo/app/resources/img/icons/arrow.png" alt="nxt-btn"></button>
<div class="slider">
    <?php 
        foreach($misRecomendaciones as $producto){;
    ?>
        <div class="card">
            <div class="card-img centrar">
                <?php
                    if($producto->tieneDescuento){
                        $descuentoAbsoluto = $producto->porcentajeDescuento * 100
                ?>
                    <span class="card-descuento"><?php echo '-' . $descuentoAbsoluto . '%' ?></span>
                <?php 
                    }
                ?>
                <img src="<?php echo $producto->imagen; ?>" alt="<?php echo $producto->nombre; ?>">
            </div>
            <div class="card-body">
                        <h3 class="card-body-title"><?php echo $producto->nombre; ?></h3>
                        <?php 
                            if($producto->tieneDescuento){
                        ?>

                            <?php 
                            $descuentoPrecio = $producto->precio * $producto->porcentajeDescuento;
                            $precioFinal = $producto->precio - $descuentoPrecio; 
                            ?>
                            <div class="row">
                                <p class="card-body-price"><?php echo '$' . $precioFinal; ?></p>
                                <p class="card-body-price-tachado"><?php echo '$' .  $producto->precio; ?></p>
                            </div>
                        <?php 
                            } else {
                        ?>
                            <p class="card-body-price"><?php echo '$' . $producto->precio; ?></p>
                        <?php
                            }
                        ?>
                <div class="card-body-buttons">
                    <button class="card-body-button button-principal">Añadir a carrito</button>
                    <button class="card-body-button button-secundario" onclick="window.location.href='detalle.php?product_id=<?php echo $producto->id ?>'">Ver más</button>
                </div>
            </div>
        </div>
    <?php
        };
    ?>
</div>
