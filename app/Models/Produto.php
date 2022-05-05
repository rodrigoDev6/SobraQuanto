<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\CategoriaProduto;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';

    public function categoria()
    {
        return $this->hasOne(CategoriaProduto::class, 'id', 'categoria_id');

    }
}
