<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipherra;

class TipherraController extends Controller
{
	public function index(){
		$tipherra=tipherra::all();
		return view('Tipherra.index',['tipherra'=>$tipherra]);
	}
	public function guardar(Request $request){
		if($request->ajax()){
			$tipherra=new tipherra();
			$tipherra->nombre=$request->nombre;
			$tipherra->save();
			return response()->json("se creo el registro");
		}
	}
	public function editar(Request $request){
		if($request->ajax()){
			$tipherra=tipherra::where('id','=',$request->id)->get();
			return response()->json($tipherra);
		}
	}
	public function actualizar(Request $request){
		if($request->ajax()){
			$tipherra=tipherra::where('id','=',$request->id)->update(['nombre'=>$request->nombre]);
			return response()->json("se actualizo el registro");
		}
	}
	public function eliminar(Request $request){
		if($request->ajax()){
			$tipherra=tipherra::where('id','=',$request->id);
			$tipherra->delete();
			return response()->json("se elimino el registro");
		}
	}
}
