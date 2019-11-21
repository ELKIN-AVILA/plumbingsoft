<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\empresactr;

class EmpresactrController extends Controller
{
    public function index(){
        $empresa=empresactr::All();
        return view('Empresactr.index',['empresa'=>$empresa]);
    }
    public function guardar(Request $request){
        if($request->ajax()){
            $empresa=new empresactr();
            $empresa->nit=$request->nit;
            $empresa->razsoc=$request->razonsoc;
            $empresa->correo=$request->correo;
            $empresa->celular=$request->celular;
            $empresa->save();
            return response()->json("Se creo el registro");
        }
    }
    public function editar(Request $request){
        if($request->ajax()){
            $empresa=empresactr::find($request->id)->get();
            return response()->json($empresa);
        }
    }
    public function actualizar(Request $request){
        if($request->ajax()){
            $empresa=empresactr::where('id','=',$request->id)->update(['nit'=>$request->nit,'razsoc'=>$request->razonsoc,'correo'=>$request->correo,'celular'=>$request->celular]);
            return response()->json("Se actualizo el registro");
        }
    }
    public function eliminar(Request $request){
        if($request->ajax()){
            $empresa=empresactr::find($request->id);
            $empresa->delete();
            return response()->json("Se elimino el registro");
        }
    }
}
