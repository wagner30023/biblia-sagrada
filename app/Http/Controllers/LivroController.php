<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;


class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = Livro::all();
            return $data;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
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
            $data = Livro::create($request->all());
            if ($data) {
                return response()->json([
                    'message' => 'success versiculo adicionado com sucesso',
                ], 201);
            }

            return response()->json([
                'message' => 'Não foi possivel registrar o versiculo',
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $livro
     * @return \Illuminate\Http\Response
     */
    public function show($livro)
    {
        try {
            $data = Livro::find($livro);
            if ($data) {
                $data->testamento;
                $data->versiculos;

                return $data;
            }

            return response()->json([
                'message' => 'nenhum resultado',
            ], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $livro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $livro)
    {
        try {
            $data = Livro::findOrFail($livro);
            $data->update($request->all());

            if ($data) {
                return response()->json([
                    'message' => 'Dados atualizados com sucesso',
                    'data' => $data,
                ], 201);
            }

            return response()->json([
                'message' => 'Não foi possivel atualizar o registro',
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($livro)
    {
        try {
            $data = Livro::find($livro);
            $data->delete();

            if ($data) {
                return response()->json([
                    'message' => 'Dados deletados com sucesso',
                ], 201);
            }

            return response()->json([
                'message' => 'Não foi possivel apagar o registro',
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
