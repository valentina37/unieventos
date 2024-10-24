<?php
require_once "Conexion.php";

class Invitado extends Conexion
{
    public function mostrarInvitados($id_usuario)
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT * FROM v_invitados WHERE id_usuario = '$id_usuario'";
        $respuesta = mysqli_query($conexion, $sql);
        return  mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
    }

    public function agregarInvitado($data)
{
    $conexion = Conexion::conectar();

    // Verificar si el documento ya existe
    $sqlVerificar = "SELECT id_invitado FROM t_invitados WHERE documento = ?";
    $queryVerificar = $conexion->prepare($sqlVerificar);
    $queryVerificar->bind_param('s', $data['documento']);
    $queryVerificar->execute();
    $resultado = $queryVerificar->get_result();

    if ($resultado->num_rows > 0) {
        // Si el documento ya está registrado
        return 0;  // Código para "Registro existente"
    } else {
        // Si no está registrado, agregar el invitado
        $sql = "INSERT INTO t_invitados (id_evento, nombre_invitado, documento, email) VALUES (?, ?, ?, ?)";
        $query = $conexion->prepare($sql);
        $query->bind_param('isss', $data['id_evento'], $data['nombre_invitado'], $data['documento'], $data['email']);

        // Intentar ejecutar la consulta
        if ($query->execute()) {
            return 1;  // Código para "agregado"
        } else {
            // Manejar el error de la consulta
            return -1;  // Código para "error"
        }
    }
}



    public function eliminarInvitado($id_invitado)
    {
        $conexion = Conexion::conectar();
        $sql = "DELETE FROM t_invitados WHERE id_invitado = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('i', $id_invitado);
        return $query->execute();
    }

    public function selectEventos($id_usuario)
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT * FROM t_eventos
                WHERE id_usuario = '$id_usuario'";
        $respuesta = mysqli_query($conexion, $sql);
        $select = '<label for="id_evento">Selecciona un evento</label>
                <select name="id_evento" id="id_evento" class="form-select" required>';

        while ($mostrar = mysqli_fetch_array($respuesta)) {
            $select .= '<option value=' . $mostrar['id_evento'] . '>' . $mostrar['evento'] .
                '</option>';
        }
        return $select .= '</select>';
    }

    public function editarInvitado($id_invitado)
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT * FROM t_invitados
                WHERE id_invitado = '$id_invitado'";
        $respuesta = mysqli_query($conexion, $sql);
        return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);
    }

    public function selectEventosi()
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT * FROM t_eventos";
        $respuesta = mysqli_query($conexion, $sql);
        $select = '<label for="id_evento">Selecciona un evento</label>
                <select name="id_evento" id="id_evento" class="form-select" required>';

        while ($mostrar = mysqli_fetch_array($respuesta)) {
            $select .= '<option value=' . $mostrar['id_evento'] . '>' . $mostrar['evento'] .
                '</option>';
        }
        return $select .= '</select>';
    }

    public function selectEventosEditar($id_usuario)
    {
        $conexion = Conexion::conectar();
        $sql = "SELECT * FROM t_eventos
                WHERE id_usuario = '$id_usuario'";
        $respuesta = mysqli_query($conexion, $sql);
        $select = '<label for="id_eventoe">Selecciona un evento</label>
                <select name="id_eventoe" id="id_eventoe" class="form-select" required>';

        while ($mostrar = mysqli_fetch_array($respuesta)) {
            $select .= '<option value=' . $mostrar['id_evento'] . '>' . $mostrar['evento'] .
                '</option>';
        }
        return $select .= '</select>';
    }

    public function actualizarInvitado($data)
    {
        $conexion = Conexion::conectar();
        $sql = "UPDATE t_invitados SET id_evento = ?,
                                        nombre_invitado = ?,
                                        documento = ?,
                                        email = ? 
                WHERE id_invitado = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param(
            'isisi',
            $data['id_evento'],
            $data['nombre_invitado'],
            $data['documento'],
            $data['email'],
            $data['id_invitado']
        );
        return $query->execute();
    }
}
