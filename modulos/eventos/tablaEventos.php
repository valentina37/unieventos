<?php session_start();
$fecha = "";
if (isset($_GET['fecha'])) {
    $fecha = $_GET['fecha'];
}
include "../../clases/Eventos.php";
$Eventos = new Eventos();
$items = $Eventos->mostrarEventos($_SESSION['id_usuario'], $fecha);
?>

<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-sm table-hover" id="tablaEventosLoad">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Lugar</th>
                    <th>Descripción</th>
                    <th>Hora inicio</th>
                    <th>Hora fin</th>
                    <th>Fecha</th>
                    <th>Imprimir</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $key) : ?>
                    <tr>
                        <td><?php echo $key['evento'] ?></td>
                        <td><?php echo $key['lugar'] ?></td>
                        <td><?php echo $key['descripcion'] ?></td>
                        <td><?php echo $key['hora_inicio'] ?></td>
                        <td><?php echo $key['hora_fin'] ?></td>
                        <td><?php echo $key['fecha'] ?></td>
                        <td>
                            <?php
                            $invitados = $Eventos->hayInvitados($key['id_evento']);
                            if ($invitados > 0) {
                            ?>
                                <a href="../servidor/impresion_evento/imprimir_evento.php?id_evento=<?php echo $key['id_evento'] ?>"
                                    class="btn btn-info" target="_blank">
                                    <i class="fa-solid fa-print"></i> <span class="badge bg-secondary"><?php echo $invitados; ?></span>
                                </a>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                            <span class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEditarEvento"
                                onclick="editarEvento('<?php echo $key['id_evento'] ?>')">
                                <i class="fa-solid fa-sliders"></i>
                            </span>
                        </td>
                        <td>
                            <span class="btn btn-danger" onclick="eliminarEvento('<?php echo $key['id_evento'] ?>')">
                                <i class="fa-solid fa-calendar-xmark"></i>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tablaEventosLoad').DataTable({
            "language": {
                "url": "../public/librerias/datatables/Spanish.json"
            }
        });
    });
</script>
