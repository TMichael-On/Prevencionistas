<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;
use App\Models\UserExams;
use App\Models\Examen;
use App\Http\Controllers\UserExamsController;

class KeyController extends Controller{

    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function jwt(UserExams $userExams) 
    {
        $payload = [
            'iss' => "api-jwt",
            'sub' => $userExams->usuario_examen_id,
            'iat' => time(),
            'exp' => time() + 60 * 60
        ];
        return JWT::encode($payload, env('JWT_SECRET'), 'HS256');
    }

    public function generate(Request $request)
    {
        $usuario_id = $this->validar($request);

        $this->validate($this->request,[
            'examen_id' =>'required'
        ]);

        $examen = Examen::find($this->request->input('examen_id'));

        if($examen){
            $UserExamsController = new UserExamsController();
            $userExams = $UserExamsController->create($usuario_id, $this->request->input('examen_id'));
        } else {
            return response()->json([
                'error' => 'No se encontro el registro'
            ], 400); 
        }

        if(!$userExams){
            return response()->json([
                'error' => 'Alcanzo el número de intentos permitidos'
            ], 500);
        }
        return response()->json([
            'token' => $this->jwt($userExams)
        ], 200);
    }

    public function validar($request)
    {
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
}