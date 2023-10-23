<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Rent extends Controller
{
    
   

    public function returnRentedCar(Request $req){
        $selectRend= [
            "DNI" => $req->get("DNI"),
            "Matricula" => $req->get("Matricula"),
            "Matricula2" => $req->get("Matricula")
        ];

        $selectCar = \DB::select('select
         (dias*((select precioDia from coches where Matricula = :Matricula2))) 
        as "Precio a pagar" , dias, DNI, Matricula
         from propiedades where DNI = :DNI and Matricula = :Matricula', $selectRend);
       
        $updateCar = \DB::table('propiedades')->where('Matricula','=', $selectRend["Matricula"])
        ->where('DNI','=', $selectRend["DNI"])
        ->update( ["entregado" => 1]);
        
        return response()->json($selectCar);
    }

    public function ranking(Request $req){

        $matricula = $req->get("Matricula");

        $rank = \DB::select('select count(Matricula) as "Num of rents", Matricula from propiedades where Matricula = ? and entregado  = 1  group by Matricula order by dias', [$matricula] );

        return response()->json($rank);
    }
}
