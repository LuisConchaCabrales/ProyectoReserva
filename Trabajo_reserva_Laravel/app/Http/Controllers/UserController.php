<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portatil;
use App\Models\Reserva;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $UserRequest)
    {
        $user=new User();
        $user->name=$UserRequest["name"];
        $user->surname=$UserRequest["surname"];
        $user->username=$UserRequest["username"];
        $user->email=$UserRequest["email"];
        $user->password=bcrypt($UserRequest["password"]);
        $user->save();
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
    public function destroy(string $id)
    {
        //
    }
}
