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

    <div id='main'>
        <h1 class='center'>Sección de Consulta</h1>

        <table  width='100%'>
            <thead class='center'>
                <tr>
                    <th>Matrícula</th>
                    <th>Nombre</th>
                    <th>Appelido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once 'models/alumno.php';
                // echo '<pre>';
                foreach ($this->alumnos as $row) {
                    $alumno = new Alumno();
                    $alumno = $row;
                ?>
                    <tr>
                        <td><?php echo $alumno->matricula; ?></td>
                        <td><?php echo $alumno->nombre; ?></td>
                        <td><?php echo $alumno->apellido; ?></td>
                        <td>
                            <a href="<?php echo constant('URL') . 'consulta/verAlumno/' . $alumno->matricula; ?>">Editar</a>
                        </td> <td>
                            <a href="<?php echo constant('URL') . 'consulta/eliminarAlumno/' . $alumno->matricula; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>


    </div>

    <?php require "views/footer.php"; ?>

</body>

</html>