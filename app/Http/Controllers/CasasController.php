<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\obras;
use App\etapas;
use App\secciones;
use App\tipedificacion;
use App\casas;
class CasasController extends Controller
{
    public function index(){
        $obras=obras::all();
        $etapas=etapas::all();
        $secciones=secciones::all();
        $tipedificacion=tipedificacion::all();
        $casas=casas::all();
        return view('Casas.index',['casas'=>$casas,'obras'=>$obras,'etapas'=>$etapas,'secciones'=>$secciones,'tipedificacion'=>$tipedificacion]);
    }
    public function guardar(Request $request){
        if($request->ajax()){
            $casas=casas::where('secciones_id','=',$request->secciones_id)->count();
            $val=1;
            if(intval($casas)==0){
                for($i=0;$i< intval($request->cantidad);$i++){
                    $casa=new casas();
                    $casa->nombre="Casa".intval($i+$val);
                    $casa->estado="PR"; /**poner un estado ejemplo sin programar */
                    $casa->secciones_id=$request->secciones_id;
                    $casa->tipedificacion_id=$request->tipedificacion_id;
                    $casa->save();
                }
                return response()->json("Se creo los registros");
                
            }else{

                for($i=0;$i< intval($request->cantidad);$i++){
                    $cont=$casas+intval($i+$val);
                    $casa=new casas();
                    $casa->nombre="Casa".$cont;
                    $casa->estado="PR"; /**poner un estado ejemplo sin programar */
                    $casa->secciones_id=$request->secciones_id;
                    $casa->tipedificacion_id=$request->tipedificacion_id;
                    $casa->save();
                }
                return response()->json("Se creo los registros");

            }
        }
    }
    public function traeetapas(Request $request){
        if($request->ajax()){
            $etapas=etapas::where('obras_id','=',$request->id)->get();
            return response()->json($etapas);
        }
    }
    public function traesecciones(Request $request){
        if($request->ajax()){
            $secciones=secciones::where('etapas_id','=',$request->id)->get();
            return response()->json($secciones);
        }
    }
    public function traecasas(Request $request){
        if($request->ajax()){
            $etapas=etapas::where('obras_id','=',$request->id)->get();
            $etapaso=array();
            $seccioneso=array();
            $casaso=array();
            foreach($etapas as $metapa){
                array_push($etapaso,$metapa->nombre);
                $secciones=secciones::where('etapas_id','=',$metapa->id)->get();
                foreach($secciones as $mseccion){
                    array_push($seccioneso,$mseccion->nombre);
                    $casas=casas::where('secciones_id','=',$mseccion->id)->get();
                    foreach($casas as $mcasa){
                        array_push($casaso,['id'=>$mcasa->id,'nombre'=>$mcasa->nombre]);
                    }
                }
            }
            return response()->json(['etapas'=>$etapaso,'secciones'=>$seccioneso,'casas'=>$casaso]);
        }
    }
}
