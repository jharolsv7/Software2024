<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'inscripcion';

    protected $attributes = [
        'descripcion' => '',
        'fecha' => '',
    ];
   
    protected $fillable = ['descripcion','monto','fecha','estado','equipo_id'];
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }
    
}
