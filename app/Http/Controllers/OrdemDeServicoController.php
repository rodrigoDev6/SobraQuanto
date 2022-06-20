<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use App\Models\Cliente;
use App\Models\Servico;
use App\Models\OrdemDeServicoStatus;
use App\Models\OrdemDeServico;
use App\Models\OrdemDeServicoServico;

use PDF;

class OrdemDeServicoController extends Controller
{
    public function index() {
        $ordemDeServico = OrdemDeServico::orderBy('id', 'ASC')->get();
        $ordemDeServico = OrdemDeServico::paginate(6);
        Paginator::useBootstrap();
        
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id){
        // $ordemDeServico = OrdemDeServico::all()->find($id);
        //dd($ordemDeServico);
        return view('ordemDeServico.show', ['ordemDeServico' => $ordemDeServico]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param \App\Models\ordemDeServico $ordemDeServico
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        // ordem de servico principal
        $ordemDeServico = OrdemDeServico::findOrFail($id);
        $ordemDeServicoSevico = OrdemDeServicoServico::where('ordem_servico_id', $ordemDeServico->id)->get();

        $servicos = Servico::orderBy('nome', 'ASC')->pluck('nome','id');
        $cliente = Cliente::findOrFail($ordemDeServico->cliente_id);
        // dd($cliente);

        $ordemDeServicoStatus = OrdemDeServicoStatus::orderBy('nome', 'ASC')->pluck('nome','id');
        $status = OrdemDeServicoStatus::findOrFail($ordemDeServico->status_id);

        return view('ordemDeServico.edit', 
        [
        'ordemDeServico' => $ordemDeServico,
        'cliente' => $cliente, 'ordemDeServicoStatus' => $ordemDeServicoStatus, 'status' => $status,
        'servicos' => $servicos, 'ordemDeServicoSevico' => $ordemDeServicoSevico
        ]);
    }

    /**
     * Export content to PDF with View
     *
     * @param \App\Models\OrdemDeServicoServico $ordemDeServicoServico
     * @return void
     */
    public function downloadPdf($id)
    {
        $ordemDeServico = OrdemDeServico::where('id', $id)->first();
        $ordemDeServicoServico = OrdemDeServicoServico::where('ordem_servico_id', $ordemDeServico->id)->get();
        $cliente = Cliente::findOrFail($ordemDeServico->cliente_id);

        $data = [$ordemDeServico, $ordemDeServicoServico, $cliente];


        view()->share('data', $data);
        $pdf = PDF::loadView('ordemDeServico.pdf', $data);

        return $pdf->stream('ordemDeServico.pdf');
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
                    'nome' => $request->input('servicoNome'),
                    'valor' => $request->valor,
                    'quantidade' => $request->quantidade,
                    'total' => $request->total,
                    ]
                    ]
                );
                
            // dd($collection);
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

    public function novoServico(Request $request, $id){
        $ordemDeServico = OrdemDeServico::findOrFail($id);

        $servico = new OrdemDeServicoServico;
        $servico->ordem_servico_id = $ordemDeServico->id;
        $servico->servico_id = $request->servico_id;
        $servico->quantidade = $request->quantidade;
        $servico->valor = $request->valor;
        $servico->save();

        return redirect()->route('ordemDeServico.edit', $id);
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\OrdemDeServicoServico $ordemDeServicoServico
     * @return \Illuminate\Http\Response
     */
    public function destroyServicoServico($id)
    {
        $servico = OrdemDeServicoServico::findOrFail($id);
        // dd($servico);
        $servico->delete();

        return redirect()->back();
    }

    
    public function removeServico(Request $request, $key){
        $cartServico = (array) $request->session()->get('cartServico');
        unset($cartServico[$key]);
        $request->session()->forget('cartServico');
        $request->session()->put('cartServico', $cartServico);
        return redirect()->back()->with('message', 'Produto removido com sucesso'); 
    }

    public function removeCartServico(Request $request){
        $request->session()->forget('cartServico');
        return redirect()->back()->with('message', 'Todos os produtos foram removidos com sucesso'); 
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ordemDeServico $ordemDeServico
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id){
        $ordemDeServico = OrdemDeServico::findOrFail($id);
        $ordemDeServico->update($request->all());

        return redirect()->route('ordemDeServico')->with('message', 'Ordem de Serviço atualizada com sucesso!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function finalizarOrdem(Request $request){
        
        $cartServico = (array) $request->session()->get('cartServico');
        // dd($cartServico);

        $ordemDeServico = new OrdemDeServico();
        $ordemDeServico->cliente_id = $request->cliente_id;
        $ordemDeServico->status_id = $request->status_id;
        $ordemDeServico->forma_pagamento = $request->forma_pagamento;
        $ordemDeServico->data_abertura = $request->data_abertura;
        $ordemDeServico->data_fechamento = $request->data_fechamento;
        $ordemDeServico->observacao = $request->observacao;
        $ordemDeServico->save();

        $total = 0;

        foreach($cartServico as $key => $value){
            $servico = new ordemDeServicoServico();
            $servico->ordem_servico_id = $ordemDeServico->id;
            $servico->servico_id = $value[0]['id'];
            $servico->quantidade = $value[0]['quantidade'];
            $servico->valor = $value[0]['valor'];
            $servico->save();

            $total += $value[0]['valor'] * $value[0]['quantidade'];
        }

        $ordemDeServico = OrdemDeServico::findOrFail($ordemDeServico->id);
        $ordemDeServico->total = $total;
        $ordemDeServico->save();

        $request->session()->forget('cartServico');
        return redirect()->route('ordemDeServico')->with('message', 'Ordem de Serviço finalizada com sucesso!');
        
        
    }

}
