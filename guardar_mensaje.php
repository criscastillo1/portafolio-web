<?php
// Conexión a la base de datos
$host = 'localhost'; // Cambia esto si es necesario
$db = 'proyecto web final';
$user = 'root'; // Cambia esto si es necesario
$pass = ''; // Cambia esto si es necesario

$conn = new mysqli($host, $user, $pass, $db);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['name'];
$correo = $_POST['email'];
$mensaje = $_POST['message'];

// Preparar y ejecutar la consulta
$stmt = $conn->prepare("INSERT INTO mensajes (nombre, correo, mensaje) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $correo, $mensaje);

if ($stmt->execute()) {
    echo "Mensaje guardado correctamente.";
} else {
    echo "Error al guardar el mensaje: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
