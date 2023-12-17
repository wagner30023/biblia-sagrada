<?php

namespace App\Http\Controllers;

use App\Models\Versiculo;
use Illuminate\Http\Request;

class VersiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Versiculo::all();
            return response()->json([
                'message' => 'Resultado da pesquisa',
                'data' => $data,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = Versiculo::create($request->all());

            if ($data) {
                return response()->json([
                    'message' => 'registro cadastrado com sucesso',
                    'data' => $data,
                ]);
            }

            return response()->json([
                'error' => 'Não foi possível cadastrar o registro',
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $versiculo
     * @return \Illuminate\Http\Response
     */
    public function show($versiculo)
    {
        try {
            $data = Versiculo::find($versiculo);

            if ($data) {
                return response()->json([
                    'results' => 'resultado da pesquisa',
                    'data' => $data,
                ]);
            }

            return response()->json([
                'error' => 'Nenhum resultado possível',
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $versiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $versiculo)
    {
        try {

            $data = Versiculo::find($versiculo);
            // dd($data);

            if ($data) {
                $data->update($request->all());
                return response()->json([
                    'success' => 'versiculo updated',
                    'data' => $data,
                ],201);
            }

            return response()->json([
                'error' => 'Não foi possível atualizar o versiculo',
                'data' => $data,
            ],404);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $versiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($versiculo)
    {
        try {
            $data = Versiculo::find($versiculo);
            $data->delete();

            if ($data) {
                return response()->json([
                    'deleted' => 'versiculo deleted',
                ]);
            }

            return response()->json([
                'error' => 'Não foi possível deletar o versiculo',
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}
