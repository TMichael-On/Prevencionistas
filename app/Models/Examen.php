<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model{
    protected $table = "latam_examen";
    protected $primaryKey = 'examen_id';
    public $timestamps = false;

    public function preguntas()
    {
        return $this->hasMany(Pregunta::class, 'examen_id');
    }

    public static function getData($examenes) {
        return $examenes->map(function ($examen) {            
            return [
                'Id' => $examen->examen_id,
                'Examen' => $examen->examen_nombre,
                'Fecha de apertura' => $examen->examen_fecha_apertura,
                'Fecha de cierre' => $examen->examen_fecha_cierre,
                'Opciones' => $examen->examen_id
            ];
        });
    }
}