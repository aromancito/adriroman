<?php
// Incluir la conexión a la base de datos
include('connexio.php');

// Verificar si se han recibido datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    foreach ($_POST as $key => $value) {
        // Solo procesamos los campos que comienzan con 'nom_' (esto corresponde a los campos de los estudiantes)
        if (strpos($key, 'nom_') === 0) {
            // Obtener el ID del estudiante (se encuentra después de 'nom_')
            $id_estudiant = substr($key, 4);
            $nom = $_POST['nom_' . $id_estudiant];
            $cognoms = $_POST['cognoms_' . $id_estudiant];
            $correu = $_POST['correu_' . $id_estudiant];

            // Preparar la consulta SQL para actualizar los datos
            $sql = "UPDATE estudiants SET nom = ?, cognoms = ?, correu_electronic = ? WHERE id_estudiant = ?";

            // Usar una sentencia preparada para evitar SQL Injection
            if ($stmt = $conexion->prepare($sql)) {
                $stmt->bind_param("sssi", $nom, $cognoms, $correu, $id_estudiant);  // "sssi" significa que son 3 cadenas y 1 entero
                if ($stmt->execute()) {
                    echo "Canvis guardats amb èxit!";
                } else {
                    echo "Error al guardar els canvis: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Error en la consulta: " . $conexion->error;
            }
        }
    }
}

// Cerrar la conexión
$conexion->close();
?>