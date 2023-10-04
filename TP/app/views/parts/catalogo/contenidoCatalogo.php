<?php 
    require '../clases/Productos.php';
    require '../clases/Generos.php';

    $miObjeto = new Productos;
    $miCatalogo = $miObjeto->traerCatalogo();

    $objetoGeneros = new Generos;
    $misGeneros = $objetoGeneros->traerGeneros();

    if(isset($_GET['genero_id'])){
        $genero_id = $_GET['genero_id'];


        if($genero_id != 1){
            function perteneceAGenero($productoSelecionado){
                $generoSelecionado = $_GET['genero_id'];

                return $productoSelecionado->generoId == $generoSelecionado;
            }
    
            $miCatalogo = array_filter($miCatalogo, "perteneceAGenero");
        }
    }
?>
    <div class="container">
        <div class="menu-filtrado">
            <h3 class="menu-filtrado-titulo">Menú de filtrado</h3>
            <ul class="menu-filtrado-contenido centrar">
            <?php 
                foreach( $misGeneros as $genero){;
            ?>
                <li class="nav-item centrar menu-filtrado-contenido-item">
                    <a href="productos.php?genero_id=<?php echo $genero->id ?>" class="link" >
                    <?php echo $genero->nombre; ?>
                    </a>
                </li>
            <?php 
                };
            ?>
            </ul>
        </div>
        <div class="cards">
            <?php 
                foreach( $miCatalogo as $producto){;
            ?>
                <div class="card">
                    <div class="card-img centrar">
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
    </div>
