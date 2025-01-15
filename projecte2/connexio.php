<html>
    <?php
        $servidor = "localhost";
        $usuario = "root";
        $password = "1234";
        $db = "gestio_projectes";

        // CONNEXIÓ

        $conexion = new mysqli($servidor, $usuario, $password, $db);

        if ($conexion->connect_error)
        {
            die("Connexió fallida: " . $conexion->connect_error);
        }
    ?>
</html>