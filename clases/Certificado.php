<?php
require_once 'vendor/autoload.php';
require_once "clases/Conexion.php";

use Dompdf\Dompdf;
use Dompdf\Options;

class Certificado extends Conexion
{
    function generarCertificado($documento)
    {
        // Iniciar buffer de salida
        ob_start();

        $conexion = Conexion::conectar();

        if (!empty($documento)) {
            $sql = "SELECT i.nombre_invitado, i.documento, e.evento 
                        FROM t_invitados i 
                        JOIN t_eventos e ON i.id_evento = e.id_evento 
                        JOIN t_asistencias a ON i.id_invitado = a.id_invitado 
                        WHERE i.documento = ? AND a.asistio = 1;
                    ";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $documento);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows > 0) {
                $invitado = $resultado->fetch_assoc();
                $nombre_invitado = $invitado['nombre_invitado'];
                $nombre_evento = $invitado['evento'];

                // Ruta de la imagen
                $path = '../public/img/Certificado.png';
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

                // Crear el contenido HTML del certificado
                $html = "
                    <html>
                    <head>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                text-align: center;
                                margin: 0;
                            }
                            .certificado {
                                position: relative;
                                width: 800px;
                                height: 600px;
                                background-image: url('$base64');
                                background-size: cover;
                                color: #000;
                            }
                            h1 {
                                margin-top: 200px;
                                font-size: 50px;
                            }
                            h2 {
                                font-size: 40px;
                            }
                            h3 {
                                font-size: 30px;
                            }
                        </style>
                    </head>
                    <body>
                        <div class='certificado'>
                            <h1>Certificado de Asistencia</h1>
                            <h2>$nombre_invitado</h2>
                            <h3>Por haber asistido al evento:</h3>
                            <h3>$nombre_evento</h3>
                            <p>Gracias por tu participación.</p>
                        </div>
                    </body>
                    </html>
                ";

                // Configurar Dompdf con opciones
                $options = new Options();
                $options->set('isHtml5ParserEnabled', true);
                $options->set('isRemoteEnabled', true);
                $dompdf = new Dompdf($options);

                // Cargar el HTML en Dompdf
                $dompdf->loadHtml($html);

                // Establecer tamaño de papel
                $dompdf->setPaper('A4', 'landscape');

                // Renderizar el HTML a PDF
                $dompdf->render();

                // Limpiar el buffer de salida
                ob_end_clean();

                // Descargar el PDF
                $dompdf->stream("certificado_$nombre_invitado.pdf", array("Attachment" => true));
                exit;
            } else {
                echo "<script>alert('No se encontró el documento ingresado en la base de datos.');</script>";
            }
        } else {
            echo "<script>alert('Por favor ingrese un número de documento válido.');</script>";
        }
    }
}
