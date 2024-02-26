@section('title', __('Ingresos'))
<div class="container-fluid">
    <br>
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <h4><i class="fas fa-file-export"></i> Balance de Ingresos y Egresos</h4>
                    </div>
                </div>
                
                <div class="card-body">
                <p class="fs-5 text-justify">
                    El balance de ingresos y egresos es una herramienta fundamental para evaluar la salud financiera de cualquier proyecto, incluyendo nuestro torneo. En términos simples, representa la diferencia entre los ingresos totales y los egresos totales durante un período de tiempo específico.
                </p>
                <p class="fs-5 text-justify">
                    Los <span class="font-weight-bold">Ingresos</span> representan todas las fuentes de dinero que recibimos durante el torneo. Esto puede incluir, entre otros, las cuotas de inscripción de los equipos, los patrocinios, las ventas de entradas, y cualquier otro ingreso relacionado con el evento.
                </p>
                <p class="fs-5 text-justify">
                    Por otro lado, los <span class="font-weight-bold">Engresos</span> son todos los gastos en los que incurrimos para organizar y ejecutar el torneo. Esto abarca una variedad de costos, como alquiler de instalaciones, honorarios del personal, premios, publicidad, suministros y cualquier otro gasto asociado con la logística y la realización del evento.
                </p>
                <p class="fs-5 text-justify">
                    Al calcular el <span class="font-weight-bold">Balance</span> de ingresos y egresos, podemos determinar si el torneo está generando un excedente financiero o si estamos incurriendo en pérdidas. Esta información es esencial para la toma de decisiones financieras y la planificación futura del torneo, ya que nos permite identificar áreas de mejora y ajustar nuestras estrategias para garantizar la sostenibilidad y el éxito a largo plazo.
                </p>
                    <p class="font-weight-bold text-center">Descargue el informe aquí:</p>
                    <div class="text-center">
                        <a href="{{ route('informe.generarPDFBalance') }}" class="btn btn-success">
                            <i class="fas fa-download"></i> Descargar Informe
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
