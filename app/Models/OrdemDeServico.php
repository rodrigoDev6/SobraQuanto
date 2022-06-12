<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Servico;
use Illuminate\Http\Request;

class OrdemDeServico extends Model
{
    use HasFactory;
    protected $table = 'ordemServico';

    public function OrdemDeServico(){
        return $this->hasOne(Servico::class, 'id', 'categoria_id');
    }
  
}
           