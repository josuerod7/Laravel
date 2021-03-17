<?php

namespace App\Http\Controllers;

use App\Models\Boletos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoletosController extends Controller
{
    public function getBoletos(){
        try{
        return response()->json(Boletos::all());
            
        }catch(\Exception $e ){
            return response()->json(["status"=>"error","data"=>$e->getMessage()],500);
        }

    }

    public function getBoletosforEvent($id){
        try{
        	$boletos = DB::table('boletos')->where('events_id', $id)->where('active',1)->get();
        	$numbers = DB::table('boletos')->where('events_id', $id)->count();
        return response()->json($boletos);
            
        }catch(\Exception $e ){
            return response()->json(["status"=>"error","data"=>$e->getMessage()],500);
        }

    }

}
