<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugadore extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'jugadores';

    protected $fillable = ['nombre','numero','numeroGoles','equipo_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipo()
    {
        //return $this->hasOne('App\Models\Equipo', 'id', 'equipo_id');
        return $this->belongsTo(Equipo::class);
    }
    
}
