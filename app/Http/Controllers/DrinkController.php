<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use Illuminate\Http\Request;

class DrinkController extends Controller
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
    public function store(Request $request)
    {
        $novoDrink  = Drink::create([
            "nome"=> $request->input("nome"),
            "foto"=> $request->input("foto"),
            "preparo"=> $request->input("preparo"),
            "fruta_id"=> $request->input("fruta_id"),
            "bebida_id"=> $request->input("bebida_id"),
        ]);

        return response()->json(['message' => 'Drink criado com sucesso!', 'data' => $novoDrink], 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Drink $drink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Drink $drink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Drink $drink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drink $drink)
    {
        //
    }
}
