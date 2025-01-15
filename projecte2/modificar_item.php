<?php
// Incluir la conexión a la base de datos
include('connexio.php');

// Verificar si se han recibido datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $allChangesSuccess = true; // Variable para controlar si todos los cambios fueron exitosos
    
    // Recoger los datos de los inputs modificados
    foreach ($_POST as $key => $value) {
        // Solo procesamos los campos que comienzan con 'nom_' (esto corresponde a los campos de los ítems)
        if (strpos($key, 'nom_') === 0) {
            // Obtener el ID del ítem (se encuentra después de 'nom_')
            $id_item = substr($key, 4);
            $nom = $value;

            // Preparar la consulta SQL para actualizar los datos
            $sql = "UPDATE items SET nom = ? WHERE id_item = ?";

            // Usar una sentencia preparada para evitar SQL Injection
            if ($stmt = $conexion->prepare($sql)) {
                $stmt->bind_param("si", $nom, $id_item);  // "si" significa que el primer parámetro es una cadena y el segundo es un entero
                if (!$stmt->execute()) {
                    echo "Error al guardar els canvis per l'ítem ID $id_item: " . $stmt->error;
                    $allChangesSuccess = false; // Si hay error, marcar como false
                }
                $stmt->close();
            } else {
                echo "Error en la consulta: " . $conexion->error;
                $allChangesSuccess = false; // Si hay error en la consulta, marcar como false
            }
        }
    }

    // Si todo fue exitoso, redirigir al usuario
    if ($allChangesSuccess) {
        // Redirigir solo si no hubo errores
        header('Location: modificar_item.php?success=true');
        exit();
    }
}

// Cerrar la conexión
$conexion->close();
?>