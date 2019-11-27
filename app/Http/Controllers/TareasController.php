<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tareas;
use App\tipdificultad;

class TareasController extends Controller
{
    public function index(){
        $tipdificultad=tipdificultad::all();
        $tareas=tareas::all();
        return view('Tareas.index',['tareas'=>$tareas,'tipdificultad'=>$tipdificultad]);
    }
    public function guardar(Request $request){
        if($request->ajax()){
            $tareas=new tareas();
            $tareas->nombre=$request->nombre;
            $tareas->tipdificultad_id=$request->tipdificultad_id;
            $tareas->save();
            return response()->json("Se creo el registgro exitosamente");
        }
    }
    public function editar(Request $request){
        if($request->ajax()){
            $tareas=tareas::where('id','=',$request->id)->get();
            return response()->json($tareas);
        }
    }
    public function actualizar(Request $request){
        if($request->ajax()){
            $tareas=tareas::where('id','=',$request->id)->update(['nombre'=>$request->nombre,'tipdificultad_id'=>$request->tipdificultad_id]);
            return response()->json("Se actualizo el registro exitosamente");
        }
    }
    public function eliminar(Request $request){
        if($request->ajax()){
            $tareas=tareas::where('id','=',$request->id);
            $tareas->delete();
            return response()->json("Se elimino el registro exitosamente");
        }
    }
}
