<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cargos;
use App\pais;
use App\departamentos;
use App\ciudades;
use App\tipdoc;
use App\personas;
use App\Empresa;
use App\examenes;
use App\examenesxper;

class PersonasController extends Controller
{
    public function index(){
        $cargos=cargos::all();
        $pais=pais::all();
        $departamentos=departamentos::all();
        $ciudades=ciudades::all();
        $empresa=Empresa::all();
        $tipdoc=tipdoc::all();
        $personas=personas::all();
        $examenes=examenes::all();
        return view('Personas.index',['personas'=>$personas,'empresa'=>$empresa,'tipdoc'=>$tipdoc,'pais'=>$pais,'departamentos'=>$departamentos,'ciudades'=>$ciudades,'cargos'=>$cargos,'examenes'=>$examenes]);
    }
    public function guardar(Request $request){
        if($request->ajax()){
            $personas=new personas();
            $personas->cargos_id=$request->cargos_id;
            $personas->tipdoc_id=$request->tipdoc_id;
            $personas->numdoc=$request->numdoc;
            $personas->prinom=$request->prinom;
            $personas->segnom=$request->segnom;
            $personas->priape=$request->priape;
            $personas->segape=$request->segape;
            $personas->celular=$request->celular;
            $personas->pais_id=$request->pais_id;
            $personas->departamentos_id=$request->departamentos_id;
            $personas->ciudades_id=$request->ciudades_id;
            $personas->empresa_id=1;
            $personas->save();
            return response()->json("Se creo el registro");
        }
    }
    public function editar(Request $request){
        if($request->ajax()){
            $personas=personas::where('id','=',$request->id)->get();
            return response()->json($personas);
        }
    }
    public function actualizar(Request $request){
        if($request->ajax()){
            $personas=personas::where('id','=',$request->id)->update(['cargos_id'=>$request->cargos_id,'tipdoc_id'=>$request->tipdoc_id,'numdoc'=>$request->numdoc,'prinom'=>$request->prinom,'segnom'=>$request->segnom,'priape'=>$request->priape,'segape'=>$request->segape,'celular'=>$request->celular,'pais_id'=>$request->pais_id,'departamentos_id'=>$request->departamentos_id,'ciudades_id'=>$request->ciudades_id]);
            return response()->json("Se actualizo el registro");
        }
    }
    public function eliminar(Request $request){
        if($request->ajax()){
            $personas=personas::where('id','=',$request->id);
            $personas->delete();
            return response()->json("Se elimino el registro");
        }
    }
    public function getdepart(Request $request){
        if($request->ajax()){
            $departamentos=departamentos::where('pais_id','=',$request->id)->get();
            return response()->json($departamentos);
        }
    }
    public function getciudades(Request $request){
        if($request->ajax()){
            $ciudades=ciudades::where('departamentos_id','=',$request->id)->get();
            return response()->json($ciudades);
        }
    }
    public function guadarexamenesxper(Request $request){
        if($request->ajax()){
            $examenes=new examenesxper();
            $examenes->personas_id=$request->personas_id;
            $examenes->examenes_id=$request->examenes_id;
            $examenes->fecha=$request->fecha;
            $examenes->save();
            return response()->json("Se creo el registro");
        }
    }
    public function getexamenes(Request $request){
        if($request->ajax()){
            $examenes=examenesxper::where('personas_id','=',$request->id)->get();
            $exa=array();
            $fecha=array();
            foreach($examenes as $mexa){
                array_push($fecha,$mexa->fecha);
                $exam=examenes::where('id','=',$mexa->examenes_id)->get();
                foreach($exam as $mexamenes){
                    array_push($exa,$mexamenes->nombre);
                }
            }
            return response()->json(['examenes'=>$exa,'fecha'=>$fecha]);
        }
    }
}
