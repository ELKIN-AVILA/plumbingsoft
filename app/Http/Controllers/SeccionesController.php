<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\secciones;
use App\etapas;

class SeccionesController extends Controller
{
    public function index(){
        $secciones=secciones::all();
        $etapas=etapas::all();
        return view('Secciones.index',['secciones'=>$secciones,'etapas'=>$etapas]);
    }
    public function guardar(Request $request){
        if($request->ajax()){
            $secciones=new secciones();
            $secciones->nombre=$request->nombre;
            $secciones->etapas_id=$request->etapas_id;
            $secciones->save();
            return response()->json("Se creo el registro");
        }
    }
    public function editar(Request $request){
        if($request->ajax()){
            $secciones=secciones::where('id','=',$request->id)->get();
            return response()->json($secciones);
        }
    }
    public function actualizar(Request $request){
        if($request->ajax()){
            $secciones=secciones::where('id','=',$request->id)->update(['nombre'=>$request->nombre,'etapas_id'=>$request->etapas_id]);
            return response()->json("Se actualizo el registro");
        }
    }
    public function eliminar(Request $request){
        if($request->ajax()){
            $secciones=secciones::where('id','=',$request->id);
            $secciones->delete();
            return response()->json("Se elimino el registro");
        }
    }
    
}
