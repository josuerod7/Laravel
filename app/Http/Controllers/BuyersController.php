<?php

namespace App\Http\Controllers;

use App\Models\Buyers;
use App\Models\Reservations;
use App\Models\Boletos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BuyersController extends Controller
{
    public function createBuyers(Request $request){


		$buyer = Buyers::create([
		    'name' => $request->name,
		    'email' => $request->email,
		]);

		 $this->createReservations($buyer->id, $request->event_id, $request->id);
		 $this->updateBoleto($request->id);
		 
    }
   

    public function createReservations($id_buyer, $id_event, $id_boletos){
		$buyer = Reservations::create([
		    'boletos_id' => $id_boletos,
		    'events_id' => $id_event,
		    'buyers_id' => $id_buyer,
		]);

    }   

    public function updateBoleto($id){

		$boleto=Boletos::where('id', $id)
		      ->update(['active' => 0]);

    }



}
