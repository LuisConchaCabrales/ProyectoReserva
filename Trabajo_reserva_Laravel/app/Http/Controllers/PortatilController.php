<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portatil;
use App\Models\Reserva;
use App\Models\User;

class PortatilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portatiles=Portatil::all();
        return response()->json($portatiles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $PortatilRequest)
    {
        $portatil= new Portatil();
        $portatil->numeroPortatil=$PortatilRequest["numeroPortatil"];
        if($portatil->save())
        {
            response()->json(true);
        }
        else
        {
            response()->json(false);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy($numeroPortatil)
    {
        $portatil=Portatil::where("numero","=",$numeroPortatil)->get();
        $portatil->delete();
    }
}
