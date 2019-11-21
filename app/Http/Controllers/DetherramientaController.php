<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\herramientas;
use App\detherramientas;

class DetherramientaController extends Controller
{
    public function index(){
		$herramientas=detherramientas::All();
		$tipherra=herramientas::all();
		return view('Detherramientas.index',['herramientas'=>$herramientas,'detherramientas'=>$detherramientas]);
    }
    
    public function guardar(Request $request){
	    if($request->ajax()){
           $det=detherramientas::where('herramientas_id','=',$request->herramientas_id)->count(); 
           $detherra=new detherramientas();
           $detherra->herramientas_id=$request->herramientas_id;
           $detherra->codigo=$det+1;
           $detherra->save();
		    return response()->json("se creo el registro");
	    }
    }
    public function editar(Request $request){
	    if($request->ajax()){
		    $herramientas=herramientas::find($request->id)->get();
		    return response()->json($herramientas);
	    }
    }
    public function actualizar(Request $request){
	    if($request->ajax()){
            $herramientas=herramientas::where('id','=',$request->id)->update(['nombre'=>$request->nombre,'tipherra_id'=>$request->tipherra_id]);
		    return response()->json("se actualizo el registro");
	    }
    }
    public function eliminar(Request $request){
	    if($request->ajax()){
		    $herramientas=herramientas::where('id','=',$request->id);
		    $herramientas->delete();
		    return response()->json("se elimino el registro");
	    }
    }
}
