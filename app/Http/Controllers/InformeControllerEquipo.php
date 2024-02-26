<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Equipo;

class InformeControllerEquipo extends Controller
{
    public function generarPDF(Request $request)
    {
        // Obtener los datos de los equipos
        $equipos = Equipo::all();

        // Configurar Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Helvetica');
        $dompdf = new Dompdf($options);

        // Generar el HTML del informe
        $html = '<html><body>';
        $html .= '<h1>Informe General de Equipos</h1>';
        $html .= '<table border="1" cellpadding="5">';
        $html .= '<tr><th>ID</th><th>Nombre</th><th>Logo</th><th>Eslogan</th><th>Nombre de la Madrina</th><th>Monto de Inscripción</th><th>Puntos</th><th>Grupo</th><th>Goles a Favor</th><th>Goles en Contra</th></tr>';
        foreach ($equipos as $equipo) {
            $html .= '<tr>';
            $html .= '<td>' . $equipo->id . '</td>';
            $html .= '<td>' . $equipo->nombre . '</td>';
            $html .= '<td>';
            if ($equipo->logo) {
                $html .= '<img src="' . asset('storage/' . $equipo->logo) . '" alt="Logo" class="w-16 h-16 object-cover rounded-full" style="max-width: 100px; max-height: 100px;">';
            } else {
                $html .= 'No Logo';
            }
            $html .= '</td>';
            $html .= '<td>' . $equipo->eslogan . '</td>';
            $html .= '<td>' . $equipo->nombreMadrina . '</td>';
            $html .= '<td>' . $equipo->inscripcionMonto . '</td>';
            $html .= '<td>' . $equipo->puntos . '</td>';
            $html .= '<td>' . $equipo->grupo . '</td>';
            $html .= '<td>' . $equipo->goles_a_favor . '</td>';
            $html .= '<td>' . $equipo->goles_en_contra . '</td>';
            $html .= '</tr>';
        }
        $html .= '</table>';
        $html .= '</body></html>';

        // Cargar el HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Descargar el PDF
        return $dompdf->stream('informe_general_equipos.pdf');
    }
    
}
