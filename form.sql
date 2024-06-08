CREATE DATABASE forms;

USE forms;

CREATE TABLE mensajes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(12) NOT NULL,
    email VARCHAR(60) NOT NULL,
    asunto ENUM('queja', 'comentario', 'duda') NOT NULL,
    mensaje TEXT NOT NULL
);

