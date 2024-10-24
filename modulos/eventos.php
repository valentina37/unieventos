<?php
include "header.php";
include "menu.php";
?>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mt-3">
        <div class="card-body">
          <h2>Listado de Eventos</h2>
          <div class="row">
            <div class="col">
              <span class="btn btn-lg btn-purple btn-login fw-bold text-uppercase" data-bs-toggle="modal" data-bs-target="#modalAgregarEvento">
                <i class="fa-regular fa-calendar-plus fs-3 "></i> Nuevo Evento
              </span>
            </div>
            <div class="col"></div>
            <div class="col">
              <div class="input-group mb-3">
                <input type="date" class="form-control" id="fechaBuscar">
                <span class="btn btn-purple" onclick="buscarPorFecha()">
                  <i class="fa-solid fa-magnifying-glass"></i> Buscar
                </span>
              </div>
            </div>
          </div>
          <hr>
          <div id="tablaEventos"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include "eventos/modalAgregarEvento.php";
include "eventos/modalEditarEvento.php";
include "footer.php";
?>

<script src="../public/js/eventos.js"></script>