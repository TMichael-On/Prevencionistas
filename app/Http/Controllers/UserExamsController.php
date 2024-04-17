<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;
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
                    return false;
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

    public function list(Request $request){
        try {
            $id = $this->validar($request);

            $data = UserExams::join('latam_examen as e', 'e.examen_id', '=', 'latam_usuario_examen.examen_id')
            ->select('latam_usuario_examen.usuario_examen_id', 'latam_usuario_examen.usuario_examen_contador', 'latam_usuario_examen.usuario_examen_nota', 'e.examen_nombre')
            ->where('latam_usuario_examen.usuario_id', $id)
            ->get();
            $data = UserExams::getData($data);

            return $data;

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error al procesar la solicitud : '. $e->getMessage()
            ], 500);
        }
    }

    public function validar($request){
        if (!$request->header('Authorization')) {
            return response()->json([
                'error' =>'Usted no cuenta con los permisos necesarios'
            ],401);
        }

        $array_token = explode(' ', $request->header('Authorization'));
        $token = $array_token[1];

        try {
            $credentials = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));
            return $credentials->sub;
        } catch (ExpiredException $e) {
            return response()->json([
                'error' => 'La sesión expiro'
            ], 400);        
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Algo salio mal']
            , 400);        
        }        
    }

    public function update($request, $examen_id, $nota) {
        try {
            $usuario_id = $this->validar($request);
            $datos = UserExams::where('usuario_id', $usuario_id)
                ->where('examen_id', $examen_id)
                ->first();

            if($datos){
                if ($nota > $datos->usuario_examen_nota) {                    
                    $datos->usuario_examen_nota = $nota;
                    $datos->save();
                }
                return response()->json([
                    'message' => 'registro guardado correctamente'
                ]);
            }

            return response()->json([
                'error' => 'Ocurrió un error al procesar la solicitud'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error al procesar la solicitud : '. $e->getMessage()
            ], 500);
        }
    }

    public function view(){
        return view('notas');
    }

}