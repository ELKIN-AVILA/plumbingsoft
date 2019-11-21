<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\cargos;
class CargosController extends Controller
{
	public function index(){
		$cargos=DB::table('cargos')->paginate(6);
		return view('Cargos.index',['cargos'=>$cargos]);
	}
	public function guardar(Request $request){
		if($request->ajax()){
			$cargos=new cargos();
			$cargos->nombre=$request->nombre;
			$cargos->save();
			return response()->json("se creo el registro");
		}
	}
	public function editar(Request $request){
		if($request->ajax()){
			$cargos=cargos::where('id','=',$request->id)->get();
			return response()->json($cargos);
		}
	}
	public function actualizar(Request $request){
		if($request->ajax()){
			$cargos=cargos::where('id','=',$request->id)->update(['nombre'=>$request->nombre]);
			return response()->json("se actualizo el registro");
		}
	}
	public function eliminar(Request $request){
		if($request->ajax()){
			$cargos=cargos::where('id','=',$request->id);
			$cargos->delete();
			return response()->json("se elimino el registro");
		}
	}

    
}
