<?php
require_once "clases/Asistencias.php";

// Obtener el documento desde la URL o el formulario
$documento = isset($_GET['documento']) ? $_GET['documento'] : (isset($_POST['documento']) ? $_POST['documento'] : '');

$asistencia = new Asistencia;
$asistencia->registrarAsistencia($documento);
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="public/img/logo.jpg" type="image/x-icon"> <!-- Asegúrate de que la ruta sea correcta -->
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="public/css/login.css">
        <link rel="stylesheet" href="public/css/estilos.css">
        <link rel="stylesheet" href="public/css/index.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Exo+2:ital,wght@0,535;1,535&family=Fjalla+One&family=Signika:wght@300..700&display=swap" rel="stylesheet">
        <title>Marcar Asistencia</title>
    </head>

<body>
    <!-- <h1>Marcar Asistencia</h1>
    <div class="col-md-5">
        <h1 class="text-center mb-4">Marcar Asistencia</h1>
        <div class="card">
            <div class="card-body">
                <form action="marcarAsistencia.php" method="POST">
                    <div class="form-group">
                        <label for="documento">Ingrese su número de documento:</label>
                        <input type="text" name="documento" id="documento" class="form-control" placeholder="Número de documento" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Marcar Asistencia</button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
    <div class="container mt-5">
        <h1 class="text-center mb-4">Marcar Asistencia</h1>
        <div class="card">
            <div class="card-body">
                <form action="marcarAsistencia.php" method="POST">
                    <div class="form-group">
                        <label for="documento">Ingrese su número de documento:</label>
                        <input type="text" name="documento" id="documento" class="form-control" placeholder="Número de documento" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Marcar Asistencia</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>