<?php
// Incluir la conexión a la base de datos
include('connexio.php');

// Verificar si se ha recibido un ID de estudiante
if (isset($_GET['id_estudiant'])) {
    $id_estudiant = $_GET['id_estudiant'];

    // Preparar la consulta SQL para eliminar el estudiante
    $sql = "DELETE FROM estudiants WHERE id_estudiant = ?";

    // Usar una sentencia preparada para evitar SQL Injection
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("i", $id_estudiant);  // "i" significa que el parámetro es un entero
        if ($stmt->execute()) {
            echo "Estudiant eliminat amb èxit!";
        } else {
            echo "Error al eliminar l'estudiant: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error en la consulta: " . $conexion->error;
    }
}

// Cerrar la conexión
$conexion->close();

// Redirigir de nuevo a la página de modificación
header('Location: plana_professors.php');
exit();
?>