<?php

namespace App\Http\Controllers;

use App\Models\Sugestao;
use Illuminate\Http\Request;

class SugestaoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/sugestoes",
     *     summary="Lista todas as sugestões",
     *     tags={"Sugestões"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de sugestões retornada com sucesso",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Sugestao"))
     *     )
     * )
     */
    public function index()
    {
        $sugestoes = Sugestao::all();
        return response()->json($sugestoes);
    }

    /**
     * @OA\Post(
     *     path="/api/sugestao/novo",
     *     summary="Cria uma nova sugestão",
     *     tags={"Sugestões"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={"nome", "email", "nomeDrink", "ingredientes", "recado"},
     *                 
     *                 @OA\Property(property="nome", type="string", example="Wilmar"),
     *                 @OA\Property(property="email", type="email", example="wilmar@gmail.com"),
     *                 @OA\Property(property="nomeDrink", type="string", example="Mojito"),
     *                 @OA\Property(property="ingredientes", type="string", example="Sal, Açucar .."),
     *                 @OA\Property(property="recado", type="string", example="Misture tudo e ...")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Sugestão criada com sucesso",
     *         @OA\JsonContent(ref="#/components/schemas/Sugestao")
     *     )
     * )
     */
    public function store(Request $request)
    {
        $novaSugestao = Sugestao::create($request->all());

        return response()->json(['message' => 'Sugestão criada com sucesso!', 'data' => $novaSugestao], 201);
    }
}
