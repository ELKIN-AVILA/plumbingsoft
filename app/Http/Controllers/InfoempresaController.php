<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\infoempresa;
use App\Empresa;
use Illuminate\Support\Facades\DB;

class InfoempresaController extends Controller
{
    public function index(){
		$infoempresa=DB::table('infoempresa')->paginate(6);
		$empresa=Empresa::all();
		return view('Infoempresa.index',['infoempresa'=>$infoempresa,'empresa'=>$empresa]);
    }
    
    public function guardar(Request $request){
	    if($request->ajax()){
            $infoempresa=new infoempresa();
            $infoempresa->empresa_id=$request->empresa_id;
            $infoempresa->mision=$request->mision;
            $infoempresa->vision=$request->vision;
            $infoempresa->reglamento=$request->reglamento;
            $infoempresa->objetivos=$request->objetivos;
            $infoempresa->save();
		    return response()->json("se creo el registro");
	    }
    }
    public function editar(Request $request){
	    if($request->ajax()){
		    $infoempresa=infoempresa::find($request->id)->get();
		    return response()->json($infoempresa);
	    }
    }
    public function actualizar(Request $request){
	    if($request->ajax()){
		    $infoempresa=infoempresa::where('id','=',$request->id)->update(['empresa_id'=>$request->empresa_id,'mision'=>$request->mision,'vision'=>$request->vision,'reglamento'=>$request->reglamento,'objetivos'=>$request->objetivos]);
		    return response()->json("se actualizo el registro");
	    }
    }
    public function eliminar(Request $request){
	    if($request->ajax()){
		    $infoempresa=infoempresa::where('id','=',$request->id);
		    $infoempresa->delete();
		    return response()->json("se elimino el registro");
	    }
    }

}
