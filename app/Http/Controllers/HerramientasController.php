<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\herramientas;
use App\tipherra;
class HerramientasController extends Controller
{
    public function index(){
		$herramientas=herramientas::All();
		$tipherra=tipherra::all();
		return view('Herramientas.index',['herramientas'=>$herramientas,'tipherra'=>$tipherra]);
    }
    
    public function guardar(Request $request){
	    if($request->ajax()){
            $herramientas=new herramientas();
            $herramientas->nombre=$request->nombre;
            $herramientas->tipherra_id=$request->tipherra_id;
            $herramientas->save();
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
