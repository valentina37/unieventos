<?php 
$select = $Invitados->selectEventos($_SESSION['id_usuario']);
?>

<!-- Modal -->
<form id="frmAgregarInvitado" onsubmit="return agregarInvitado()">
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
                    <button class="btn btn-danger">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>