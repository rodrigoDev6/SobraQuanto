<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Venda;

class VendaProduto extends Model
{
    use HasFactory;
    protected $table = 'venda_produto';

    public function venda()
    {
        return $this->hasOne(Venda::class, 'id', 'venda_id');
    }

}
