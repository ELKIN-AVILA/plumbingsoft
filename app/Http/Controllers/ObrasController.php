<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\obras;
use App\Empresa;
use App\empresactr;

class ObrasController extends Controller
{
    public function index(){
        $empresa=Empresa::all();
        $empresactr=empresactr::all();
        $obras=Obras::all();
        return view('Obras.index',['obras'=>$obras,'empresa'=>$empresa,'empresactr'=>$empresactr]);
    }
    public function guardar(Request $request){
        if($request->ajax()){
            $obras=new obras();
            $obras->nombre=$request->nombre;
            $obras->empresa_id=$request->empresa_id;
            $obras->empresactr_id=$request->empresactr_id;
            $obras->save();
            return response()->json("Se Creo el registro ");
            
        }
    }
    public function editar(Request $request){
        if($request->ajax()){
            $obras=obras::where('id','=',$request->id)->get();
            return response()->json($obras);
        }
    }
    public function actualizar(Request $request){
        if($request->ajax()){
            $obras=obras::where('id','=',$request->id)->update(['empresactr_id'=>$request->empresactr_id,'nombre'=>$request->nombre,'estado'=>$request->estado]);
            return response()->json("Se actualizo el registro");
        }
    }
    public function eliminar(Request $request){
        if($request->ajax()){
            $obras=obras::where('id','=',$request->id);
            $obras->delete();
            return response()->json("Se elimino el registro");
        }
    }
}
