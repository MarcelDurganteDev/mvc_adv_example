<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View/Main/Index.php</title>
</head>

<body>

    <?php require "views/header.php"; ?>

    <!-- <h1><?php echo "Esta es la vista Views/Main/index.php" ?></h1> -->

    <div id="main">
        <h1>Seccion de Nuevo</h1>
        <!-- sends inputs to controllers/nuevo.php -->
        <form action="<?php echo constant("URL"); ?>nuevo/registrarAlumno" method="POST">

            <p>
                <label for="matricula">Matrícula</label><br>
                <input type="text" name="matricula" id="">
            </p>

            <p>
                <label for="nombre">Nombre</label><br>
                <input type="text" name="nombre" id="">
            </p>

            <p>
                <label for="apellido">Apellido</label><br>
                <input type="text" name="apellido" id="">
            </p>

            <p>
                <input type="submit" value="Registrar nuevo alumno">
            </p>

        </form>

    </div>

    <?php require "views/footer.php"; ?>

</body>

</html>