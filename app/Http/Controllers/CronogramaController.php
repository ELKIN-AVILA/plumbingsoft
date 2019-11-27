<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cronograma;
use App\detcronograma;

class CronogramaController extends Controller
{
    public function index(){
        $cronograma=cronograma::all();
        $detcronograma=detcronograma::all();
        return view("Cronograma.index",['cronograma'=>$cronograma,'detcronograma'=>$detcronograma]);
    }
    public function guardar(Request $request){
        if($request->ajax()){
            
        }
    }
}
