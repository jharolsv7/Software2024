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
        $html = '<html><body>';
        
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
                $html .= '</body></html>';

        // Cargar el HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Descargar el PDF
        return $dompdf->stream('informe_sanciones_equipos.pdf');
    }
}
