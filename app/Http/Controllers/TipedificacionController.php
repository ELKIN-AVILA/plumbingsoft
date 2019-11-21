<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipedificacion;

class TipedificacionController extends Controller
{
    public function index(){
        $tipedificacion=tipedificacion::all();
        return view('Tipedificacion.index',['tipedificacion'=>$tipedificacion]);
    }
    public function guardar(Request $request){
        if($request->ajax()){
            $tipedificacion=new tipedificacion();
            $tipedificacion->nombre=$request->nombre;
            $tipedificacion->save();
            return response()->json("Se creo el registro");
        }
    }
    public function editar(Request $request){
        if($request->ajax()){
            $tipedificacion=tipedificacion::where('id','=',$request->id)->get();
            return response()->json($tipedificacion);
        }
    }
    public function actualizar(Request $request){
        if($request->ajax()){
            $tipedificacion=tipedificacion::where('id','=',$request->id)->update(['nombre'=>$request->nombre]);
            return response()->json("Se actualizo el registro");
        }
    }
    public function eliminar(Request $request){
        if($request->ajax()){
            $tipedificacion=tipedificacion::where('id','=',$request->id);
            $tipedificacion->delete();
            return response()->json("Se elimino el registro");
        }
    }
}
