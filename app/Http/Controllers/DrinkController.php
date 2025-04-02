<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use App\Models\DrinkIngrediente;
use Illuminate\Http\Request;



/**
 * @OA\Info(
 *      title="SeuDrink API",
 *      version="2.0.0",
 *      description="Documentação da API usando Swagger"
 * )
 * @OA\Server(
 *      url="https://apidrink.celleta.com/",
 *      description="Servidor de Produção"
 * )
 */

class DrinkController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/drink",
     *     summary="Lista todos os drinks filtrados",
     *     tags={"Drinks"},
     *     @OA\Parameter(
     *         name="fruta_id",
     *         in="query",
     *         description="ID da fruta usada no drink",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="bebida_id",
     *         in="query",
     *         description="ID da bebida usada no drink",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Lista de drinks retornada com sucesso",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Drink"))
     *     )
     * )
     */
    public function index(Request $request)
    {   
        
        $drinks = Drink::where('fruta_id', $request->input('fruta_id'))->with(['frutas' , 'bebidas'])->get();
        
        if($request->input('bebida_id')) {
            $drinks = Drink::where('fruta_id', $request->input('fruta_id'))
            ->where('bebida_id', $request->input('bebida_id'))->with(['frutas' , 'bebidas'])->get();
        }
        

        return response()->json($drinks);
    }

    /**
     * @OA\Get(
     *     path="/api/drink/nome",
     *     summary="Lista todos os drinks filtrados por nome",
     *     tags={"Drinks"},
     *     @OA\Parameter(
     *         name="nome",
     *         in="query",
     *         description="Nome do drink",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Lista de drinks retornada com sucesso",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Drink"))
     *     )
     * )
     */
    public function buscaPorNome(Request $request)
    {
        $drinks = Drink::where('nome', 'like', $request->nome . '%')
            ->with(['frutas', 'bebidas', 'ingredientes'])
            ->get();

        return response()->json($drinks);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/api/drink/novo",
     *     summary="Cria um novo drink",
     *     tags={"Drinks"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"nome", "foto", "preparo", "fruta_id", "bebida_id"},
     *                 @OA\Property(property="nome", type="string", example="Mojito"),
     *                 @OA\Property(property="foto", type="string", format="binary"),
     *                 @OA\Property(property="preparo", type="string", example="Misture hortelã, limão e rum"),
     *                 @OA\Property(property="fruta_id", type="integer", example=1),
     *                 @OA\Property(property="bebida_id", type="integer", example=2)
     *             )
     *         )
     *     ),
     *     
     *        
     *        
     *         
     *        
     *         
     *             
     *            
     *            
     *        
     *     
     *     @OA\Response(
     *         response=201,
     *         description="Drink criado com sucesso",
     *         @OA\JsonContent(ref="#/components/schemas/Drink")
     *     )
     * )
     */



    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required|string',
            'foto' => "required|image|mimes:webp|max:2348",
            'preparo' => 'required|string',
            'fruta_id' => 'required|integer',
            'bebida_id' => 'required|integer',
        ]);


        // Salvar a foto no storage e obter o caminho
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('uploads', 'public');
        } else {
            $path = null;
        }

        $novoDrink = Drink::create([
            "nome" => $request->input("nome"),
            "foto" => 'storage/' . $path,
            "preparo" => $request->input("preparo"),
            "fruta_id" => $request->input("fruta_id"),
            "bebida_id" => $request->input("bebida_id"),
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
     * @OA\Post(
     *     path="/api/drink/{id}",
     *     summary="Atualiza um drink existente",
     *     tags={"Drinks"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID do drink a ser atualizado",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 required={"nome", "foto", "preparo", "fruta_id", "bebida_id"},
     *                 @OA\Property(property="nome", type="string", example="Mojito"),
     *                 @OA\Property(property="foto", type="string", format="binary"),
     *                 @OA\Property(property="preparo", type="string", example="Misture hortelã, limão e rum"),
     *                 @OA\Property(property="fruta_id", type="integer", example=1),
     *                 @OA\Property(property="bebida_id", type="integer", example=2)
     *             )
     *         )
     *     ),
     *     
     *         
     *        
     *         
     *         
     *         
     *            
     *            
     *             
     *        
     *     
     *     @OA\Response(
     *         response=200,
     *         description="Drink atualizado com sucesso",
     *         @OA\JsonContent(ref="#/components/schemas/Drink")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Drink não encontrado"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'preparo' => 'required|string',
            'fruta_id' => 'required|integer|exists:frutas,id',
            'bebida_id' => 'required|integer|exists:bebidas,id',
        ]);

        // Buscar o drink pelo ID
        $drink = Drink::find($id);
        if (!$drink) {
            return response()->json(['message' => 'Drink não encontrado'], 404);
        }

        // Atualiza as informações do drink
        $drink->nome = $validated['nome'];
        $drink->preparo = $validated['preparo'];
        $drink->fruta_id = $validated['fruta_id'];
        $drink->bebida_id = $validated['bebida_id'];

        // Se a foto foi enviada, atualiza a foto
        if ($request->hasFile('foto')) {
            // Salvar a nova foto (exemplo)
            $path = $request->file('foto')->store('drinks_photos', 'public');
            $drink->foto = 'storage/' . $path;
        }

        

        // Salva as alterações
        $drink->save();

        return response()->json($drink, 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drink $drink)
    {
        //
    }
}
