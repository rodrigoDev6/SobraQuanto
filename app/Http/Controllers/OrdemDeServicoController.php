<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdemDeServicoController extends Controller
{
 
    public function fecharVenda(Request $request){
        
        $cart = (array) $request->session()->get('cart');
        // dd($cart);


        $servico = new OrdemServico;
        $servico->servico_id = $request->servico_id;          
        $venda->save();

        $total = 0;

        foreach ($cart as $key => $value) {
            $venda_produto = new VendaProduto;
            
            $venda_produto->venda_id = $venda->id;
            $venda_produto->produto_id = $value[0]['id'];
            $venda_produto->quantidade = $value[0]['quantidade'];
            $venda_produto->valor = $value[0]['valor'];
            $venda_produto->save();
    
            $total += $value[0]['valor'] * $value[0]['quantidade'];
        }

        $venda = Venda::findorfail($venda->id);
        $venda->total = $total;
        $venda->save();


        $request->session()->forget('cart');
        return redirect('/pdv')->with('status', 'Venda realizada com sucesso!');

    }
}
