<?php

namespace App\Http\Controllers;

use App\Models\Bebida;
use Illuminate\Http\Request;


class BebidaController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/bebidas",
     *     summary="Lista todas as bebidas filtradas",
     *     tags={"Bebidas"},
     *     @OA\Parameter(
     *         name="nome",
     *         in="query",
     *         description="Nome da bebida",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Lista de bebidas retornada com sucesso",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Bebida"))
     *     )
     * )
     */
    public function index(Request $request)
    {
        if ($request) {
            $bebida = Bebida::where('nome', 'like', $request->input('nome') . '%')->get();
        } else {
            $bebida = Bebida::all();
        }

        return response()->json($bebida);
    }

    /**
     * @OA\Post(
     *     path="/api/bebida/novo",
     *     summary="Cria uma nova bebida",
     *     tags={"Bebidas"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={"nome"},
     *                 @OA\Property(property="nome", type="string", example="Vodka")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Bebida criada com sucesso",
     *         @OA\JsonContent(ref="#/components/schemas/Bebida")
     *     )
     * )
     */
    public function store(Request $request)
    {
        $novaBebida = Bebida::create([
            "nome" => $request->input("nome")
        ]);

        return response()->json(['message' => 'Bebida criada com sucesso!', 'data' => $novaBebida], 201);
    }

    /**
     * @OA\Put(
     *     path="/api/bebida/{id}",
     *     summary="Atualiza uma bebida existente",
     *     tags={"Bebidas"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID da bebida",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={"nome"},
     *                 @OA\Property(property="nome", type="string", example="Cerveja")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Bebida atualizada com sucesso",
     *         @OA\JsonContent(ref="#/components/schemas/Bebida")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Bebida não encontrada"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string',
        ]);

        $bebida = Bebida::find($id);
        if (!$bebida) {
            return response()->json(['message' => 'Bebida não encontrado'], 404);
        }

        // Atualizar os campos da bebida
        $bebida->nome = $request->input('nome');
        $bebida->save();

        return response()->json(['message' => 'Bebida atualizada com sucesso!', 'data' => $bebida], 200);
    }

    
    public function destroy(Bebida $bebida)
    {
        
    }

    
}
