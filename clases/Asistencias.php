<?php
require_once "Conexion.php";
require_once 'vendor/autoload.php';


class Asistencia extends Conexion
{

    function registrarAsistencia($documento)
    {
        $conexion = Conexion::conectar();

        if (!empty($documento)) {
            // Consulta para verificar si el documento está en la tabla t_invitados y obtener el id_invitado y nombre_invitado
            $sql = "SELECT id_invitado, nombre_invitado FROM t_invitados WHERE documento = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $documento);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows > 0) {
                // Obtener el id_invitado y el nombre del invitado
                $invitado = $resultado->fetch_assoc();
                $id_invitado = $invitado['id_invitado'];
                $nombre = $invitado['nombre_invitado']; // Cambiado a 'nombre_invitado'

                // Obtener la fecha y hora actual
                $horaEntrada = date("Y-m-d H:i:s");
                $fechaEntrada = date("Y-m-d"); // Formato YYYY-MM-DD para la fecha

                $sqlInsert = "INSERT INTO t_asistencias (id_invitado, hora, fecha, nombre_invitado, asistio) 
                                VALUES (?, ?, ?, ?, ?)";
                $stmtInsert = $conexion->prepare($sqlInsert);
                $asistio = 1; // Asignar 1 para indicar que el invitado asistió
                $stmtInsert->bind_param("isssi", $id_invitado, $horaEntrada, $fechaEntrada, $nombre, $asistio); // Añadido el nombre
                $stmtInsert->execute();

                echo "<p>Asistencia registrada para $nombre (ID: $id_invitado) a las $horaEntrada del $fechaEntrada.</p>";
            } else {
                echo "<p>El documento $documento no está registrado como invitado.</p>";
            }
            $stmt->close();
        } else {
            echo "<p>No se proporcionó un documento válido.</p>";
        }

        mysqli_close($conexion);
    }
}
