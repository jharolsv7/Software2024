<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Partido;
use App\Models\Equipo;
use App\Models\Fase;
use App\Models\Jugador;
use App\Http\Livewire\Jugadors;

class Partidos extends Component
{
    use WithPagination;
	public $equipoSeleccionado;
	public $jugadoresEquipoSeleccionado;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $fecha, $hora, $fase_id, $ubicacion, $golesEquipo1=0, $golesEquipo2=0, $tarjetaAmarilla, $tarjetaRoja, $equipo_uno, $equipo_dos, $ganador;

    public function render()
    {
		// Cargar jugadores según el equipo seleccionado
        $this->jugadoresEquipoSeleccionado = Jugador::where('equipo_id', $this->equipoSeleccionado)->get();
		//$partido = Partido::find(1);
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.partidos.view', [
            'partidos' => Partido::with(['equipo', 'equipoDos', 'fase', 'goleadores'])
						->oldest()
						->orWhere('fecha', 'LIKE', $keyWord)
						->orWhere('hora', 'LIKE', $keyWord)
						->orWhere('fase_id', 'LIKE', $keyWord)
						->orWhere('ubicacion', 'LIKE', $keyWord)
						->orWhere('golesEquipo1', 'LIKE', $keyWord)
						->orWhere('golesEquipo2', 'LIKE', $keyWord)
						->orWhere('tarjetaAmarilla', 'LIKE', $keyWord)
						->orWhere('tarjetaRoja', 'LIKE', $keyWord)
						->orWhere('equipo_uno', 'LIKE', $keyWord)
						->orWhere('equipo_dos', 'LIKE', $keyWord)
						->orWhere('ganador', 'LIKE', $keyWord)
						->paginate(10),
                        'equipos' => Equipo::all(),
						'fases' => Fase::all(),
						//'partido' => $partido,
        ]);
    }

	public function cargarJugadores()
	{
		// Puedes agregar aquí cualquier lógica adicional si es necesario
		$this->jugadoresEquipoSeleccionado = Jugador::where('equipo_id', $this->equipoSeleccionado)->get();
	}
	// Método para obtener los goles del Equipo 1
	public function obtenerGolesEquipo1()
	{
		// Lógica para obtener los goles del Equipo 1 desde la base de datos o cualquier otra fuente
		// Por ejemplo, asumiendo que tienes un modelo llamado Equipo
		$equipo = Equipo::find($this->equipo_uno);
		
		// Asegúrate de manejar casos donde el equipo no se encuentra
		return $equipo ? $equipo->goles : 0;
	}

	// Método para obtener los goles del Equipo 2
	public function obtenerGolesEquipo2()
	{
		// Lógica para obtener los goles del Equipo 2 desde la base de datos o cualquier otra fuente
		// Por ejemplo, asumiendo que tienes un modelo llamado Equipo
		$equipo = Equipo::find($this->equipo_dos);
		
		// Asegúrate de manejar casos donde el equipo no se encuentra
		return $equipo ? $equipo->goles : 0;
	}

	public function getEquipos()
    {
        return Equipo::all();
    }

	public function getFases()
    {
        return Fase::all();
    }

    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->fecha = null;
		$this->hora = null;
		$this->fase_id = null;
		$this->ubicacion = null;
		$this->golesEquipo1 = null;
		$this->golesEquipo2 = null;
		$this->tarjetaAmarilla = null;
		$this->tarjetaRoja = null;
		$this->equipo_uno = null;
		$this->equipo_dos = null;
		$this->ganador = null;
    }

    public function store()
    {
        $this->validate([
		'fecha' => 'required',
		'hora' => 'required',
		'fase_id' => 'required',
		'ubicacion' => 'required',
		'golesEquipo1' => 'required',
		'golesEquipo2' => 'required',
		'tarjetaAmarilla' => 'required',
		'tarjetaRoja' => 'required',
		'equipo_uno' => 'required',
		'equipo_dos' => 'required',
		'ganador' => 'required',
        ]);

		// Verificar sanciones antes de crear el partido
		$sancionesEquipoUno = $this->getSancionesActivas($this->equipo_uno);
		$sancionesEquipoDos = $this->getSancionesActivas($this->equipo_dos);

        $sancionesJugadoresEquipoUno = $this->getSancionesJugadoresActivas($this->getJugadores($this->equipo_uno));
        $sancionesJugadoresEquipoDos = $this->getSancionesJugadoresActivas($this->getJugadores($this->equipo_dos));

		// Verificar si el equipo uno tiene una inscripción activa
		$equipoUno = Equipo::find($this->equipo_uno);

		// Verificar si el equipo dos tiene una inscripción activa
		$equipoDos = Equipo::find($this->equipo_dos);

		$this->mostrarErrorSancionesJugadores($sancionesJugadoresEquipoUno, $this->getNombreEquipo($this->equipo_uno));
		$this->mostrarErrorSancionesJugadores($sancionesJugadoresEquipoDos, $this->getNombreEquipo($this->equipo_dos));

		if ($sancionesEquipoUno->count() > 0) {
			$nombreEquipoUno = Equipo::find($this->equipo_uno)->nombre;
			$mensaje = "El Equipo: $nombreEquipoUno tiene una sanción Activa." . $this->formatSanciones($sancionesEquipoUno);
			$this->emit('mostrarError', $mensaje);
			return;
		}
		
		if ($sancionesEquipoDos->count() > 0) {
			$nombreEquipoDos = Equipo::find($this->equipo_dos)->nombre;
			$mensaje = "El Equipo: $nombreEquipoDos tiene una sanción Activa." . $this->formatSanciones($sancionesEquipoDos);
			$this->emit('mostrarError', $mensaje);
			return;
		}

		if (!$equipoUno || !$equipoUno->inscripcion || $equipoUno->inscripcion->estado != true) {
			// El equipo uno no tiene una inscripción activa, muestra un aviso
			$nombreEquipoUno = $equipoUno ? $equipoUno->nombre : "Equipo Uno Desconocido";
			$this->emit('mostrarError', "El equipo: $nombreEquipoUno, no tiene una inscripción Activa. El partido no se puede crear hasta que se active su Inscripción.");
			return;
		}

		if (!$equipoDos || !$equipoDos->inscripcion || $equipoDos->inscripcion->estado != true) {
			// El equipo dos no tiene una inscripción activa, muestra un aviso
			$nombreEquipoDos = $equipoDos ? $equipoDos->nombre : "Equipo Dos Desconocido";
			$this->emit('mostrarError', "El equipo: $nombreEquipoDos, no tiene una inscripción Activa. El partido no se puede crear hasta que se active su Inscripción.");
			return;
		}

		// Determinar qué equipo tiene más goles
		if ($this->golesEquipo1 > $this->golesEquipo2) {
			$equipoGanador = $this->getEquipoNombre($this->equipo_uno);
		} elseif ($this->golesEquipo1 < $this->golesEquipo2) {
			$equipoGanador = $this->getEquipoNombre($this->equipo_dos);
		} else {
			$equipoGanador = 'Empate';
		}

        Partido::create([ 
			'fecha' => $this-> fecha,
			'hora' => $this-> hora,
			'fase_id' => $this-> fase_id,
			'ubicacion' => $this-> ubicacion,
			'golesEquipo1' => $this-> golesEquipo1,
			'golesEquipo2' => $this-> golesEquipo2,
			'tarjetaAmarilla' => $this-> tarjetaAmarilla,
			'tarjetaRoja' => $this-> tarjetaRoja,
			'equipo_uno' => $this-> equipo_uno,
			'equipo_dos' => $this-> equipo_dos,
			'ganador' => $equipoGanador,
        ]);
        
		$this->resetInput();
		$this->dispatchBrowserEvent('closeModal');
		session()->flash('message', 'Partido creado exitosamente.');
    }

    public function edit($id)
    {
        $record = Partido::findOrFail($id);
        $this->selected_id = $id; 
		$this->fecha = $record-> fecha;
		$this->hora = $record-> hora;
		$this->fase_id = $record-> fase_id;
		$this->ubicacion = $record-> ubicacion;
		$this->golesEquipo1 = $record-> golesEquipo1;
		$this->golesEquipo2 = $record-> golesEquipo2;
		$this->tarjetaAmarilla = $record-> tarjetaAmarilla;
		$this->tarjetaRoja = $record-> tarjetaRoja;
		$this->equipo_uno = $record-> equipo_uno;
		$this->equipo_dos = $record-> equipo_dos;
		$this->ganador = $record-> ganador;
    }

    public function update()
    {

		// Obtener el partido antes de la actualización
    	$partidoAntes = Partido::find($this->partidoId);

        $this->validate([
		'fecha' => 'required',
		'hora' => 'required',
		'fase_id' => 'required',
		'ubicacion' => 'required',
		'golesEquipo1' => 'required',
		'golesEquipo2' => 'required',
		'tarjetaAmarilla' => 'required',
		'tarjetaRoja' => 'required',
		'equipo_uno' => 'required',
		'equipo_dos' => 'required',
		'ganador' => 'required',
        ]);

		// Verificar sanciones antes de crear el partido
		$sancionesEquipoUno = $this->getSancionesActivas($this->equipo_uno);
		$sancionesEquipoDos = $this->getSancionesActivas($this->equipo_dos);

        $sancionesJugadoresEquipoUno = $this->getSancionesJugadoresActivas($this->getJugadores($this->equipo_uno));
        $sancionesJugadoresEquipoDos = $this->getSancionesJugadoresActivas($this->getJugadores($this->equipo_dos));

		// Verificar si el equipo uno tiene una inscripción activa
		$equipoUno = Equipo::find($this->equipo_uno);

		// Verificar si el equipo dos tiene una inscripción activa
		$equipoDos = Equipo::find($this->equipo_dos);

		$this->mostrarErrorSancionesJugadores($sancionesJugadoresEquipoUno, $this->getNombreEquipo($this->equipo_uno));
		$this->mostrarErrorSancionesJugadores($sancionesJugadoresEquipoDos, $this->getNombreEquipo($this->equipo_dos));

		if ($sancionesEquipoUno->count() > 0) {
			$nombreEquipoUno = Equipo::find($this->equipo_uno)->nombre;
			$mensaje = "\nEl Equipo: $nombreEquipoUno tiene una sanción Activa." . $this->formatSanciones($sancionesEquipoUno);
			$this->emit('mostrarError', $mensaje);
			return;
		}

		if ($sancionesEquipoDos->count() > 0) {
			$nombreEquipoDos = Equipo::find($this->equipo_dos)->nombre;
			$mensaje = "\nEl Equipo: $nombreEquipoDos tiene una sanción Activa." . $this->formatSanciones($sancionesEquipoDos);
			$this->emit('mostrarError', $mensaje);
			return;
		}

		if (!$equipoUno || !$equipoUno->inscripcion || $equipoUno->inscripcion->estado != true) {
			// El equipo uno no tiene una inscripción activa, muestra un aviso
			$nombreEquipoUno = $equipoUno ? $equipoUno->nombre : "Equipo Uno Desconocido";
			$this->emit('mostrarError', "\nEl equipo: $nombreEquipoUno, no tiene una inscripción Activa. Verifique su Inscripción ya que se encuentra Inactiva.");
			return;
		}

		if (!$equipoDos || !$equipoDos->inscripcion || $equipoDos->inscripcion->estado != true) {
			// El equipo dos no tiene una inscripción activa, muestra un aviso
			$nombreEquipoDos = $equipoDos ? $equipoDos->nombre : "Equipo Dos Desconocido";
			$this->emit('mostrarError', "\nEl equipo: $nombreEquipoDos, no tiene una inscripción Activa. Verifique su Inscripción ya que se encuentra Inactiva.");
			return;
		}

		// Determinar qué equipo tiene más goles
		if ($this->golesEquipo1 > $this->golesEquipo2) {
			$equipoGanadorId = $this->equipo_uno;
			$equipoPerdedorId = $this->equipo_dos;
		} elseif ($this->golesEquipo1 < $this->golesEquipo2) {
			$equipoGanadorId = $this->equipo_dos;
			$equipoPerdedorId = $this->equipo_uno;
		} else {
			$equipoGanadorId = null; // Empate
			$equipoPerdedorId = null; // Empate
		}

		// Determinar qué equipo tiene más goles
		if ($this->golesEquipo1 > $this->golesEquipo2) {
			$equipoGanador = $this->getEquipoNombre($this->equipo_uno);
		} elseif ($this->golesEquipo1 < $this->golesEquipo2) {
			$equipoGanador = $this->getEquipoNombre($this->equipo_dos);
		} else {
			$equipoGanador = 'Empate';
		}

        if ($this->selected_id) {
			$record = Partido::find($this->selected_id);
            $record->update([ 
			'fecha' => $this-> fecha,
			'hora' => $this-> hora,
			'fase_id' => $this-> fase_id,
			'ubicacion' => $this-> ubicacion,
			'golesEquipo1' => $this-> golesEquipo1,
			'golesEquipo2' => $this-> golesEquipo2,
			'tarjetaAmarilla' => $this-> tarjetaAmarilla,
			'tarjetaRoja' => $this-> tarjetaRoja,
			'equipo_uno' => $this-> equipo_uno,
			'equipo_dos' => $this-> equipo_dos,
			'ganador' => $equipoGanador,
            ]);

			// Incrementar puntos según el resultado
			if ($equipoGanadorId !== null && $equipoPerdedorId !== null) {
				$this->incrementarPuntosEquipo($equipoGanadorId, 3);
				$this->incrementarPuntosEquipo($equipoPerdedorId, 0);
			} else {
				// Empate
				$this->incrementarPuntosEquipo($this->equipo_uno, 1);
				$this->incrementarPuntosEquipo($this->equipo_dos, 1);
			}

            $this->resetInput();
            $this->dispatchBrowserEvent('closeModal');
			session()->flash('message', 'Partido Successfully updated.');
        }
    }

	private function getSancionesActivas($equipoId)
	{
		$equipo = Equipo::find($equipoId);
	
		if ($equipo) {
			return $equipo->sanciones()->where('estado', true)->get();
		}
	
		return collect();
	}

	private function formatSanciones($sanciones)
	{
		return $sanciones->map(function ($sancion) {
			return "\nDetalles de la Sanción: $sancion->detalles. \nMonto a Cancelar: $sancion->monto \n(Esta sanción debe estar inactiva para que pueda existir este encuentro). \nNota: Realice el pago de la Sanción para bajar la Sanción del Equipo.";
		})->implode(', ');
	}

	private function getJugadores($equipoId)
	{
		$equipo = Equipo::with('jugadores')->find($equipoId);

		return $equipo ? $equipo->jugadores : collect();
	}

	private function mostrarErrorSancionesJugadores($sancionesJugadores, $equipo)
	{
		if ($sancionesJugadores->isNotEmpty()) {
			$mensaje = $this->formatSancionesJugadores($sancionesJugadores, $equipo);
			$this->emit('mostrarError', "$mensaje");
			return true;
		}

		return false;
	}

	private function formatSancionesJugadores($sancionesJugadores, $equipo)
	{
		return $sancionesJugadores->map(function ($sancion) use ($equipo) {
			return "\nJugador: \"$sancion[jugador]\" del $equipo, tiene una sanción. \nDetalles: $sancion[detalles]. \nMonto a cancelar por parte del Jugador: $sancion[monto]";
		})->implode(', ');
	}

	private function getSancionesJugadoresActivas($jugadores)
	{
		return $jugadores->flatMap(function ($jugador) {
			return $jugador->sanciones()->where('estado', true)->get()->map(function ($sancion) use ($jugador) {
				return [
					'jugador' => $jugador->nombre,
					'equipo' => $jugador->equipo->nombre,
					'monto' => $sancion->monto,
					'detalles' => $sancion->detalles,
				];
			});
		});
	}

	private function getNombreEquipo($equipoId)
	{
		$equipo = Equipo::find($equipoId);

		return $equipo ? $equipo->nombre : "Equipo Desconocido";
	}

    public function destroy($id)
    {
        if ($id) {
            Partido::where('id', $id)->delete();
        }
    }
	
	public function mount()
    {
        // Inicializa los valores según tus necesidades
        $this->golesEquipo1 = $this->obtenerGolesEquipo1();
        $this->golesEquipo2 = $this->obtenerGolesEquipo2();
    }

	public function getEquipoNombre($equipoId)
	{
		$equipo = Equipo::find($equipoId);
    	return $equipo ? $equipo->nombre : 'Equipo no encontrado';
	}

	private function incrementarPuntosEquipo($equipoId, $puntos)
	{
		// Aquí debes implementar la lógica para incrementar los puntos en tu modelo de equipos
		$equipo = Equipo::find($equipoId);
		if ($equipo) {
			$equipo->puntos += $puntos;
			$equipo->save();
		}
	}
}