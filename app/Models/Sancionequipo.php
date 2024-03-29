<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sancionequipo extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'sancionequipo';

    protected $fillable = ['equipo_id','detalles','fecha','monto','estado'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipo()
    {
        return $this->hasOne('App\Models\Equipo', 'id', 'equipo_id');
    }
    
}
