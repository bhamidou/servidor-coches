<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Propiedad extends Controller
{
    /**
     * Get all properties available
     */
    public function showById(Request $req){

        $arr = [
            "Matricula" => $req->get("Matricula"),
            "DNI" => $req->get("DNI"),
    ];

        $showRents = \DB::select('select *, (dias*(select precioDia from coches where Matricula = :Matricula))
         as "Pagado" from propiedades where dni = :DNI and entregado = 1', $arr);

        return response()->json($showRents);
    }

    public function index()
    {
        $cars = \DB::select('SELECT c.* FROM coches c LEFT JOIN propiedades p ON c.matricula = p.matricula WHERE p.matricula IS NULL OR p.entregado = 1 GROUP by c.Matricula');
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
    
        $rtnCar = "";
        if($numRentsQuery != null){
    
            $getNumRents = $numRentsQuery[0];
            
            $numOfRents = $getNumRents->NumOfRents;
        
            if($numOfRents<2){

                $checkCar = \DB::select('select * from coches where matricula = ?', [$newRent["Matricula"]]);

                if($checkCar != null){
                    $car = \DB::table('propiedades')->insert($newRent);
                    if($car != null){
                        $rtnCar = "RENTED PROPERTY";
                    }

                }else{
                    $rtnCar = "MATRICULA NOT FOUND";
                }

            }else{
                $showRents = \DB::select('select * from propiedades where dni = ? and entregado = 0', [$newRent["DNI"]]);
                $rtnCar = ["ALERT" =>"MAX 2 CARS", "RENTED CARS" => $showRents];
            }
        }else{

                $checkCar = \DB::select('select * from coches where matricula = ?', [$newRent["Matricula"]]);

                if($checkCar != null){
                    $car = \DB::table('propiedades')->insert($newRent);
                    if($car != null){
                        $rtnCar = "RENTED PROPERTY";
                    }

                }else{
                    $rtnCar = "MATRICULA NOT FOUND";
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
