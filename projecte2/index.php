<?php
    include('connexio.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Gestor de Notes i Activitats</title>
</head>

<body>
    <div class="container">
        <div class="box-login">
            <div class="boxes-login">
                <img src="images/box_login.png" alt="">
            </div>
            <div class="boxes-login">
                <div class="form-container">
                    <form action="">
                        <label for="nom">Usuari</label>
                        <input type="text" name="nom" id="nom">
                        <label for="password">Contrasenya</label>
                        <input type="password" name="password" id="password">
                        <button type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</body>

</html>