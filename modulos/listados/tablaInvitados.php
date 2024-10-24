<?php 
session_start();
include "../../clases/Invitados.php";
$Invitados = new Invitado();
$items = $Invitados->mostrarInvitados($_SESSION['id_usuario']);
?>

<div class="table-responsive">
    <table class="table table-sm table-hover" id="tablaInvitadosLoad">
        <thead>
            <tr>
                <th>Invitado</th>
                <th>Documento</th>
                <th>Email</th>
                <th>Evento</th>
                <th>Fecha</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $key) : ?>
                <tr>
                    <td><?php echo $key['nombre'] ?></td>
                    <td><?php echo $key['documento'] ?></td>
                    <td><?php echo $key['email'] ?></td>
                    <td><?php echo $key['nombreEvento'] ?></td>
                    <td><?php echo $key['fechaEvento'] ?></td>
                    <td>
                        <span class="btn btn-warning btn-sm" data-bs-toggle="modal"
                              data-bs-target="#modalEditarInvitado"
                              onclick="editarInvitado('<?php echo $key['idInvitado'] ?>')">
                            <i class="fa-solid fa-user-pen"></i>
                        </span>
                    </td>
                    <td>
                        <span class="btn btn-danger btn-sm" onclick="eliminarInvitado('<?php echo $key['idInvitado'] ?>')">
                            <i class="fa-solid fa-user-xmark"></i>
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#tablaInvitadosLoad').DataTable({
            "language": {
                "url": "../public/librerias/datatables/Spanish.json"
            },
            "responsive": true // Activar modo responsivo de DataTables
        });
    });
</script>
