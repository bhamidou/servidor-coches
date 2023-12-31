<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personas;

class Persona extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persona = Personas::all();
        return response()->json($persona);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $dni = strval($req->get("DNI"));
        $nombre = strval($req->get("Nombre"));
        $tfno = strval($req->get("Tfno"));
        $edad = strval($req->get("edad"));


        \DB::insert('insert into personas (DNI, Nombre, Tfno, edad) values (?, ?, ?, ?)', [$dni, $nombre ,$tfno , $edad ]);
        return response()->json($req);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $findPersona = \DB::select('select * from personas where DNI = ?', [$id]);
        return response()->json($findPersona);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $dni = strval($req->get("DNI"));
        $nombre = strval($req->get("Nombre"));
        $tfno = strval($req->get("Tfno"));
        $edad = strval($req->get("edad"));

        $update = \DB::select('update personas set DNI = ? , Nombre = ? , Tfno = ? , edad = ?  where DNI = ?', [$dni,$nombre, $tfno, $edad, $id]);
        return response()->json($update); // the var update don't get me anything
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = \DB::delete('delete from personas where DNI = ?', [$id]);
        
        if ($delete) {
            $rtnStr = "DELETED";
        }else {
            $rtnStr = "NOT DELETED";
        }
        return response()->json($rtnStr);
    }
}
