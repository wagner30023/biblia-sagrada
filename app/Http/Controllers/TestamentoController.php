<?php

namespace App\Http\Controllers;

use App\Http\Resources\TestamentoCollection;
use App\Http\Resources\TestamentoResource;
use App\Models\Testamento;
use Illuminate\Http\Request;

class TestamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // $data = Testamento::all();
            $data = new TestamentoCollection(Testamento::all());
            return $data;
            // if ($data) {
            //     return response()->json([
            //         'message' => 'pesquisa referente a todos os testamentos encontrados',
            //         'data' => $data
            //     ]);
            // }

            return response()->json(['message' => 'Não foi possivel loacalizar a pesquisa relacionada']);


        } catch (\Exception $e) {
            return response()->json(['Error' => $e->getMessage()], 500);
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
            $data = Testamento::create($request->all());

            if ($data) {
                return response()->json([
                    'message' => 'Testamento criado com sucesso.'
                ]);
            }

            return response()->json([
                'Error' => 'não foi possível criar o registro.'
            ]);
        } catch (\Exception $e) {
            return response()->json(['Error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $testamento
     * @return \Illuminate\Http\Response
     */
    public function show($testamento)
    {
        try {
            $data = Testamento::with('livros')->find($testamento);

            if ($data) {
                // $data->testamento;
                // $data->livros;
                return new TestamentoResource($data);
            }

            return response()->json([
                'error' => 'pesquisa solicitada não encontrada'
            ], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $testamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $testamento)
    {
        try {
            $testamento = Testamento::findOrFail($testamento);
            $testamento->update($request->all());

            if ($testamento) {
                return response()->json(['success' => 'Testamento updated successfully', 'testamento' => $testamento], 201);
            }

            return response()->json(['error' => 'Erro ao atualizar o testamento', 'testamento' => $testamento], 401);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $testamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($testamento)
    {
        try {
            $data = Testamento::find($testamento);
            $data->delete();

            if ($data) {
                return response()->json(['success' => 'registro de testamento, deletado com sucesso'], 201);
            }

            return response()->json(['error' => 'Não foi possível deletar o registro'], 401);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
