<?php
    include('connexio.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/app.js"></script>
    <title>Plana Estudiants</title>
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
        <div class="estudiants_section">
            <h1>PLANA ESTUDIANTS</h1>
            <section class="projectes_est">
                <h2>PROJECTES</h2>
                <div class="projecte">
                    <div class="projecte_bx">
                        <h3>PROJECTE 1: Desenvolupar botiga virtual</h3>
                        <p>Desenvolupa una botiga virtual d'articles de moda.</p>
                        <p class="dates">23/11/2024 - 3/12/2025</p>
                    </div>
                    <button class="veure-activitats" onclick="veureActivitat1()">VEURE ACTIVITATS</button>
                </div>
                <div class="projecte">
                    <div class="projecte_bx">
                        <h3>PROJECTE 2: Desenvolupar web escola</h3>
                        <p>Desenvolupa un nou disseny per la web del centre.</p>
                        <p class="dates">3/2/2025 - 15/3/2025</p>
                    </div>
                    <button class="veure-activitats" onclick="veureActivitat2()">VEURE ACTIVITATS</button>
                </div>
                <div class="projecte">
                    <div class="projecte_bx">
                        <h3>PROJECTE 3: Projecte Final de Cicle</h3>
                        <p>Desenvolupa el projecte final de cicle.</p>
                        <p class="dates">18/3/2025 - 18/6/2025</p>
                    </div>
                    <button class="veure-activitats" onclick="veureActivitat3()">VEURE ACTIVITATS</button>
                </div>
            </section>
            </section>
        </div>
</body>

</html>