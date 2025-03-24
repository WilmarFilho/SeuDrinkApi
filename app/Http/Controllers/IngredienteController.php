<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use Illuminate\Http\Request;

class IngredienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request) {
            $ingrediente = Ingrediente::where('nome', 'like', $request->input('nome').'%')->get();
        } else {
            $ingrediente = Ingrediente::all();
        }

        return  response()->json($ingrediente);

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
        $novoIngrediente  = Ingrediente::create([
            "nome"=> $request->input("nome")
        ]);

        return response()->json(['message' => 'Ingrediente criado com sucesso!', 'data' => $novoIngrediente], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ingrediente $ingrediente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ingrediente $ingrediente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ingrediente $ingrediente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ingrediente $ingrediente)
    {
        //
    }
}
