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

    public function create() {
        
        $cliente = Cliente::orderBy('nome', 'ASC')->pluck('nome','id');
        $servico = Servico::orderBy('nome', 'ASC')->pluck('nome','id');
        $ordemDeServicoStatus = OrdemDeServicoStatus::orderBy('nome', 'ASC')->pluck('nome','id');
        return view('ordemDeServico.create', ['cliente' => $cliente, 'servico' => $servico, 'status' => $ordemDeServicoStatus]);
    }
    


}
