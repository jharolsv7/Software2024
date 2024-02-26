<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\SancionEquipo;

class InformeControllerSancionEquipo extends Controller
{
    public function generarPDF(Request $request)
    {
        // Obtener los datos de las sanciones de equipos
        $sanciones = SancionEquipo::all();

        // Configurar Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Helvetica');
        $dompdf = new Dompdf($options);

        // Generar el HTML del informe
        $html = '<html><head><style>';
        $html .= '.logo { width: 200px; height: auto; }';
        $html .= '.header-img { text-align: center; margin-bottom: 20px; }';
        $html .= '.context { margin-bottom: 20px; }';
        $html .= '.table { width: 100%; border-collapse: collapse; }';
        $html .= '.table th, .table td { border: 1px solid #000; padding: 8px; }';
        $html .= '</style></head><body>';
        
        // Agregar el contexto sobre las sanciones
        $html .= '<h1 style="text-align: center;">Informe de Sanciones de Equipos</h1>';
        $html .= '<p style="text-align: center;">Fecha: ' . date('Y-m-d H:i:s') . '</p>';
        $html .= '<p style="text-align: center;">Este informe contiene detalles sobre las sanciones aplicadas a los equipos.</p>';

                // Agregar la tabla de sanciones de equipos
        $html .= '<table style="width: 100%; border-collapse: collapse;" border="1">';
        $html .= '<thead><tr style="background-color: #ccc;"><th style="padding: 10px;">ID</th><th style="padding: 10px;">Equipo</th><th style="padding: 10px;">Detalles</th><th style="padding: 10px;">Fecha</th><th style="padding: 10px;">Monto</th><th style="padding: 10px;">Estado</th></tr></thead>';
        $html .= '<tbody>';
        foreach ($sanciones as $sancion) {
            $html .= '<tr style="border: 1px solid #000;">';
            $html .= '<td style="padding: 10px; border: 1px solid #000;">' . $sancion->id . '</td>';
            $html .= '<td style="padding: 10px; border: 1px solid #000;">' . $sancion->equipo->nombre . '</td>';
            $html .= '<td style="padding: 10px; border: 1px solid #000;">' . $sancion->detalles . '</td>';
            $html .= '<td style="padding: 10px; border: 1px solid #000;">' . $sancion->fecha . '</td>';
            $html .= '<td style="padding: 10px; border: 1px solid #000;">' . $sancion->monto . '</td>';
            $html .= '<td style="padding: 10px; border: 1px solid #000;">' . ($sancion->estado ? 'Activa' : 'Inactiva') . '</td>';
            $html .= '</tr>';
        }
        $html .= '</tbody></table>';
        $html .= '<div class="header-img"><img src="data:image/jpeg;base64,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" alt="Logo"></div>'; // Ruta de la imagen desde Internet

                $html .= '</body></html>';

        // Cargar el HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Descargar el PDF
        return $dompdf->stream('informe_sanciones_equipos.pdf');
    }
}
