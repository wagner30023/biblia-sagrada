<?php

namespace App\Http\Controllers;

use App\Models\Versao;
use Illuminate\Http\Request;

class VersaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Versao::all();

        if ($data) {
            return response()->json([
                'message' => 'Resultados da pesquisa',
                'data' => $data
            ]);
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
            $data = Versao::create($request->all());

            if ($data) {
                return response()->json([
                    'success' => 'Registro criado com sucesso.'
                ]);
            }

            return response()->json([
                'error' => 'Não foi possível criar o registro.'
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($versao)
    {
        try {
            $data = Versao::find($versao);

            if ($data) {
                // vincula o idioma cadastrado
                $data->idioma;
                $data->livros;
                return response()->json([
                    'resultado da pesquisa',
                    'data' => $data
                ]);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $versao)
    {
        try {
            $data = Versao::find($versao);

            if ($data) {
                $data->update($request->all());

                return response()->json([
                    'success' => 'Registro atualizado com sucesso',
                    'data' => $data
                ]);
            }

            return response()->json([
                'error' => 'Não foi possível atualizar o registro'
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
    public function destroy($versao)
    {
        try {
            $delete = Versao::destroy($versao);

            if($delete){
                return response()->json([
                    'sucess' => 'registro excluído com sucesso',
                ]);
            }

            return response()->json([
                'error' => 'não foi possível excluir este registro'
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
