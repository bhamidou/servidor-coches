<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Propiedad extends Controller
{
    /**
     * Get all properties available
     */
    public function index()
    {
        $cars = \DB::table('propiedades')->where('disponible',1)->get();
        return response()->json($cars);
    }

    /**
     * Upload new property available
     */
    public function store(Request $req)
    {
        $newProperty = [
            "DNI" => strval($req->get("DNI")),
            "Matricula" => strval($req->get("Matricula")),
            "dias" => 0,
            "entregado" => 0
        ];
            
        $car = \DB::table('propiedades')->insert($newProperty);
        $rtnCar = "NOT RENTED PROPERTY";
        if($car){
            $rtnCar = "RENTED PROPERTY";
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
}
