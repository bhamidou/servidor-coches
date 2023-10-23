<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Propiedad extends Controller
{
    /**
     * Get all properties available
     */
    public function showById(Request $req){
        $dni = $req->get("DNI");

        $showRents = \DB::select('select * from propiedades where dni = ? and entregado = 1', [$dni]);

        return response()->json($showRents);
    }

    public function index()
    {
        $cars = \DB::select('select * from coches where matricula =( select matricula from propiedades where entregado = 1)');
        return response()->json($cars);
    }

    /**
     * Upload new property available
     */
    public function store(Request $req)
    {
        $newRent = [
            "DNI" => strval($req->get("DNI")),
            "Matricula" => strval($req->get("Matricula")),
            "dias" => 0,
            "entregado" => 0
        ];
            
        $numRentsQuery = \DB::select('SELECT count(entregado) as "NumOfRents" FROM propiedades WHERE dni = ? and entregado = 0 GROUP by entregado ', [$req->get("DNI")]);

        $getNumRents = $numRentsQuery[0];

        $numOfRents = $getNumRents->NumOfRents;

        $rtnCar = "NOT RENTED PROPERTY";
        
        if($numOfRents<2){

            $checkCar = \DB::select('select * from coches where matricula = :Matricula', $newRent );
            dd($checkCar);
            if($checkCar){

                $car = \DB::table('propiedades')->insert($newRent);
            }
        
            if($car){
                $rtnCar = "RENTED PROPERTY";
            }
        }

        
        return response()->json($rtnCar);
    }

    /**
     * Return property by Id
     */
    public function show(string $id)
    {
       $car = \DB::table('propiedades')->where('id','=',$id)->get();
       return response()->json($car);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $updateCar = [
            "dias" => $req->get('dias'),
            "entregado" => $req->get('entregado')

        ];

        $car = \DB::table('propiedades')->where('id','=',$id)->update($updateCar);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = \DB::table('propiedades')->where('id','=',$id)->delete();
        
        return response()->json($car);
    }

}
