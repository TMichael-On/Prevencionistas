<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserExams;

class UserExamsController extends Controller{
        
    public function create($usuario_id, $examen_id){
        try {
            $userExams = UserExams::where("usuario_id", $usuario_id)
                ->where("examen_id", $examen_id)
                ->first();

            if(!$userExams){
                $userExams = new UserExams();
                $userExams->usuario_id = $usuario_id;
                $userExams->examen_id = $examen_id;
                $userExams->usuario_examen_contador = 1;
                $userExams->save();
            } else {
                $contador = $userExams->usuario_examen_contador;
                if($contador >= 3){
                    return response()->json([
                        'error' => 'Alcanzo el número de intentos permitidos'
                    ], 500);
                }
                $userExams->usuario_examen_contador += 1;
                $userExams->save();
            }

            return $userExams;

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error al procesar la solicitud : '. $e->getMessage()
            ], 500);
        }
    }

}