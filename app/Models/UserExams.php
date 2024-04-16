<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserExams extends Model{
    protected $table = "latam_usuario_examen";
    protected $primaryKey = 'usuario_examen_id';
    public $timestamps = false;

    protected $fillable = [
        'usuario_examen_contador',
        'usuario_id',
        'examen_id',
    ];

    public static function getData($userExams) {
        return $userExams->map(function ($UserExams) {
            $estado = ($UserExams->usuario_examen_nota >= 11) ? 'Aprobado' : 'Desaprobado';
            return [
                'Id' => $UserExams->usuario_examen_id,
                'Examen' => $UserExams->examen_nombre,
                'N° de intentos' => $UserExams->usuario_examen_contador,
                'Nota' => $UserExams->usuario_examen_nota,
                'Estado' => $estado,
            ];
        });
    }    
}