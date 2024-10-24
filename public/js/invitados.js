$(document).ready(function () {
    $('#tablaInvitados').load('listados/tablaInvitados.php');
});


function agregarInvitado() {
    $.ajax({
        type: "POST",
        data: $('#frmAgregarInvitado').serialize(),
        url: "../servidor/invitados/agregar.php",
        success: function (respuesta) {
            if (respuesta == 1) {
                $('#tablaInvitados').load('listados/tablaInvitados.php');
                $('#frmAgregarInvitado')[0].reset();
                Swal.fire({
                    title: 'Éxito!',
                    text: 'Agregado correctamente',
                    icon: 'success'
                });
            } else if (respuesta == 0) {
                Swal.fire({
                    title: 'Error!',
                    text: 'El documento ya está registrado.',
                    icon: 'error'
                });
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Falló con ' + respuesta,
                    icon: 'error'
                });
            }
        }
    });

    return false;
}

function agregarInvitadoi() {
    $.ajax({
        type: "POST",
        data: $('#frmAgregarInvitado').serialize(),
        url: "servidor/invitados/agregar.php",
        success: function (respuesta) {
            if (respuesta == 1) {
                $('#tablaInvitados').load('listados/tablaInvitados.php');
                $('#frmAgregarInvitado')[0].reset();
                Swal.fire({
                    title: 'Éxito!',
                    text: 'Agregado correctamente',
                    icon: 'success'
                });
            } else if (respuesta == 0) {
                Swal.fire({
                    title: 'Error!',
                    text: 'El documento ya está registrado.',
                    icon: 'error'
                });
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Falló con ' + respuesta,
                    icon: 'error'
                });
            }
        }
    });

    return false;
}


function eliminarInvitado(id_invitado) {
    Swal.fire({
        title: "¿Estás seguro de eliminar este invitado?",
        text: "!Una vez eliminado, no podrá ser recuperado!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "!Eliminar!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                data: 'id_invitado=' + id_invitado,
                url: "../servidor/invitados/eliminar.php",
                success: function (respuesta) {
                    if (respuesta == 1) {
                        $('#tablaInvitados').load('listados/tablaInvitados.php');
                        Swal.fire({
                            title: 'Éxito!',
                            text: 'Eliminado',
                            icon: 'success'
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Falló con ' + respuesta,
                            icon: 'error'
                        })
                    }
                }
            });
        }
    });
}

function editarInvitado(id_invitado) {
    $.ajax({
        type: "POST",
        url: "../servidor/invitados/editar.php",
        data: "id_invitado=" + id_invitado,
        success: function (respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#emailu').val(respuesta[0].email);
            $('#id_eventoe').val(respuesta[0].id_evento);
            $('#id_invitado').val(respuesta[0].id_invitado);
            $('#nombre_invitadou').val(respuesta[0].nombre_invitado);
            $('#documentou').val(respuesta[0].documento);
        }
    });
}

function actualizarInvitado() {
    $.ajax({
        type: "POST",
        data: $('#frmEditarInvitado').serialize(),
        url: "../servidor/invitados/actualizar.php",
        success: function (respuesta) {
            if (respuesta == 1) {
                $('#tablaInvitados').load('listados/tablaInvitados.php');
                Swal.fire({
                    title: 'Éxito!',
                    text: 'Actualizado correctamente',
                    icon: 'success'
                });
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Falló con ' + respuesta,
                    icon: 'error'
                });
            }
        }
    });
    return false;
}