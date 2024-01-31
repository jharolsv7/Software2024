<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'partidos';

    protected $fillable = ['fecha','hora','fase_id','ubicacion','golesEquipo1','golesEquipo2','tarjetaAmarilla','tarjetaRoja','equipo_uno','equipo_dos','ganador'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_uno');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipoDos()
    {
        return $this->belongsTo(Equipo::class, 'equipo_dos');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fase()
    {
        return $this->belongsTo(Fase::class, 'fase_id');
    }
    
    /**
     * Relación con la tabla Goleador
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function goleadores()
    {
        return $this->hasMany(Goleadore::class, 'partido_id');
    }
}
