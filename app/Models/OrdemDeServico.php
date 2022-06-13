<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function OrdemServicoStatus(){
        return $this->hasOne(OrdemServicoStatus::class, 'id', 'servico_status_id');
    }
}
