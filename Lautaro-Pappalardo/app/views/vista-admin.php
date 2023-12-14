<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php
require_once "../clases/Productos.php";
// Obtener el catálogo de productos
$miObjeto = new Productos;
$Productos = $miObjeto->traer_catalogo();

require_once "../clases/Usuarios.php";
$miUsuario = new Usuarios;
$usuarios = $miUsuario->traer_usuarios();


// Generar la tabla HTML
echo '
<div class="adm-container">
<div class="container-button" id="agregarProducto">
<button class="card-body-button button-principal" id="agregarProducto">Agregar</button>
</div>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>nombre</th>
      <th>precio</th>
      <th>descripcion</th>
      <th>genero</th>
      <th>páginas</th>
      <th>autor</th>
      <th>imagen</th>
      <th>stock</th> 
      <th>isbn</th>
      <th>formato</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>';

foreach ($Productos as $producto) {
    echo '
    <tr>
      <td>' . $producto->id . '</td>
      <td>' . $producto->nombre . '</td>
      <td>' . $producto->precio . '</td>
      <td>' . $producto->descripcion . '</td>
      <td>' . $producto->genero . '</td>
      <td>' . $producto->paginas . '</td>
      <td>' . $producto->autor . '</td>
      <td>' . $producto->imagen . '</td>
      <td>' . $producto->stock . '</td>
      <td>' . $producto->isbn . '</td>
      <td>' . $producto->formato . '</td>
      <td>
      <button class="card-body-button2 button-principal editar-producto btn-adm2" data-id="' . $producto->id . '" data-imagen="' . $producto->imagen .'" data-nombre="' . $producto->nombre . '" data-precio="' . $producto->precio . '" data-descripcion="' . $producto->descripcion . '" data-genero="' . $producto->genero . '"data-paginas="' . $producto->paginas . '"data-autor="' . $producto->autor . '"data-stock="' . $producto->stock . '" data-isbn="' . $producto->isbn . '" data-formato="' . $producto->formato . '">Editar</button>
      <button class="card-body-button2 button-secundario btn-adm2"  onclick="eliminarProducto(' . $producto->id . ')">Eliminar</button>

      </td>
    </tr>';
}

echo '
  </tbody>
</table>
</div>';



echo '
<div class="adm-container"">
<div class="container-button" id="agregarUsuario">
<button class="card-body-button button-principal" id="agregarUsuario">Agregar Usuario</button>
</div>

<table>
  <thead>
    <tr>
      <th>id</th>
      <th>nombre</th>
      <th>apellido</th>
      <th>email</th>
      <th>telefono</th>
      <th>direccion</th>
    </tr>
  </thead>
  <tbody>';

foreach ($usuarios as $usuario) {
    echo '
    <tr>
      <td>' . $usuario->id . '</td>
      <td>' . $usuario->nombre . '</td>
      <td>' . $usuario->apellido . '</td>
      <td>' . $usuario->email . '</td>
      <td>' . $usuario->telefono . '</td>
      <td>' . $usuario->direccion . '</td>
    </tr>';
}

echo '
  </tbody>
</table>
</div>';

?>

<!-- Estilos CSS para el modal -->
<style>
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  position: absolute;
  background-color: white;
  margin: 10%;
  padding: 20px;
  width: 80%;
}

</style>


<!-- Modal Agregar Producto -->
<div id="modalAgregar" class="modal">
  <div class="modal-content">
    <button id="cerrarAgregar">x</button>
    <h2>Agregar Producto</h2>
    <form id="formularioAgregar">
      <input type="text" id="addnombre" name="addnombre" placeholder="Nombre">
      <input type="number" id="addprecio" name="addprecio" placeholder="Precio">
      <input type="text" id="adddescripcion" name="adddescripcion" placeholder="Descripción">
      <input type="text" id="addgenero" name="addgenero" placeholder="Género">
      <input type="number" id="addpaginas" name="addpaginas" placeholder="Páginas">
      <input type="text" id="addautor" name="addautor" placeholder="Autor">
      <input type="file" id="addimagen" name="addimagen" accept="image/*">
      <input type="number" id="addstock" name="addstock" placeholder="Stock">
      <input type="number" id="addisbn" name="addsisbn" placeholder="Isbn">
      <input type="text" id="addformato" name="addformato" placeholder="Formato">
          <button type="button" id="guardarProducto" name="guardar" >Guardar</button>
    </form>
  </div>
</div>

<script>

// Abrir modal para agregar producto
$(document).on('click', '#agregarProducto', function() {
  // Limpiar los campos del formulario
  $('#addnombre').val('');
  $('#addprecio').val('');
  $('#adddescripcion').val('');
  $('#addgenero').val('');
  $('#addpaginas').val('');
  $('#addautor').val('');
  $('#addimagen').val('');
  $('#addstock').val('');
  $('#addisbn').val('');
  $('#addformato').val('');

  // Mostrar el modal
  $('#modalAgregar').show();
});

$(document).on('click', '#cerrarAgregar', function() {
  // Mostrar el modal
  $('#modalAgregar').hide();
});

// Guardar producto

$(document).on('click', '#guardarProducto', function() {
  // Obtener los valores de los inputs
  var nombre = $('#addnombre').val();
  var precio = $('#addprecio').val();
  var descripcion = $('#adddescripcion').val();
  var genero = $('#addgenero').val();
  var paginas = $('#addpaginas').val();
  var autor = $('#addautor').val();
  var imagen = $('#addimagen').val();
  var stock = $('#addstock').val();
  var isbn = $('#addisbn').val();
  var formato = $('#addformato').val();

  // Crear un objeto con los datos a enviar al servidor
  var data = {
    nombre: nombre,
    precio: precio,
    descripcion: descripcion,
    genero: genero,
    paginas: paginas,
    autor: autor,
    imagen: imagen, 
    stock: stock,
    isbn: isbn,
    formato: formato,
  };

  console.log(data);
  // Realizar la solicitud AJAX para guardar el producto
  $.ajax({
    type: "POST",
    url: "guardar_producto.php",
    data: data,
    success: function(response) {
      // Procesar la respuesta del servidor    
        // Guardado exitoso
        alert("Producto agregado correctamente");
        // Actualizar 
        // location.reload();  
        $('#modalAgregar').hide();
        location.reload();
    },
    error: function() {
      // Error de conexión 
      alert("Error en la solicitud AJAX");
    }
  });
});

</script>

<script>

function eliminarProducto(id) {
  if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
    $.ajax({
      type: "POST",
      url: "eliminar_producto.php",
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

</script>

<!-- Modal para editar el producto -->
<div id="modalEditar" class="modal">
  <div class="modal-content">
    <button id="cerrarEditar">x</button>
    <h2>Editar Producto</h2>
    <form id="formularioEditar">

      <input type="text" id="editid" name="editid" placeholder="id">
      <input type="text" id="editnombre" name="editnombre" placeholder="Nombre">
      <input type="number" id="editprecio" name="editprecio" placeholder="Precio">
      <input type="text" id="editdescripcion" name="editdescripcion" placeholder="Descripción">
      <input type="text" id="editgenero" name="editgenero" placeholder="Género">
      <input type="number" id="editpaginas" name="editpaginas" placeholder="Páginas">
      <input type="text" id="editautor" name="editautor" placeholder="Autor">
      <!-- <input type="file" id="editimagen" name="editimagen" accept="image/*"> -->
      <input type="number" id="editstock" name="editstock" placeholder="Stock">
      <input type="number" id="editisbn" name="editisbn" placeholder="Isbn">
      <input type="text" id="editformato" name="editformato" placeholder="Formato">
      
      <button type="button" id="editarProducto" name="guardar" >Guardar</button>
    </form>
  </div>
</div>

<!-- EDITAR PRODUCTO -->
<script>
 // Función para abrir el modal de edición y rellenar los campos con los datos del producto
 $(document).on('click', '.editar-producto', function() {
  // Obtener los datos del atributo data del botón
  var id = $(this).data('id');
  var nombre = $(this).data('nombre');
  var precio = $(this).data('precio');
  var descripcion = $(this).data('descripcion');
  var genero = $(this).data('genero');
  var paginas = $(this).data('paginas');
  var autor = $(this).data('autor');
  // var imagen = $(this).data('imagen');
  var stock = $(this).data('stock');
  var isbn = $(this).data('isbn');
  var formato = $(this).data('formato');

  // Rellenar los campos del formulario con los datos del producto
  $('#editid').val(id);
  $('#editnombre').val(nombre);
  $('#editprecio').val(precio);
  $('#editdescripcion').val(descripcion);
  $('#editgenero').val(genero);
  $('#editpaginas').val(paginas);
  $('#editautor').val(autor);
  // $('#editimagen').val(imagen);
  $('#editstock').val(stock);
  $('#editisbn').val(isbn);
  $('#editformato').val(formato);

  // Mostrar el modal
  $('#modalEditar').show();
});

$(document).on('click', '#cerrarEditar', function() {
  // Mostrar el modal
  $('#modalEditar').hide();
});

// Función para guardar los cambios
// Controlador de eventos para el botón "Guardar"
$('#editarProducto').on('click', function() {
  // Obtener los valores de los campos del formulario
  var id = $('#editid').val();
  var nombre = $('#editnombre').val();
  var precio = $('#editprecio').val();
  var descripcion = $('#editdescripcion').val();
  var genero = $('#editgenero').val();
  var paginas= $('#editpaginas').val();
  var autor = $('#editautor').val();
  // var imagen = $('#editimagen').val();
  var stock =  $('#editstock').val();
  var isbn = $('#editisbn').val();
  var formato =  $('#editformato').val();


  // Crear un objeto con los datos a enviar al servidor
  var data = {
    id: id,
    nombre: nombre,
    precio: precio,
    descripcion: descripcion,
    genero: genero,
    paginas: paginas,
    autor: autor,
    // imagen: imagen,
    stock: stock,
    isbn: isbn,
    formato: formato
  };

console.log(data);
  // Enviar la solicitud AJAX al servidor
  $.ajax({
    url: 'editar_producto.php', // URL del script PHP que procesará la solicitud
    method: 'POST',
    data: data,
    success: function(response) {
      // La solicitud se ha completado con éxito  
     
      // Cerrar el modal
      $('#modalEditar').hide();
      location.reload();
    },
    error: function(xhr, status, error) {
      // Se produjo un error en la solicitud     
      console.error(error);
    }
  });
});

</script>

<div id="modalAgregarUsuario" class="modal">
  <div class="modal-content">
    <button id="cerrarAgregarUsuario">x</button>
    <h2>Agregar usuario</h2>
    <form id="formularioAgregar">
      <!-- Campos de edición -->
      <input type="text" id="addnombre" name="addnombre" placeholder="nombre">
      <input type="text" id="addapellido" name="addapellido" placeholder="apellido">
      <input type="text" id="addemail" name="addemail" placeholder="email">
      <input type="number" id="addtelefono" name="addtelefono" placeholder="telefono">
      <input type="text" id="adddireccion" name="adddireccion" placeholder="direccion">

      <button type="button" id="guardarUsuario" name="guardar" >Guardar</button>
    </form>
  </div>
</div>

<script>
  //boton para agregar un usuario
$(document).on('click', '#agregarUsuario', function() {
  // Limpiar los campos del formulario
  $('#addnombre').val('');
  $('#addapellido').val('');
  $('#addemail').val('');
  $('#addtelefono').val('');
  $('#adddireccion').val('');

  // Mostrar el modal
  $('#modalAgregarUsuario').show();
});

$(document).on('click', '#cerrarAgregarUsuario', function() {
  // Mostrar el modal
  $('#modalAgregarUsuario').hide();
});

$(document).on('click', '#guardarUsuario', function() {
  // Obtener los valores de los inputs
  var nombre = $('#addnombre').val();
  var apellido = $('#addapellido').val();
  var direccion = $('#addemail').val();
  var telefono = $('#addtelefono').val();
  var email = $('#adddireccion').val();

  // Crear un objeto con los datos a enviar al servidor
  var data = {
    nombre: nombre,
    apellido: apellido,
    telefono: telefono,
    direccion: direccion,
    email: email,
  };

  // Realizar la solicitud AJAX para guardar el producto
  $.ajax({
    type: "POST",
    url: "guardar_usuario.php",
    data: data,
    success: function(response) {
      // Procesar la respuesta del servidor    
        // Guardado exitoso
        alert("Usuario agregado correctamente");
        // Actualizar 
        location.reload();  
    },
    error: function() {
      // Error de conexión 
      alert("Error en la solicitud AJAX");
    }
  });
});
</script>