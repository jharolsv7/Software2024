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
        
        // Agregar las imágenes
        $html .= '<img src="' . asset('img/Espe.png') . '" alt="Logo" class="logo">';
        $html .= '<img src="' . asset('img/software.jpg') . '" alt="Logo" class="logo">';

        // Agregar el contexto sobre las sanciones
        $html .= '<h1>Informe de Sanciones de Equipos</h1>';
        $html .= '<p>Este informe contiene detalles sobre las sanciones aplicadas a los equipos.</p>';

        // Agregar la tabla de sanciones de equipos
        $html .= '<table border="1" cellpadding="5">';
        $html .= '<thead><tr><th>ID</th><th>Equipo</th><th>Detalles</th><th>Fecha</th><th>Monto</th><th>Estado</th></tr></thead>';
        $html .= '<tbody>';
        foreach ($sanciones as $sancion) {
            $html .= '<tr>';
            $html .= '<td>' . $sancion->id . '</td>';
            $html .= '<td>' . $sancion->equipo->nombre . '</td>';
            $html .= '<td>' . $sancion->detalles . '</td>';
            $html .= '<td>' . $sancion->fecha . '</td>';
            $html .= '<td>' . $sancion->monto . '</td>';
            $html .= '<td>' . ($sancion->estado ? 'Activa' : 'Inactiva') . '</td>';
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
