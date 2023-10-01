<?php 
    require '../clases/Productos.php';

    $miObjeto = new Productos;

    $miCatalogo = $miObjeto->traerCatalogo();
?>
    <div class="cards container">
        <?php 
            foreach( $miCatalogo as $producto){;
        ?>
            <div class="card">
                <div class="card-img centrar">
                    <img src="<?php echo $producto->imagen; ?>" alt="<?php echo $producto->nombre; ?>">
                </div>
                <div class="card-body">
                    <h3 class="card-body-title"><?php echo $producto->nombre; ?></h3>
                    <p class="card-body-price"><?php echo '$' . $producto->precio; ?></p>
                    <div class="card-body-buttons">
                        <button class="card-body-button button-principal">Añadir a carrito</button>
                        <button class="card-body-button button-secundario">Ver más</button>
                    </div>
                </div>
            </div>
        <?php
            };
        ?>
    </div>
