<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infoweb extends Model
{
	use HasFactory;
	
    public $timestamps = true;

    protected $table = 'infoweb';

    protected $fillable = ['fecha_campeonato','foto_sitio','informacion'];
	
}
