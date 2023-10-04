<?php 
    require '../clases/Productos.php';

    $miObjeto = new Productos;

    $misOfertas = $miObjeto->traerOfertas();
?>

<div class="ofertas container">
    <div class="encabezadoOfertas">
        <h3 class="Ofertas-titulo">Nuestras Ofertas</h3>
        <a href="../../../../../../PHP-ECommerce/TP/app/views/productos.php" class="ofertas-link">Ver catálogo</a>
    </div>
    <div class="cards">
        <?php 
            foreach($misOfertas as $producto){;
        ?>
            <div class="card">
                <div class="card-img centrar">
                    <img src="<?php echo $producto->imagen; ?>" alt="<?php echo $producto->nombre; ?>">
                </div>
                <div class="card-body">
                    <h3 class="card-body-title"><?php echo $producto->nombre; ?></h3>
                    <p class="card-body-price-tachado"><?php echo '$' .  $producto->precio; ?></p>
                    <?php 
                        $descuentoPrecio = $producto->precio * $producto->porcentajeDescuento;
                        $precioFinal = $producto->precio - $descuentoPrecio; 
                    ?>
                    <p class="card-body-price"><?php echo '$' . $precioFinal; ?></p>
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
</div>