<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriaServico;
use Illuminate\Http\Request;

class Ordensservico extends Model
{
    use HasFactory;
    protected $table = 'ordensServico';

    public function OrdensServico(){
        return $this->hasOne(CategoriaServico::class, 'id', 'categoria_id');
    }
  
}
           