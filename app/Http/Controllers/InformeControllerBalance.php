<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Ingreso;
use App\Models\Egreso;

class InformeControllerBalance extends Controller
{
    public function generarPDF(Request $request)
    {
        // Obtener el total de ingresos
        $totalIngresos = Ingreso::sum('monto');

        // Obtener el total de egresos
        $totalEgresos = Egreso::sum('monto');

        // Calcular el balance
        $balance = $totalIngresos - $totalEgresos;

        // Configurar Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Helvetica');
        $dompdf = new Dompdf($options);

        // Generar el HTML del informe
        $html = '<html><body>';
        $html .= '<h1>Informe de Balance</h1>';
        $html .= '<table border="1" cellpadding="5">';
        $html .= '<tr><th>Tipo</th><th>Total</th></tr>';
        $html .= '<tr><td>Ingresos</td><td>' . $totalIngresos . '</td></tr>';
        $html .= '<tr><td>Egresos</td><td>' . $totalEgresos . '</td></tr>';
        $html .= '<tr><td>Balance</td><td>' . $balance . '</td></tr>';
        $html .= '</table>';
        $html .= '</body></html>';

        // Cargar el HTML en Dompdf
        $dompdf->loadHtml($html);

        // Renderizar el PDF
        $dompdf->render();

        // Descargar el PDF
        return $dompdf->stream('informe_balance.pdf');
    }
}
