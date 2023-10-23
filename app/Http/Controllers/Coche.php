<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coches;

class Coche extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coches = \DB::table('coches')->get();
        return response()->json($coches);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $storeCar = [
            "Matricual" => $req->get("Matricual"),
            "Marca" => $req->get("Marca"),
            "Modelo" => $req->get("Modelo"),
            "precioDia" => $req->get("precioDia"),
        ];
        $store = \DB::insert('inser into coches (Matricula, Marca, Modelo, precioDia) values (?,?,?,?)')->get();
        return response()->json($store);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $matricula)
    {
        $coche = \DB::table('coches')->where('matricula',$matricula)->get();
        return response()->json($coche);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $matricula)
    {
        $precio = $req->get('precio');
        $MAX = 100;

        $coche = "NOT UPDATED PRICE";
        
        if($precio<=$MAX){
            $coche = \DB::table('coches')->where('matricula', '=',$matricula)->update(["precioDia"=> $precio]);
            $coche = Coche::show($matricula);
        }
        return response()->json($coche);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function ranking(){
        $rank = \DB::table('propiedades')->orderBy('dias','desc')->get();
        return response()->json($rank);
    }
}
