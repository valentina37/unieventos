<?php
require_once 'clases/Certificado.php';
// Obtener el documento desde el formulario o la URL
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $documento = isset($_POST['documento']) ? $_POST['documento'] : '';
    $certificado = new Certificado;
    $certificado->generarCertificado($documento);
}
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
    <title>Generar Certificado</title>
   
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Generar Certificado</h1>
        <form action="" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="documento" class="form-label">Ingrese su número de documento:</label>
                <input type="text" name="documento" id="documento" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-lg btn-purple btn-login text-uppercase fw-bold mb-2">Generar Certificado</button>
            <br>
            <a class="btn btn-lg btn-purple btn-login text-uppercase fw-bold mb-2" href="./index.php">Volver</a>
        </form>
    </div>

</body>

</html>