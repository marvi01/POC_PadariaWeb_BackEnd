<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Endereco;

class enderecoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       // header('Access-Control-Allow-Origin*','*');
    }

    public function index()
    {
        $endereco = endereco::all();
        return response()->json($endereco);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $endereco = endereco::create($dados);
        if ($endereco) {
            return response()->json(['data'=> $endereco]);
        } else {
            return response()->json(['data'=>'Erro ao criar uma categoria']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $endereco = endereco::find($id);
        if ($endereco) {
            return response()->json(['data'=> $endereco]);
       } else {
           return response()->json(['Erro ao achar esse endereco ']);
       }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $endereco = endereco::find($id);
        $dados = $request->all();
        
        if ($endereco) {
            $endereco->update($dados);
            return response()->json(['data'=>$endereco]);
        } else {
            return response()->json(['data'=>'Erro ao editar esse endereco']);
    }
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $endereco = endereco::find($id);
        if ($endereco) {
            $endereco->delete();
            return response()->json(['data'=>'endereco removida com sucesso']);
        } else {
            return response()->json(['data'=>'Não foi possivel remover endereco']);
        }
    }
}
