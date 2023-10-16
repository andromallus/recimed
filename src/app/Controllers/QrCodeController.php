<?php

namespace App\Controllers;

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use TCPDF;
use App\Models\Recetas;
use App\Models\Medicamentos;


//use vendor;



class QrCodeController extends BaseController
{

    public function generatePdf()
    {

        $recetas = new Recetas();
        $datos = $recetas->ultima();

        $medicamentos = new medicamentos();

        $lista = $medicamentos->ultima();


        foreach($lista as $m){

            $nombre_m = $m->nombre;
            $tipo = $m->tipo;
            $dosis = $m->dosis;


        }



        $datos = (array) $datos;

        $nombre = $datos[0]->nombre;
        $primer_apellido = $datos[0]->primer_apellido;
        $segundo_apellido = $datos[0]->segundo_apellido;
        $edad = $datos[0]->edad;
        $diagnostico = $datos[0]->diagnostico;
        $medico = $datos[0]->medico_prescriptor;
        $numero_receta = $datos[0]->numero_receta;




        //var_dump($nombre);


        $renderer = new ImageRenderer(
            new RendererStyle(200),
            new ImagickImageBackEnd()
        );

        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8');


        $pdf->SetY(-15);
        $pdf->SetMargins(10, 10, 10);
        $pdf->SetTextColor(33, 65, 108);
        $pdf->SetAutoPageBreak(false);
        $pdf->AddPage();


    $html = '
    <div style="background-color: #0079bb; color: #fff; text-align: center; padding: 10px;">
        <h1>'.$medico.'</h1>
        <p>Cédula Profesional: 12345</p>
        <p>Medico familiar</p>

    </div>';
    $pdf->writeHTML($html, true, false, true, false, '');

// Crear la tabla con estilos en el atributo style
$html = '<table style="width: 100%; border-collapse: collapse;">';
$html .= '<tr>';
$html .= '<th style="background-color: #0079bb; color: #fff; border: 1px solid #000; padding: 8px; text-align: left;">Nombre</th>';
$html .= '<th style="background-color: #0079bb; color: #fff; border: 1px solid #000; padding: 8px; text-align: left;">Tipo</th>';
$html .= '<th style="background-color: #0079bb; color: #fff; border: 1px solid #000; padding: 8px; text-align: left;">Dosis</th>';
$html .= '</tr>';

foreach ($lista as $m) {
    $html .= '<tr>';
    $html .= '<td>' . $m->nombre . '</td>';
    $html .= '<td>' . $m->tipo. '</td>';
    $html .= '<td>' . $m->dosis . '</td>';
    $html .= '</tr>';
}
$html .= '</table>';

// Agregar la tabla al PDF
$pdf->writeHTML($html, true, false, true, false, '');


    $writer = new Writer($renderer);
    $qr_image = base64_encode($writer->writeString("https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley"));
    $img = '<img src="@' . preg_replace('#^data:image/[^;]+;base64,#', '', $qr_image) . '">';
    $pdf->writeHTML($img, true, false, true, false, '');

        $pdf->SetX(-225);
        $pdf->SetY(-15); // Posición desde la parte inferior de la página
        

        $this->response->setHeader("Content-Type", "application/pdf");
        $pdf->Output("file.pdf", 'I');






    }
}
