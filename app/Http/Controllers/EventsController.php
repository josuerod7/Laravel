<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;


class EventsController extends Controller
{
    public function getEvents(){
        try{
        return response()->json(Events::all());
            
        }catch(\Exception $e ){
            return response()->json(["status"=>"error","data"=>"error"],500);
        }

    }
}
