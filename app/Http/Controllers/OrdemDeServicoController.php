<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrdemDeServico;
use App\Models\Cliente;
use App\Models\OrdemDeServicoStatus;
use App\Models\Servico;

class OrdemDeServicoController extends Controller
{
    public function index() {
        $ordemDeServico = OrdemDeServico::orderBy('id', 'ASC')->get();
        return view('ordemDeServico.index',['ordemDeServico' => $ordemDeServico]);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {

        $cliente = Cliente::orderBy('nome', 'ASC')->pluck('nome','id');
        
        $servico = Servico::orderBy('nome', 'ASC')->pluck('nome','id');
        
        $ordemDeServicoStatus = OrdemDeServicoStatus::orderBy('nome', 'ASC')->pluck('nome','id');
        
        $cartServico = (array) $request->session()->get('cartServico');
        // dd($cartServico);

        return view('ordemDeServico.create', ['cliente' => $cliente, 'servico' => $servico, 'status' => $ordemDeServicoStatus, 'cartServico' => $cartServico]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addServico(Request $request) {
        // echo getttype($cartServico), "\n";

        
        $collection = collect(
            [
                [
                    'id' => $request->servico_id,
                    'nome' => $request->nome,
                    'valor' => $request->valor,
                    'quantidade' => $request->quantidade,
                    'total' => $request->total,
                    ]
                    ]
                );
                
            //dd($collection);
            //1 verifica se existe uma $cartServico senão cria um novo
            $cartServico = (array) $request->session()->get('cartServico');

            if(!$cartServico){
                $request->session()->put('cartServico');
                $request->session()->push('cartServico', $collection);
            }
            else{//se existe acrescenta novo registro

            // 2 verifica se existe o produto se sim soma a quantidade
            $cartServico = (array) $request->session()->get('cart');

            foreach($cartServico as $key => $value){
                foreach( $value as $key => $value2){
                    if($value2['id'] == $request->id){
                        $cartServico[$key]['quantidade'] += $request->quantidade;
                        $cartServico[$key]['total'] += $request->total;
                        $request->session()->put('cart', $cartServico);
                        return redirect()->route('ordemDeServico.create');
                    }
                }
            }

            // 3 se não existe adiciona novo registro
            $request->session()->push('cartServico', $collection);

            $cartServico = (array) $request->session()->get('cartServico');
        }

        $servico['success'] = false;
        $servico['message'] = $request->quantidade.  'Serviço Adicionado ao Carrinho';
        echo json_encode($servico);


        return redirect('/ordemDeServico/create')->with('message', 'Serviço adicionado ao carrinho com sucesso!');


    }

    public function removeServico(Request $request, $key){

        $cartServico = (array) $request->session()->get('cartServico');
        unset($cartServico[$key]);
        $request->session()->forget('cartServico');
        $request->session()->put('cartServico', $cartServico);
        return redirect()->back()->with('message', 'Produto removido com sucesso'); 

    }




}
