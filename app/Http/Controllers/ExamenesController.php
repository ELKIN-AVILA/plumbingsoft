<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\examenes;
use App\tipoexa;

class ExamenesController extends Controller
{
    public function index(){
        $tipoexa=tipoexa::all();
        $examenes=examenes::all();
        return view('Examenes.index',['tipoexa'=>$tipoexa,'examenes'=>$examenes]);
    }
    public function guardar(Request $request){
        if($request->ajax()){
            $examenes=new examenes();
            $examenes->nombre=$request->nombre;
            $examenes->tipoexa_id=$request->tipoexa_id;
            $examenes->save();
            return response()->json("Se creo el registro");
        }
    }
    public function editar(Request $request){
        if($request->ajax()){
            $examenes=examenes::where('id','=',$request->id)->get();
            return response()->json($examenes);
        }
    }
    public function actualizar(Request $request){
        if($request->ajax()){
            $examenes=examenes::where('id','=',$request->id)->update(['nombre'=>$request->nombre,'tipoexa_id'=>$request->tipoexa_id]);
            return response()->json("Se actualizo el registro");
        }
    }
    public function eliminar(Request $request){
        if($request->ajax()){
            $examenes=examenes::where('id','=',$request->id);
            $examenes->delete();
            return reponse()->json("Se elimino el registro");
        }
    }
}
