<?php

$servername = "localhost"; // Servidor de la base de datos
$username = "root";  // Usuario de la base de datos
$password = "Yoriel206+";  // Contraseña del usuario
$dbname = "forms;  // Nombre de la base de datos

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

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

$nombre = $_POST['nombre'];
$correo = $_POST['email'];
$asunto = $_POST['asunto'];
$text = $_POST['mensaje'];


//Formulario mandado a gmail

$string = "El formulario ha sido respondido por" . $nombre . " /r/n ";
$string .= "su email es" . $correo . " /r/n ";
$string .= "el asunto es" . $asunto . " /r/n ";
$string .= "el mensaje es" . $text . " /r/n ";

//Destinatario

$destinatario = 'schoolworldcompany@gmail.com';

mail( $destinatario, utf8_decode($string));
header('location:contacto.html')


?>
