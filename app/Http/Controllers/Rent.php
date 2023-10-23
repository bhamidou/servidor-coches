<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Rent extends Controller
{
    public function show(Request $req){
        $dni = $req->get("DNI");

        $showRents = \DB::select('select * from propiedades where dni = ? and entregado = 1', [$dni]);

        return response()->json($showRents);
    }
    public function rentCar(Request $req){

        $numRentsQeury = \DB::select('SELECT count(entregado) as "NumOfRents" FROM propiedades WHERE dni = ? and entregado = 0 GROUP by entregado ', [$req->get("DNI")]);
        // $num = $numRents[0]->NumOfRent;
        $getNumRents = $numRentsQeury[0];

        $numOfRents = $getNumRents->NumOfRents;
        
        if($numOfRents>2){
            $rtnMsg = $numRentsQeury;

        }else{
            $insertRent = [
                "DNI" => $req->get("DNI"),
                "Matricula" => $req->get("Matricula")
            ];

            $rtnMsg = \DB::insert('insert into propiedades (DNI, Matricula, dias,entregado) values (:DNI, :Matricula,0,0)', $insertRent);
        }
        
        return response()->json($rtnMsg);
    }

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
