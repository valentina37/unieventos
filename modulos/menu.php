<!-- menú del sitio -->
<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/nav.css">
  <link rel="stylesheet" href="public/librerias/fontawesome-free-6.6.0-web/css/all.css">
  <link rel="stylesheet" href="public/librerias/datatables/datatables.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Exo+2:ital,wght@0,535;1,535&family=Fjalla+One&family=Signika:wght@300..700&display=swap"
    rel="stylesheet">

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light fondoNavbar static-top text-center">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="../public/img/logo.jpg" alt="..." height="40">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active colorLetra" aria-current="page" href="inicio.php">
              <i class="fa-solid fa-house-chimney-user"></i> Inicio
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active colorLetra" href="eventos.php">
              <i class="fa-solid fa-calendar-check"></i> Eventos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active colorLetra" href="listados.php">
              <i class="fa-solid fa-address-book"></i> Listar Invitados
            </a>
          </li>
          <li class="nav-item dropdown">
            <a style="color:red" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-circle-user"></i>
              <!-- Mostrar el nombre del usuario logueado -->
              <?php echo $_SESSION['usuario']; ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="../servidor/login/logout.php">
                  <i class="fa-solid fa-arrow-right-from-bracket"></i> Salir del sistema
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Agregar Bootstrap JS y dependencias si es necesario -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>