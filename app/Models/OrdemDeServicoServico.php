<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\OrdemDeServico;
use App\Models\Servico;



class ordemDeServicoServico extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'ordem_servico_servico';

    public function ordemDeServico()
    {
        return $this->hasOne(OrdemDeServico::class, 'id', 'ordem_servico_id');
    }

    public function servico()
    {
        return $this->hasOne(Servico::class, 'id', 'servico_id');
    }

    public function getServicoNomeAttribute()
    {
        return $this->servico->nome;
    }
    
}
