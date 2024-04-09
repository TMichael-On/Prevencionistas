<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examen;
use App\Models\Pregunta;
use App\Models\Respuesta;

class ExamController extends Controller{
        
    public function list($detalle){
        try { 
            $detalle = urldecode($detalle);
            $examen = Examen::where('examen_nombre', 'like', '%'.$detalle.'%')->get();
            $data = Examen::getData($examen);
            
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error al procesar la solicitud : '. $e->getMessage()
            ], 500);
        }
    }

    public function mostrarPreguntas($id)
    {
        $examen = Examen::findOrFail($id);
        $preguntas = $examen->preguntas;

        return response()->json($preguntas);
    }

    public function preguntasRespuestas($id)
    {
        try {
            $examen = Examen::find($id);
            if (!$examen) {
                return response()->json([
                    'error' => 'No se encontró el registro'
                ], 400);
            }
            $preguntas = $examen->preguntas()->with('respuestas')->get();
            return $preguntas;
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error al procesar la solicitud : '. $e->getMessage()
            ], 500);
        }
    }

    public function resultado(Request $request, $id) {
        // Registro de examen de la base de datos
        $dataDB = $this->preguntasRespuestas($id);
        foreach ($dataDB as $pregunta) {
            foreach ($pregunta->respuestas as $respuesta) {
                $respuesta->makeVisible('respuesta_correcta');
            }
        }
        $dataDB = $dataDB->toArray();
        //Registro de examen del usuario
        $data_usuario = $request->all();      
        $puntaje = 0;  

        $long = count($dataDB);
        for ($i = 0; $i < $long; $i++) {

            $respuestas_DB = $dataDB[$i]['respuestas'];
            $respuestas_usuario = $data_usuario[$i]['respuestas'];
            
            $l = count($respuestas_DB);
            for ($n = 0; $n < $l; $n++) {
                if ($respuestas_DB[$n]['respuesta_correcta'] == 1) {
                    $gdfg = $respuestas_DB[$n];                    
                    if ($respuestas_usuario[$n] == 1) { 
                        //la respuesta es correcta + 0.4
                        $puntaje += 0.4;
                    }
                }
            }
        }    

        return $puntaje;
    }

    public function view(){
        $examen =  Examen::all();
        $data = Examen::getData($examen);
        return view('examenes')->with("data_examen", $data);
    }

    public function viewExamen($id){
        try {    
        $data = $this->preguntasRespuestas($id);
        return view('examen')->with('data_preguntas', $data);
        // return $data;
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error al procesar la solicitud : '. $e->getMessage()
            ], 500);
        }
    }

}