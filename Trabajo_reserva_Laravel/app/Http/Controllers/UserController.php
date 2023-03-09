<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portatil;
use App\Models\Reserva;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function inicioSesion()
    {
        return redirect()->action([ReservaController::class,"index"]);
    }

    public function logout(Request $resquest)
    {
        Auth::logout();
        $resquest->session()->invalidate();
        $resquest->session()->regenerateToken();
        return redirect("/");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios=User::all();
        echo response()->json($usuarios);
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
        if($UserRequest["password"]==$UserRequest["password2"])
        {
            $user->password=bcrypt($UserRequest["password"]);
            try
            {
                $user->save();
                return redirect('/login');
            }
            catch(Exception)
            {
                echo "<p>inicio se sesion ya existente</p>";
                echo "<p>";
                echo "<a href='/registro'>registrar otra cuenta</a>";
                echo "</p>";
                echo "<p>";
                echo "<a href='/login'>iniciar sesion</a>";
                echo "</p>";
            }
        }
        else
        {
            echo "<a href='/registro'>error en las contraseñas</a>";
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
    public function destroy(string $id)
    {
        //
    }
}
