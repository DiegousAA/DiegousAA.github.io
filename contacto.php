<?php
$servername = "hcnfc"; // Servidor de la base de datos
$username = "root";  // Usuario de la base de datos
$password = "Yoriel206";  // Contraseña del usuario
$dbname = "forms";  // Nombre de la base de datos

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

// Preparar la sentencia SQL para insertar los datos en la tabla
$stmt = $conn->prepare("INSERT INTO mensajes (nombre, email, asunto, mensaje) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $email, $asunto, $mensaje);

// Ejecutar la sentencia y verificar si fue exitosa
if ($stmt->execute()) {
    echo "Nuevo registro creado con éxito";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar el statement y la conexión a la base de datos
$stmt->close();
$conn->close();

// Preparar el correo electrónico
$string = "El formulario ha sido respondido por " . $nombre . " /r/n ";
$string .= "Su email es " . $email . " /r/n ";
$string .= "El asunto es " . $asunto . " /r/n ";
$string .= "El mensaje es " . $mensaje . " /r/n ";

// Destinatario
$destinatario = 'schoolworldcompany@gmail.com';

// Enviar el correo electrónico
mail($destinatario, 'Nuevo mensaje del formulario de contacto', utf8_decode($string));

// Redirigir al usuario a la página de contacto
header('Location: index.html');
exit;

?>
