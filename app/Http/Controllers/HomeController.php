<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\OrdemDeServico;
use App\Models\Produto;
use App\Models\Venda;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clientes = Cliente::all();
        $ordemDeServicos = OrdemDeServico::all();
        $vendas = Venda::where('created_at', '>=', Carbon::now()->subDays(7))->get();
        $produtos = Produto::all();

        return view('home', [
            'clientes' => $clientes,
            'ordemDeServicos' => $ordemDeServicos,
            'vendas' => $vendas,
            'produtos' => $produtos,
        ]);
    }
}
