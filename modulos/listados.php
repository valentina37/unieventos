<?php
include "../clases/Invitados.php";
$Invitados = new Invitado();
include "header.php";
include "menu.php";
?>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card mt-3">
        <div class="card-body">
          <h2>Invitados</h2>
          <span class="btn btn-purple btn-lg fw-bold text-uppercase " data-bs-toggle="modal" data-bs-target="#modalAgregarInvitado">
            <i class="fa-solid fa-user-plus fs-3"></i> Nuevo Invitado
          </span>
          <hr>
          <div id="tablaInvitados"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include "footer.php";
include "listados/modalAgregarInvitado.php";
include "listados/modalEditarInvitado.php"
?>

<script src="../public/js/invitados.js"></script>