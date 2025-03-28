<?php

namespace App\Http\Controllers;

use App\Models\Ingrediente;
use Illuminate\Http\Request;

class IngredienteController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/ingredientes",
     *     summary="Lista todos os ingredientes filtrados",
     *     tags={"Ingredientes"},
     *     @OA\Parameter(
     *         name="nome",
     *         in="query",
     *         description="Nome do ingrediente",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Lista de ingredientes retornada com sucesso",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Ingrediente"))
     *     )
     * )
     */
    public function index(Request $request)
    {
        if ($request) {
            $ingrediente = Ingrediente::where('nome', 'like', $request->input('nome') . '%')->get();
        } else {
            $ingrediente = Ingrediente::all();
        }

        return response()->json($ingrediente);
    }

    /**
     * @OA\Post(
     *     path="/api/ingrediente/novo",
     *     summary="Cria um novo ingrediente",
     *     tags={"Ingredientes"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={"nome"},
     *                 @OA\Property(property="nome", type="string", example="Açúcar")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Ingrediente criado com sucesso",
     *         @OA\JsonContent(ref="#/components/schemas/Ingrediente")
     *     )
     * )
     */
    public function store(Request $request)
    {
        $novoIngrediente = Ingrediente::create([
            "nome" => $request->input("nome")
        ]);

        return response()->json(['message' => 'Ingrediente criado com sucesso!', 'data' => $novoIngrediente], 201);
    }

    /**
     * @OA\Put(
     *     path="/api/ingrediente/{id}",
     *     summary="Atualiza um ingrediente existente",
     *     tags={"Ingredientes"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID do ingrediente",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={"nome"},
     *                 @OA\Property(property="nome", type="string", example="Sal")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Ingrediente atualizado com sucesso",
     *         @OA\JsonContent(ref="#/components/schemas/Ingrediente")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Ingrediente não encontrado"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string',
        ]);

        $ingrediente = Ingrediente::find($id);
        if (!$ingrediente) {
            return response()->json(['message' => 'Ingrediente não encontrado'], 404);
        }

        // Atualizar os campos do ingrediente
        $ingrediente->nome = $request->input('nome');
        $ingrediente->save();

        return response()->json(['message' => 'Ingrediente atualizado com sucesso!', 'data' => $ingrediente], 200);
    }

    
    public function destroy($id)
    {
        
    }
}
