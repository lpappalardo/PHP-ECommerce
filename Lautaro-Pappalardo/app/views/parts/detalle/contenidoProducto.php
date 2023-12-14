<?php

    require '../clases/Productos.php';

    $miObjeto = new Productos;


    if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
        $miProduco = $miObjeto->traer_producto($product_id);

?>        
        <section class="container ">
        <div class="detalleProducto">
            <div class="detalleProducto-imagen">
                <img src="../../../../../Lautaro-Pappalardo/app/resources/img/products/<?php echo basename($miProduco->imagen); ?>" alt="<?php echo $miProduco->nombre; ?>">
            </div>
            <div class="detalleProducto-contenido">

                <h2 class="detalleProducto-contenido-titulo"><?php echo $miProduco->nombre; ?></h2>
                <h3 class="detalleProducto-contenido-autor"><?php echo $miProduco->autor; ?></h3>

                <h3 class="detalleProducto-contenido-precio"><?php echo '$' . $miProduco->precio; ?></h3>

                <h4 class="detalleProducto-contenido-titulo-descripcion">Descripcion</h4>
                <p class="detalleProducto-contenido-descripcion"><?php echo $miProduco->descripcion; ?></p>
                <div class="detalleProducto-contenido-elementos">
                    <div class="detalleProducto-contenido-elemento"><span class="detalleProducto-contenido-item">Genero: </span><span><?php echo $miProduco->genero; ?></span></div>
                    <div class="detalleProducto-contenido-elemento"><span class="detalleProducto-contenido-item">Cantidad de páginas: </span><span><?php echo $miProduco->paginas; ?></span></div>
                    <div class="detalleProducto-contenido-elemento"><span class="detalleProducto-contenido-item">ISBN: </span><span><?php echo $miProduco->isbn; ?></span></div>
                    <div class="detalleProducto-contenido-elemento"><span class="detalleProducto-contenido-item">Formato: </span><span><?php echo $miProduco->formato; ?></span></div>
                    <div class="detalleProducto-contenido-elemento"><span class="detalleProducto-contenido-item">Stock disponible: </span><span><?php echo $miProduco->stock; ?></span></div>
                </div>
                <div class="detalleProducto-buttons">
                    <button class="detalleProducto-button button-secundario2">Añadir a favoritos</button>
                    <?php
                        echo '<button class="detalleProducto-button button-secundario2" onclick="eliminarProducto(' . $miProduco->id . ')">Añadir a carrito</button>'
                    ?>
                    <!-- <button class="detalleProducto-button button-principal2">Añadir a carrito</button> -->
                </div>
            </div>
        </div>
    </section>
    <?php
    }
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

function eliminarProducto(id) {
  if (confirm("¿Estás seguro de que deseas cargar este producto al carrito?")) {
    $.ajax({
      type: "POST",
      url: "../../../../../Lautaro-Pappalardo/app/views/cargar_en_carrito.php",
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
