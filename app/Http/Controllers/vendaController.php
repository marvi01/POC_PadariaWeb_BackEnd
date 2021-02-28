<?php

namespace App\Http\Controllers;
use App\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class vendaController extends Controller
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
        $venda = Venda::all();
        if($venda){
        return response()->json(['data'=> $venda,'status'=>200]);
        }else{
        return response()->json(['data'=> 'Nenhum Compra encontrado','status'=>403]); 
        }
    }
    public function listCompra($id){
        $itens = DB::table('Compra')
                            ->select(DB::raw('*'))
                            ->where('users_id', '=', $id)
                            ->get();
        if(sizeof($itens) != null){
            return response()->json(['data'=>$itens, 'status'=>200]);
        }else{
            return response()->json(['data'=>'Nenhum Pedido encontrado','status'=>403]);
        }
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
    public function listVendaUser($id){
        $itens = DB::table('Venda')
                            ->select(DB::raw('*'))
                            ->where('users_id', '=', $id)
                            ->get();
        if(sizeof($itens) != null){
            return response()->json(['data'=>$itens, 'status'=>200]);
        }else{
            return response()->json(['data'=>'Nenhum Pedido encontrado','status'=>403]);
        }
    }
    public function listVendas(){
        $itens = DB::table('Venda')
                            ->select(DB::raw('*'))
                            ->where('confirm', '=', 1)
                            ->get();
        if(sizeof($itens) != null){
            return response()->json(['data'=>$itens, 'status'=>200]);
        }else{
            return response()->json(['data'=>'Nenhum Pedido encontrado','status'=>403]);
        }
    }
    
    public function listPedidos(){
        $itens = DB::table('Venda')
                            ->select(DB::raw('*'))
                            ->where('confirm', '=', 0)
                            ->get();
        if(sizeof($itens) != null){
            return response()->json(['data'=>$itens, 'status'=>200]);
        }else{
            return response()->json(['data'=>'Nenhum Pedido encontrado','status'=>403]);
        }
    }
    
    public function confirmarPedido($id){
        $update = DB::table('venda')->where('id', '=' , $id)->update(['confirm'=>1]);
        if($update != 0){
         return response()->json(['data'=>'Pedido realizado com sucesso','status'=>200]);
        }else{
         return response()->json(['error'=>'Pedido ja confirmado','status'=>403]);
        }
         
     }
    public function store(Request $request)
    {
        $dados = $request->all();
        $venda = Venda::create($dados);
        if ($venda) {
            return response()->json(['data'=> $venda]);
        } else {
            return response()->json(['data'=>'Erro ao criar uma venda']);
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
        $venda = Venda::find($id);
        if($venda){
            return response()->json(['data'=> $venda,'status'=>200]);
            }else{
            return response()->json(['data'=> 'Nenhum Compra encontrado','status'=>403]); 
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
        $venda = Venda::find($id);
        $dados = $request->all();
        
        if ($venda) {
            $venda->update($dados);
            return response()->json(['data'=>$venda]);
        } else {
            return response()->json(['data'=>'Erro ao editar esse Compra']);
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
        $venda = Venda::find($id);
        if ($venda) {
            $venda->delete();
            return response()->json(['data'=>'Compra removida com sucesso']);
        } else {
            return response()->json(['data'=>'Não foi possivel remover Compra']);
        }
    }
}
