<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipoexa;

class TipoexaController extends Controller
{
    public function index(){
        $tipoexa=tipoexa::all();
        return view('Tipoexa.index',['tipoexa'=>$tipoexa]);
    }
    public function guardar(Request $request){
        if($request->ajax()){
            $tipoexa=new tipoexa();
            $tipoexa->nombre=$request->nombre;
            $tipoexa->save();
            return response()->json("Se creo el registro");
        }
    }
    public function editar(Request $request){
        if($request->ajax()){
            $tipoexa=tipoexa::where('id','=',$request->id)->get();
            return response()->json($tipoexa);
        }
    }
    public function actualizar(Request $request){
        if($request->ajax()){
            $tipoexa=tipoexa::where('id','=',$request->id)->update(['nombre'=>$request->nombre]);
            return response()->json("Se actualizo el registro");
        }
    }
    public function eliminar(Request $request){
        if($request->ajax()){
            $tipoexa=tipoexa::where('id','=',$request->id);
            $tipoexa->delete();
            return response()->json("Se elimino el registro");
        }
    }
}
