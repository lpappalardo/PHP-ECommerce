

<?php
if(isset($_POST['submit'])){
    $nombre = $_POST['name'];
    $apellido = $_POST['apellido'];
    $asunto = $_POST['asunto'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $mailTo = "lautaro.pappalardo@davinci.edu.ar";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $email". "\r\n";

    $cuerpo = "
    <html>
    <body>
    <div style='background-color: aliceblue; border: 2px darkblue solid; padding: 1rem'>
    <p>Recibiste un mail de: $nombre $apellido</p>
    <p>Mensaje: $mensaje</p>
    </div>
    </body>
    </html>
    ";

    mail($mailTo, $asunto, $cuerpo, $headers);

    header("Location: enviado.php");


}

?>