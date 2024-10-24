<?php
require_once 'clases/GenerarQR.php';

// Comprobamos si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['documento'])) {
    $documento = $_POST['documento'];
    $generarQR = new GenerarQR();
    $generarQR->verificarYGenerarQR($documento);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="public/img/logo.jpg" type="image/x-icon"> <!-- Asegúrate de que la ruta sea correcta -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="stylesheet" href="public/librerias/fontawesome-free-6.6.0-web/css/all.css">
    <link rel="stylesheet" href="public/librerias/datatables/datatables.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Exo+2:ital,wght@0,535;1,535&family=Fjalla+One&family=Signika:wght@300..700&display=swap" rel="stylesheet">
    <title>Generar Código QR</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mb-4">Generar Código QR</h1>
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="documento">Ingrese el número de documento:</label>
                                <input type="text" name="documento" id="documento" class="form-control" placeholder="Número de documento" required>
                            </div>
                            <br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-lg btn-purple btn-login text-uppercase fw-bold mb-2">Generar QR</button>
                                <span class="btn btn-lg btn-purple btn-login text-uppercase fw-bold mb-2" onclick="location.href='index.php'">
                                    volver
                                </span>
                            </div>
                        </form>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>