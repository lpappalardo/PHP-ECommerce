<?php 
    require "../clases/Carritos.php";;

    $miObjeto = new Carritos;
?>  

<header class="fondoPrincipal">
    <div class="encabezadoWeb container">
        <div class="logo">
            <a href="../../../../Lautaro-Pappalardo/app/views/home.php">
                <img src="../../../../Lautaro-Pappalardo/app/resources/img/icons/book.png" alt="logo">
                <h1 class="centrar">Tienda Libros</h1>
            </a>
        </div>
        <nav class="navegacion">
            <ul>
                <li class="nav-item centrar"><a class="nav-link" href="../../../../Lautaro-Pappalardo/app/views/home.php" >inicio</a></li>
                <li class="nav-item centrar"><a class="nav-link" href="../../../../Lautaro-Pappalardo/app/views/productos.php">catálogo</a></li>
                <li class="nav-item centrar"><a class="nav-link" href="../../../../Lautaro-Pappalardo/app/views/contacto.php">contacto</a></li>
                <li class="nav-item centrar"><a class="nav-link" href="../../../../Lautaro-Pappalardo/app/views/administradorProductos.php">administrador</a></li>
            </ul>
            <ul class="nav-secundaria">
                <li class="nav-item centrar corazon">
                    <img src="../../../../Lautaro-Pappalardo/app/resources/img/icons/heart.png" alt="Corazon">
                </li>
                <li class="nav-item centrar carrito">
                    <a href="../../../../Lautaro-Pappalardo/app/views/carritoDeCompras.php">
                        <img src="../../../../Lautaro-Pappalardo/app/resources/img/icons/cart.png" alt="Carrito">
                        <span class="carrito-cantidad"><?php echo $miObjeto->traer_total() ?></span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>