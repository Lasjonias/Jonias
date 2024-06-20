<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda_de_jabones";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$productos = $_POST['productos'];

foreach ($productos as $producto) {
    $nombre = $producto['nombre'];
    $descripcion = $producto['descripcion'];
    $precio = $producto['precio'];
    $imagen = $producto['imagen'];
    $cantidad = $producto['cantidad'];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen, cantidad) VALUES ('$nombre', '$descripcion', '$precio', '$imagen', '$cantidad')";
    if ($conn->query($sql) === TRUE) {
        echo "Producto guardado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>