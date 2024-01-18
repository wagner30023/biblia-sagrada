<?php

namespace App\Http\Controllers;

use App\Http\Resources\IdiomaResource;
use Illuminate\Http\Request;


use App\Models\Idioma;

class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Idioma::all();

        if ($data) {
            return response()->json([
                'message' => 'resultados da pesquisa',
                'data' => $data
            ]);
        }

        return response()->json([
            'error' => 'Não foi possivel encontrar registros para esta pesquisa'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idioma = Idioma::create($request->all());
        if ($idioma) {
            return response()->json([
                'message' => 'Idioma cadastrado com sucesso',
                'idioma' => $idioma
            ],201);
        }

        return response()->json([
            'error' => 'não foi possivel cadastrar o registro',
        ],404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idioma)
    {
        $idioma = Idioma::with('versoes')->find($idioma);

        if ($idioma) {
            // vincula a versão cadastrada
            // $idioma->versoes;
            // return response()->json([
            //     'message' => 'resultado',
            //     'idioma' => $idioma
            // ],201);
            return new IdiomaResource($idioma);
        }

        return response()->json([
            'message' => 'registro não encontrado',
        ],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idioma)
    {
        $idioma = Idioma::find($idioma);

        if ($idioma) {
            $idioma->update($request->all());
            return response()->json([
                'sucess' => 'idioma atualizado com sucesso',
                'idioma' => $idioma
            ]);
        }

        return response()->json([
            'error' => 'não foi possível atualizar este registro'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idioma)
    {
        $idioma = Idioma::destroy($idioma);

        if ($idioma) {
            return response()->json([
                'sucess' => 'registro excluído com sucesso',
            ]);
        }

        return response()->json([
            'error' => 'não foi possível excluir este registro'
        ]);
    }
}
