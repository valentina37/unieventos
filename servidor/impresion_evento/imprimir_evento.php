<?php
include "../../clases/MetodosUtiles.php";
$Utiles = new MetodosUtiles();
$idObtenido = $_GET['id_evento'];

include_once "../../vendor/autoload.php";
use Dompdf\Dompdf;

$dompdf = new Dompdf();

// Obteniendo el contenido del HTML
$html = $Utiles->file_get_contents_curl("http://localhost/UniEventos/modulos/listado_invitados.php?id_evento=" . $idObtenido);

// Agregando estilos CSS
$css = '
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
';

// Inyectar el CSS al HTML antes de cargarlo en Dompdf
$html = $css . $html;

$dompdf->loadHtml($html);
$dompdf->render();

// Configuración para mostrar el PDF
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=Evento-UniEventos.pdf");

echo $dompdf->output();


?>