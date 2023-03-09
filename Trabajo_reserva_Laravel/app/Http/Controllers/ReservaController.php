<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portatil;
use App\Models\Reserva;
use App\Models\User;

class ReservaController extends Controller
{
    public function datos()
    {
        $reservas=Reserva::all();
        echo response()->json($reservas);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("vistas.reserva");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $ReservaRequest)
    {
        $reserva=new Reserva();
        $reserva->user_id=$ReservaRequest["id_usuario"];
        $reserva->portatil_id=$ReservaRequest["id_portatil"];
        $reserva->dia=$ReservaRequest["dia"];
        $reserva->hora=$ReservaRequest["hora"];
        $reserva->turno=$ReservaRequest["turno"];
        $reserva->save();
        return view("vistas.reserva");
    }

    /**
     * Display the specified resource.
     */
    public function show($hora,$dia)
    {
        $reserva=Reserva::where("hora","=",$hora)->where("dia","=",$dia)->first();
        if(count($reserva)>0)
        {
            response()->json(true);
        }
        else
        {
            response()->json(false);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
