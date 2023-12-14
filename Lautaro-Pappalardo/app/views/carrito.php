<?php 
    require '../clases/Productos.php';


    $miProducto = new Productos;



    $miCarrito = $miObjeto->traer_carrito();
?>      

<?php
        if(count($miCarrito) < 1){
                    echo "<h2 class='aviso centrar'>Lo sentimos, en este momento no hay productos en el carrito</h2>";
                    echo "<img class='img-noEncontrado' src='../../../../../Lautaro-Pappalardo/app/resources/img/messages/curious.jpg' alt='ESta vacío'>";
                } else {
        ?>

<div class="container">
      <h2 class="carrito-titulo">Carrito</h2>
            <?php 
              $totalCarrito = 0;
                    foreach( $miCarrito as $producto){;
                        $miProductoSelecionado = $miProducto->traer_producto($producto->producto_id);
                        $totalCarrito = $totalCarrito + ($miProductoSelecionado->precio * $producto->cantidad);

            ?>
		<div class="elem-carrito">
			<img class="carrito-producto-imagen" src="../../../Lautaro-Pappalardo/app/resources/img/products/<?php echo basename($miProductoSelecionado->imagen); ?>" alt="<?php echo $miProductoSelecionado->nombre; ?>">
			<div>
				<h4>Nombre</h4>
				<p>
					<?php echo $miProductoSelecionado->nombre; ?>
				</p>
			</div>
			<div>
				<h4>Precio</h4>
				<p>
					<?php echo '$' . $miProductoSelecionado->precio;  ?>
				</p>
			</div>
			<div>
				<h4>Cantidad</h4>
				<p>
					<?php echo $producto->cantidad; ?>
				</p>
			</div>
      <div>
      <button class="card-body-button button-principal producto-eliminar" onclick="eliminarProductoCarrito(<?php echo $producto->producto_id ?>)">Eliminar</button>
      </div>	
      </div>			
            <?php
                };
                ?>
	   </div>         
		<div class="container">
		  <div class="elem-carrito-valores">
			  <div class="elem-carrito-valor">Precio Total: $<span class="carrito-valores-precio"><?php echo $totalCarrito ?></span></div>
			  <div class="elem-carrito-valor">Cantidad Total: <span class="carrito-valores-total"><?php echo $miObjeto->traer_total() ?></span></div>
		  </div>	
		<div class="elem-carrito-botones">
			<button id="carrito-eliminar" class="card-body-button button-secundario" onclick="vaciarProductosCarrito()">Vaciar Carrito</button>
			<button id="carrito-comprar" class="card-body-button button-principal" onclick="realizarCompra()">Comprar</a></button>
		</div>
    </div>
    <?php
            };
            ?>
	
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

function eliminarProductoCarrito(id) {
  if (confirm("¿Estás seguro de que deseas eliminar este producto del carrito?")) {
    $.ajax({
      type: "POST",
      url: "eliminar_de_carrito.php",
      data: { id: id },
      success: function (response) {
        // Procesar la respuesta del servidor       
          // Eliminación exitosa
          alert("Producto eliminado correctamente");
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

function vaciarProductosCarrito() {
  if (confirm("¿Estás seguro de que vaciar el carrito?")) {
    $.ajax({
      type: "POST",
      url: "vaciar_carrito.php",

      success: function (response) {
        // Procesar la respuesta del servidor       
          // Eliminación exitosa
          alert("Productos eliminados correctamente");
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

function realizarCompra() {
  if (confirm("¿Estás seguro de desea realizar la compra?")) {
    $.ajax({
      type: "POST",
      url: "vaciar_carrito.php",

      success: function (response) {
        // Procesar la respuesta del servidor       
          // Eliminación exitosa
          alert("Compra realizada correctamente");
          // Actualizar la página o realizar alguna otra acción necesaria
          window.location.href="../views/checkout_carrito.php"; 
 
      },
      error: function () {
        // Error de conexión u otro error en la solicitud AJAX
        alert("Error en la solicitud AJAX");
      }
      
    });
  }
  
}

</script>
