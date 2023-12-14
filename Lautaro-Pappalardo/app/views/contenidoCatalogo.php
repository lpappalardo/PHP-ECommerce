<?php 
    require '../clases/Productos.php';
    // require '../clases/Generos.php';

    $miObjeto = new Productos;
    $miCatalogo = $miObjeto->traer_catalogo();

    // $objetoGeneros = new Generos;
    // $misGeneros = $objetoGeneros->traerGeneros();

    // if(isset($_GET['genero_id'])){
    //     $genero_id = $_GET['genero_id'];


    //     if($genero_id != 1){
    //         function perteneceAGenero($productoSelecionado){
    //             $generoSelecionado = $_GET['genero_id'];

    //             return $productoSelecionado->generoId == $generoSelecionado;
    //         }
    
    //         $miCatalogo = array_filter($miCatalogo, "perteneceAGenero");
    //     }
    // }
?>
        <?php
        if(count($miCatalogo) < 1){
                    echo "<h2 class='aviso centrar'>Lo sentimos, en este momento no hay productos en el género seleccionado</h2>";
                    echo "<img class='img-noEncontrado' src='../../../../../Lautaro-Pappalardo/app/resources/img/messages/curious.jpg' alt='No se pudo encontrar'>";
                } else {
        ?>

        <div class="cards">
            <?php 
                    foreach( $miCatalogo as $producto){;
            ?>
                <div class="card">
                    <div class="card-img centrar">
                        <img src="../../../../../Lautaro-Pappalardo/app/resources/img/products/<?php echo basename($producto->imagen);?>" alt="<?php echo $producto->nombre; ?>">
                    </div>
                    <div class="card-body">
                        <h3 class="card-body-title"><?php echo $producto->nombre; ?></h3>
                        <p class="card-body-price"><?php echo '$' . $producto->precio; ?></p>
                        <div class="card-body-buttons">
                            <?php
                            echo '<button class="card-body-button button-principal button-cargar-producto" onclick="eliminarProducto(' . $producto->id . ')">Añadir a carrito</button>'
                            ?>
                            <!-- <button class="card-body-button button-principal button-cargar-producto">Añadir a carrito</button> -->
                            <button class="card-body-button button-secundario" onclick="window.location.href='detalle.php?product_id=<?php echo $producto->id ?>'">Ver más</button>
                        </div>
                    </div>
                </div>
            <?php
                };
            };
            ?>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

function eliminarProducto(id) {
  if (confirm("¿Estás seguro de que deseas cargar este producto al carrito?")) {
    $.ajax({
      type: "POST",
      url: "cargar_en_carrito.php",
      data: { id: id },
      success: function (response) {
        // Procesar la respuesta del servidor       
          // Eliminación exitosa
          alert("Producto agregado correctamente");
          // Actualizar la página o realizar alguna otra acción necesaria
          location.reload();  
 
      },
      error: function () {
        // Error de conexión u otro error en la solicitud AJAX
        alert("Error en la solicitud AJAX");
      }
      
    });
  }
  
}

</script>