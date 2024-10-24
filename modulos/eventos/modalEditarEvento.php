<form id="frmEditarEvento" onsubmit=" return actualizarEvento()">
    <!-- Modal -->
    <div class="modal fade" id="modalEditarEvento" tabindex="-1" aria-labelledby="modalEditarEventoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarEventoLabel">Editar Evento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <input type="text" id="id_evento" name="id_evento" hidden>
                    <label for="nombre_eventou">Nombre del Evento</label>
                    <input type="text" class="form-control" id="nombre_eventou" name="nombre_eventou" required>
                    <label for="lugaru">Lugar del Evento</label>
                    <input type="text" class="form-control" id="lugaru" name="lugaru" required>
                    <label for="descripcionu">Descripción del Evento</label>
                    <input type="text" class="form-control" id="descripcionu" name="descripcionu" required>
                    <label for="hora_iniciou">Hora Inicio</label>
                    <input type="time" class="form-control" id="hora_iniciou" name="hora_iniciou" required>
                    <label for="hora_finu">Hora Fin</label>
                    <input type="time" class="form-control" id="hora_finu" name="hora_finu" required>
                    <label for="fechau">Fecha</label>
                    <input type="date" class="form-control" id="fechau" name="fechau" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button class="btn btn-warning">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>