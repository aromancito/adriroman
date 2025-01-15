<?php
// Incluir la conexión a la base de datos
include('connexio.php');

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nom = $_POST['nom'];
    $icona = $_POST['icona'];  // Ruta del ícono seleccionado

    // Preparar la consulta SQL para insertar los datos
    $sql = "INSERT INTO items (nom, icona) VALUES (?, ?)";

    // Usar una sentencia preparada para evitar SQL Injection
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("ss", $nom, $icona);  // "ss" significa que ambos parámetros son cadenas de texto

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Ítem creat amb èxit!";
        } else {
            echo "Error al crear l'ítem: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error en la consulta: " . $conexion->error;
    }
}

// Cerrar la conexión
$conexion->close();
?>