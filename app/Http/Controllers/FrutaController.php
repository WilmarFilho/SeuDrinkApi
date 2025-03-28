<?php

namespace App\Http\Controllers;

use App\Models\Fruta;
use Illuminate\Http\Request;



class FrutaController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/frutas",
     *     summary="Lista todas as frutas filtradas",
     *     tags={"Frutas"},
     *     @OA\Parameter(
     *         name="nome",
     *         in="query",
     *         description="Nome da fruta",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Lista de frutas retornada com sucesso",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Fruta"))
     *     )
     * )
     */
    public function index(Request $request)
    {
        if ($request) {
            $fruta = Fruta::where('nome', 'like', $request->input('nome') . '%')->get();
        } else {
            $fruta = Fruta::all();
        }

        return response()->json($fruta);
    }

    /**
     * @OA\Post(
     *     path="/api/fruta/novo",
     *     summary="Cria uma nova fruta",
     *     tags={"Frutas"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={"nome"},
     *                 @OA\Property(property="nome", type="string", example="Maçã")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Fruta criada com sucesso",
     *         @OA\JsonContent(ref="#/components/schemas/Fruta")
     *     )
     * )
     */
    public function store(Request $request)
    {
        $novaFruta = Fruta::create([
            "nome" => $request->input("nome")
        ]);

        return response()->json(['message' => 'Fruta criada com sucesso!', 'data' => $novaFruta], 201);
    }

    /**
     * @OA\Put(
     *     path="/api/fruta/{id}",
     *     summary="Atualiza uma fruta existente",
     *     tags={"Frutas"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID da fruta",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={"nome"},
     *                 @OA\Property(property="nome", type="string", example="Pera")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Fruta atualizada com sucesso",
     *         @OA\JsonContent(ref="#/components/schemas/Fruta")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Fruta não encontrada"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string',
        ]);

        $fruta = Fruta::find($id);
        if (!$fruta) {
            return response()->json(['message' => 'Fruta não encontrada'], 404);
        }

        // Atualizar os campos da fruta
        $fruta->nome = $request->input('nome');
        $fruta->save();

        return response()->json(['message' => 'Fruta atualizada com sucesso!', 'data' => $fruta], 200);
    }

    
    public function destroy(Fruta $fruta)
    {
       
    }

    
}
