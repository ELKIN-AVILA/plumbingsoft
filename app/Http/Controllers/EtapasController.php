<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\etapas;
use App\obras;

class EtapasController extends Controller
{
    public function index(){
        $etapas=etapas::all();
        $obras=obras::all();
        return view('Etapas.index',['etapas'=>$etapas,'obras'=>$obras]);
    }
    public function guardar(Request $request){
        if($request->ajax()){
            $etapas=new etapas();
            $etapas->nombre=$request->nombre;
            $etapas->obras_id=$request->obras_id;
            $etapas->save();
            return response()->json("Se creo el registro");
        }
    }
    public function editar(Request $request){
        if($request->ajax()){
            $etapas=etapas::where('id','=',$request->id)->get();
            return response()->json($etapas);
        }
    }
    public function actualizar(Request $request){
        if($request->ajax()){
            $etapas=etapas::where('id','=',$request->id)->update(['nombre'=>$request->nombre,'obras_id'=>$request->obras_id]);
            return response()->json("Se actualizo el registro");
        }
    }
    public function eliminar(Request $request){
        if($request->ajax()){
            $etapas=etapas::where('id','=',$request->id);
            $etapas->delete();
            return response()->json("Se elimino el registro");
        }
    }
}
