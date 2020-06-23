<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class userController extends Controller
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
        $user = User::all();
        return response()->json($user);
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
        $user = User::create($dados);
        if ($user) {
            return response()->json(['data'=> $user]);
        } else {
            return response()->json(['data'=>'Erro ao criar um Usuario']);
        }
    }

    
    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json(['data'=> $user]);
       } else {
           return response()->json(['Erro ao achar esse user ']);
       }
    }

    
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $dados = $request->all();
        
        if ($user) {
            $user->update($dados);
            return response()->json(['data'=>$user]);
        } else {
            return response()->json(['data'=>'Erro ao editar esse user']);
    }
    }

    
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['data'=>'user removida com sucesso']);
        } else {
            return response()->json(['data'=>'Não foi possivel remover user']);
        }
    }
}

