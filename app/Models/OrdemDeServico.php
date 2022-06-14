<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Cliente;
use App\Models\Servico;
use App\Models\OrdemDeServicoStatus;

class OrdemDeServico extends Model
{
    use HasFactory;
    protected $table = 'ordem_de_servico';

    public function Cliente(){
        return $this->hasOne(Cliente::class, 'id', 'cliente_id');
    }

    public function Servico(){
        return $this->hasOne(Servico::class, 'id', 'servico_id');
    }

    public function OrdemDeServicoStatus(){
        return $this->hasOne(OrdemDeServicoStatus::class, 'id', 'servico_status_id');
    }
}
