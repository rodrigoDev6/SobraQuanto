<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\VendaProduto;

class PdvController extends Controller
{
    public function index(){
        $produtos = Produto::orderby('id', 'ASC')->get();
        return view('pdv.index',['produtos' => $produtos]);
        
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addProduto(Request $request)
    {
        //echo getttype($cart), "\n";

       
        $collection = collect(
            [
            [
                'id' => $request->id,
                'nome' => $request->nome,
                'valor' => $request->valor,
                'quantidade' => $request->quantidade,
                'total' => $request->total,
            ]
            ]
            );

            //1 verifica se existe senão cria um novo
            $cart = (array) $request->session()->get('cart');

            if(!$cart){
                $request->session()->put('cart');
                $request->session()->push('cart', $collection);
            }
            else{//se existe acrescenta novo registro

            // 2 verifica se existe o produto se sim soma a quantidade
            $cart = (array) $request->session()->get('cart');

            foreach($cart as $key => $value){
                foreach( $value as $key => $value2){
                    if($value2['id'] == $request->id){
                        //echo('igual);
                        unset($cart[$key]);
                        $request->session()->forget('cart');
                        $request->session()->put('cart', $cart);
                        
                        }
                    }
                }

                //3 recoloca o carrinho com uma nova quantidade
                $request->session()->push('cart', $collection);

                $cart = (array) $request->session()->get('cart');
            }

            $produto['success'] = false;
            $produto['message'] = $request->quantidade.  ' Produto Adicionado ao Carrinho';   
            echo json_encode($produto);
 
            return redirect('/pdv')->with('status', 'Produto adicionado ao carrinho com sucesso!');

    }

    public function removeProduto(Request $request, $key){

        $cart = (array) $request->session()->get('cart');
        unset($cart[$key]);
        $request->session()->forget('cart');
        $request->session()->put('cart', $cart);
        return redirect()->back()->with('message', 'Produto excluido com sucesso'); 

    }

    public function carrinho(Request $request){

        $cart = (array) $request->session()->get('cart');
        return view('pdv.carrinho', ['cart' => $cart]);
        /*foreach ($cart as $key => $value) {
            //echo($value[$key]['nome']);
            //echo $key . ' - ' . gettype($value), "\n";
            foreach ($value as $key2 => $value2) {
                //echo gettype($value2), "\n";
                echo($value2['id'] . ' - ' . $value2['nome'] . ' - ' . $value2['quantidade'] . ' - ' . $value2['valor']);
                //echo($value[$key]->nome);
                echo('<br>');
            }
        }*/
        }

    
}
