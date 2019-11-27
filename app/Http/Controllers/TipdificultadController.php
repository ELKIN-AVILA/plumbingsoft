<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipdificultad;

class TipdificultadController extends Controller
{
    public function index(){
        $tipdificultad=tipdificultad::all();
        return view('Tipdificultad.index',['tipdificultad'=>$tipdificultad]);
    }
    public function guardar(Request $request){
        if($request->ajax()){
            $tipdificultad=new tipdificultad();
            $tipdificultad->nombre=$request->nombre;
            $tipdificultad->save();
            return response()->json("Se creo el registro");
        }
    }
    public function editar(Request $request){
        if($request->ajax()){
            $tipdificultad=tipdificultad::where('id','=',$request->id)->get();
            return response()->json($tipdificultad);
        }
    }
    public function actualizar(Request $request){
        if($request->ajax()){
            $tipdificultad=tipdificultad::where('id','=',$request->id)->update(['nombre'=>$request->nombre]);
            return response()->json("Se actualizo el registrol");
        }
    }
    public function eliminar(Request $request){
        if($request->ajax()){
            $tipdificultad=tipdificultad::where('id','=',$request->id);
            $tipdificultad->delete();
            return response()->json("Se elimino el registro");
        }
    }
}