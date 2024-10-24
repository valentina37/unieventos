<?php
require_once "clases/Conexion.php"; // Tu conexión a la base de datos
require_once "phpqrcode/qrlib.php"; // Incluir la librería PHP QR Code

class GenerarQR extends Conexion {

    function verificarYGenerarQR($documento) {
        $conexion = Conexion::conectar();

        if (!empty($documento)) {
            // Verificar si el documento está en la base de datos
            $sql = "SELECT id_invitado FROM t_invitados WHERE documento = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $documento);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows > 0) {
                // Documento encontrado, generar el código QR
                $url = "http://" . $_SERVER['HTTP_HOST'] . "/UniEventos/marcarAsistencia.php?documento=" . urlencode($documento);

                // Ruta para guardar temporalmente el QR
                $filename = tempnam(sys_get_temp_dir(), 'qr_') . '.png';

                // Generar el código QR
                QRcode::png($url, $filename, QR_ECLEVEL_H, 10, 2);

                // Leer el contenido del archivo generado
                $qrImageData = file_get_contents($filename);

                // Establecer los encabezados para forzar la descarga
                header('Content-Type: image/png');
                header('Content-Disposition: attachment; filename="codigo_qr_' . $documento . '.png"');
                header('Content-Length: ' . strlen($qrImageData));
                echo $qrImageData; // Enviar la imagen como respuesta

                // Eliminar el archivo temporal
                unlink($filename);
                exit; // Detener la ejecución del script aquí
            } else {
                echo "<p>El documento $documento no está registrado en la base de datos.</p>";
            }

            $stmt->close();
        } else {
            echo "<p>Por favor, ingrese un número de documento válido.</p>";
        }

        mysqli_close($conexion);
    }
}
?>