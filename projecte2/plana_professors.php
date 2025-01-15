<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
    <title>Plana Professors</title>
</head>

<body>
    <div class="container">
        <header>
            <div class="header">
                <ul class="header_ul">
                    <li><img src="images/img_session.png" alt=""></li>
                    <li>Estudiants</li>
                    <li>Importar CSV</li>
                    <li>Projectes</li>
                    <li>Activitats</li>
                </ul>
                <ul class="header_ul">
                    <li><button type="button">TANCAR SESSIÓ</button></li>
                </ul>
            </div>
        </header>
        <div id="crear-estudiant">
            <h2 id="crear-est-title">CREAR ESTUDIANT</h2>
            <form class="form-crear" method="POST" action="plana_professors.php">
                <div class="input-group">
                    <input type="text" name="nom" placeholder="Nom" required>
                    <input type="text" name="cognoms" placeholder="Cognoms" required>
                </div>
                <input type="email" name="correu_electronic" placeholder="Correu electrònic" class="email-input" required>
                <button type="submit" class="btn">CREAR ESTUDIANT</button>
                <a href="#" class="import-csv">Importar CSV</a>
            </form>
        </div>


        <?php
        include('connexio.php');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom = $_POST['nom'];
            $cognoms = $_POST['cognoms'];
            $correu = $_POST['correu_electronic'];

            $sql = "INSERT INTO estudiants (nom, cognoms, correu_electronic) VALUES (?, ?, ?)";

            if ($stmt = $conexion->prepare($sql)) {
                $stmt->bind_param("sss", $nom, $cognoms, $correu);

                if ($stmt->execute()) {
                    echo "Estudiant creat amb èxit!";
                } else {
                    echo "Error al crear l'estudiant: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Error en la consulta: " . $conexion->error;
            }
        }

        $conexion->close();
        ?>


        <!-- Sección para modificar estudiantes -->
        <h2>MODIFICAR ESTUDIANT</h2>
        <form action="modificar_estudiant.php" method="POST">
            <table class="student-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Cognoms</th>
                        <th>Correu Electrònic</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Conexión a la base de datos
                    include('connexio.php');

                    // Consultar los estudiantes desde la base de datos
                    $sql = "SELECT id_estudiant, nom, cognoms, correu_electronic FROM estudiants";
                    $result = $conexion->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                        <td><input type='text' name='nom_" . $row['id_estudiant'] . "' value='" . $row['nom'] . "' required></td>
                        <td><input type='text' name='cognoms_" . $row['id_estudiant'] . "' value='" . $row['cognoms'] . "' required></td>
                        <td><input type='email' name='correu_" . $row['id_estudiant'] . "' value='" . $row['correu_electronic'] . "' required></td>
                        <td><button type='button' class='delete-btn' data-id='" . $row['id_estudiant'] . "'>❌</button></td>
                    </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No hi ha estudiants per mostrar.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <button type="submit" class="btn">GUARDAR CANVIS</button>
        </form>

        <script>
            // Lógica para eliminar un estudiante
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    if (confirm('Estàs segur que vols eliminar aquest estudiant?')) {
                        // Enviar la petición para eliminar el estudiante
                        window.location.href = 'eliminar_estudiant.php?id_estudiant=' + id;
                    }
                });
            });
        </script>

        <div id="crear-item">
            <h2 id="crear-it-title">CREAR ÍTEM</h2>
            <form class="form-crear" method="POST" action="crear_item.php">
                <input type="text" name="nom" placeholder="Nom" required>

                <!-- Campo oculto para almacenar la ruta del icono seleccionado -->
                <input type="hidden" name="icona" id="icona" required>

                <div class="icon-grid">
                    <button type="button" class="icon-btn" data-icon="images/icon _coworking_.png">
                        <img src="images/icon _coworking_.png" alt="Icono 1">
                    </button>
                    <button type="button" class="icon-btn" data-icon="images/icon_users_.png">
                        <img src="images/icon_users_.png" alt="Icono 2">
                    </button>
                    <button type="button" class="icon-btn" data-icon="images/icon_users_develop_.png">
                        <img src="images/icon_users_develop_.png" alt="Icono 3">
                    </button>
                    <button type="button" class="icon-btn" data-icon="images/icon_users2.png">
                        <img src="images/icon_users2.png" alt="Icono 4">
                    </button>
                    <button type="button" class="icon-btn" data-icon="images/icon_users_.png">
                        <img src="images/icon_users_.png" alt="Icono 5">
                    </button>
                    <button type="button" class="icon-btn" data-icon="images/icon_People Carry_.png">
                        <img src="images/icon_People Carry_.png" alt="Icono 6">
                    </button>
                </div>
                <button type="submit" class="btn">CREAR ÍTEM</button>
            </form>
        </div>

        <script>
            // Añadir un evento para seleccionar el icono
            const iconButtons = document.querySelectorAll('.icon-btn');
            iconButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const iconPath = this.getAttribute('data-icon');
                    // Establecer el valor del input oculto con la ruta del icono seleccionado
                    document.getElementById('icona').value = iconPath;
                });
            });
        </script>

        <h2>MODIFICAR ÍTEM</h2>
        <form action="modificar_item.php" method="POST">
            <table class="student-table">
                <thead>
                    <tr>
                        <th>Icona</th>
                        <th>Nom</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Conexión a la base de datos
                    include('connexio.php');

                    // Consultar los ítems desde la base de datos
                    $sql = "SELECT id_item, nom, icona FROM items";
                    $result = $conexion->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td><img src='" . $row['icona'] . "' alt='Icono' style='width: 40px; height: 40px;'></td>
                                    <td><input type='text' name='nom_" . $row['id_item'] . "' value='" . $row['nom'] . "' required></td>
                                    <td><button type='button' class='delete-btn' data-id='" . $row['id_item'] . "'>❌</button></td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No hi ha ítems per mostrar.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <button type="submit" class="btn">GUARDAR CANVIS</button>
        </form>

        <script>
            // Lógica para eliminar un ítem
            const deleteButton = document.querySelectorAll('.delete-btn');
            deleteButton.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    if (confirm('Estàs segur que vols eliminar aquest ítem?')) {
                        // Enviar la petición para eliminar el ítem
                        window.location.href = 'eliminar_item.php?id_item=' + id;
                    }
                });
            });
        </script>

        <div id="crear-projecte">
            <h2 id="crear-pr-title">CREAR PROJECTE</h2>
            <form class="form-crear">
                <div class="input-group">
                    <input type="text" placeholder="Nom" required>
                    <select name="seleccionar-items" id="seleccionar-items">
                        <option value="">Seleccionar items</option>
                        <option value="">Treball en equip</option>
                        <option value="">Desenvolupament i disseny</option>
                        <option value="">Treball en equip</option>
                        <option value="">Desenvolupament i disseny</option>
                    </select>
                </div>
                <textarea name="descripcio" id="descripcio" placeholder="Descripció"></textarea>
                <div class="input-group">
                    <input type="date" required>
                    <input type="date" required>
                </div>
                <select name="seleccionar-estat" id="seleccionar-estat">
                    <option value="">Estat</option>
                    <option value="">Activat</option>
                    <option value="">Desactivat</option>
                </select>
                <button type="submit" class="btn">CREAR PROJECTE</button>
            </form>
        </div>
        <h2>MODIFICAR PROJECTE</h2>
        <table class="student-table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Descripció</th>
                    <th>Data inici</th>
                    <th>Data final</th>
                    <th>Estat</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Treball en equip</td>
                    <td>Treball en equip Treball en equip Treball en equip Treball en equip Treball en equip Treball en equip Treball en equip Treball en equip Treball en equip</td>
                    <td>10/01/2025</td>
                    <td>25/02/2025</td>
                    <td>Activa</td>
                    <td><button class="delete-btn">❌</button></td>
                </tr>
                <tr>
                    <td>Treball en equip</td>
                    <td>Treball en equip Treball en equip Treball en equip Treball en equip Treball en equip Treball en equip Treball en equip Treball en equip Treball en equip</td>
                    <td>10/01/2025</td>
                    <td>25/02/2025</td>
                    <td>Activa</td>
                    <td><button class="delete-btn">❌</button></td>
                </tr>
            </tbody>
        </table>
        <button class="btn">GUARDAR CANVIS</button>
        <div id="crear-activitat">
            <h2 id="crear-act-title">CREAR ACTIVITAT</h2>
            <form class="form-crear">
                <div class="input-group">
                    <input type="text" placeholder="Nom" required>
                    <select name="seleccionar-items" id="seleccionar-items">
                        <option value="">Seleccionar items</option>
                        <option value="">Treball en equip</option>
                        <option value="">Desenvolupament i disseny</option>
                        <option value="">Treball en equip</option>
                        <option value="">Desenvolupament i disseny</option>
                    </select>
                </div>
                <textarea name="descripcio" id="descripcio" placeholder="Descripció"></textarea>
                <div class="input-group">
                    <input type="date" required>
                    <input type="date" required>
                </div>
                <select name="seleccionar-estat" id="seleccionar-estat">
                    <option value="">Estat</option>
                    <option value="">Activat</option>
                    <option value="">Desactivat</option>
                </select>
                <button type="submit" class="btn">CREAR PROJECTE</button>
            </form>
        </div>
        <h2>MODIFICAR ACTIVITAT</h2>
        <table class="student-table">
            <thead>
                <tr>
                    <th>Icona</th>
                    <th>Nom</th>
                    <th>Estat</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="images/icon_users_develop_.png" alt=""></td>
                    <td>Desenvolupament i disseny</td>
                    <td>En curs</td>
                    <td><button class="delete-btn">❌</button></td>
                </tr>
                <tr>
                    <td><img src="images/icon_People Carry_.png" alt=""></td>
                    <td>Treball en equip</td>
                    <td>Finalitzada</td>
                    <td><button class="delete-btn">❌</button></td>
                </tr>
            </tbody>
        </table>
        <button class="btn">GUARDAR CANVIS</button>
    </div>
</body>

</html>