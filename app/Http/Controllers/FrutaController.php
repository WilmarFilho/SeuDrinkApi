<?php

namespace App\Http\Controllers;

use App\Models\Fruta;
use Illuminate\Http\Request;

class FrutaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request) {
            $fruta = Fruta::where('nome', 'like', $request->input('nome').'%')->get();
        } else {
            $fruta = Fruta::all();
        }

        return  response()->json($fruta);
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
        $novaFruta  = Fruta::create([
            "nome"=> $request->input("nome")
        ]);

        return response()->json(['message' => 'Fruta criada com sucesso!', 'data' => $novaFruta], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Fruta $fruta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fruta $fruta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fruta $fruta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fruta $fruta)
    {
        //
    }
}
