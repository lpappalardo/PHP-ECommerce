<section class="fondo-formulario" >
    <div class="formulario">
        <h2>Subscríbete para recibir ofertas y novedades</h2>
        <form action="envio.php" method="post">
            <div class="fomulario-elem">
                <label for="name">Nombre:*</label>
                <input type="text" name="name" id="name" placeholder="Nombre..." required>
            </div>
            <div class="fomulario-elem">
                <label for="apellido">Apellido:*</label>
                <input type="text" name="apellido" id="apellido" placeholder="Apellido..." required>
            </div>
            <div class="fomulario-elem">
                <label for="email">Email:*</label>
                <input type="email" name="email" id="email" placeholder="Email..." required>
            </div>
            <div class="fomulario-elem">
                <label for="asunto">Asunto:*</label>
                <input type="text" name="asunto" id="asunto" placeholder="Asunto..." required>
            </div>
            <div class="fomulario-elem">
                <label for="mensaje">Mensaje:*</label>
                <textarea name="mensaje" id="mensaje" placeholder="Mensaje..." required></textarea>
            </div>
            <button class="enviar" type="submit" name="submit">Enviar</button>
        </form>
    </div>
</section>