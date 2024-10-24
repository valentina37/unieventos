<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
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


    <title>UniEventos</title>
</head>

<body>

    <!-- Encabezado -->
    <header class="text-white text-center py-3">
        <nav class="navbar navbar-expand-lg navbar-dark fondoNavbar static-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="loginAdmin.php">
                                <i class="fa-solid fa-right-to-bracket"></i> Iniciar Sesión
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <h1>Bienvenido a UniEventos</h1>
        <p>Inscríbete en uno de nuestros eventos sin necesidad de registrarte</p>
    </header>

    <div class="container my-5">
        <div class="row">
            <!-- Listado de eventos -->
            <?php
            include "clases/Eventos.php";
            $Eventos = new Eventos();
            $items = $Eventos->mostrarEventosi();
            ?>

            <table class="table table-responsive-sm table-hover" id="tablaEventosLoad">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Lugar</th>
                        <th>Descripción</th>
                        <th>Hora inicio</th>
                        <th>Hora fin</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $key) : ?>
                        <tr>
                            <td data-label="Nombre"><?php echo $key['evento'] ?></td>
                            <td data-label="Lugar"><?php echo $key['lugar'] ?></td>
                            <td data-label="Descripción"><?php echo $key['descripcion'] ?></td>
                            <td data-label="Hora inicio"><?php echo $key['hora_inicio'] ?></td>
                            <td data-label="Hora fin"><?php echo $key['hora_fin'] ?></td>
                            <td data-label="Fecha"><?php echo $key['fecha'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <?php
            require_once "clases/Invitados.php";
            $Invitados = new Invitado();
            $select = $Invitados->selectEventosi();
            ?>
            <div class="d-flex justify-content-between mt-3">
                <span class="btn btn-purple" data-bs-toggle="modal" data-bs-target="#modalAgregarInvitado">
                    ¡Quiero Registrarme!
                </span>
                <button class="btn btn-purple" onclick="location.href='generarQR.php'">
                    Descargar Entrada
                </button>
                <button class="btn btn-purple" onclick="location.href='marcarAsistencia.php'">
                    Marcar Asistencia
                </button>
                <button class="btn btn-purple" onclick="location.href='descargarCertificado.php'">
                    Descargar Certificado
                </button>
            </div>


            <!-- Modal -->
            <form id="frmAgregarInvitado" onsubmit="return agregarInvitadoi()">
                <div class="modal fade" id="modalAgregarInvitado" tabindex="-1" aria-labelledby="modalAgregarInvitadoLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalAgregarInvitadoLabel">Agregar Invitado</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php echo $select; ?>
                                <label for="nombre_invitado">Nombre del Invitado</label>
                                <input type="text" class="form-control" name="nombre_invitado" id="nombre_invitado" required>
                                <label for="documento">Documento del Invitado</label>
                                <input type="text" class="form-control" name="documento" id="documento" required>
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button class="btn btn-purple">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
        </div>
    </div>


    <script src="public/js/invitados.js"></script>
    <script src="public/librerias/jQuery-3.6.0/jquery-3.6.0.js"></script>
    <script src="public/librerias/datatables/datatables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
