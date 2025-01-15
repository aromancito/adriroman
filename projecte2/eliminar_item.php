<?php
// Incluir la conexión a la base de datos
include('connexio.php');

// Verificar si el parámetro 'id_item' está presente en la URL
if (isset($_GET['id_item'])) {
    $id_item = $_GET['id_item'];

    // Preparar la consulta SQL para eliminar el ítem
    $sql = "DELETE FROM items WHERE id_item = ?";

    // Usar una sentencia preparada para evitar SQL Injection
    if ($stmt = $conexion->prepare($sql)) {
        $stmt->bind_param("i", $id_item);  // "i" significa que el parámetro es un entero
        if ($stmt->execute()) {
            // Redirigir de nuevo a la página de modificación de ítems
            header('Location: modificar_item.php?success=true');
            exit();
        } else {
            echo "Error al eliminar l'ítem: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error en la consulta: " . $conexion->error;
    }
} else {
    echo "No s'ha proporcionat un ID d'ítem per eliminar.";
}

// Cerrar la conexión
$conexion->close();
?>