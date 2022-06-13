<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClienteStatus;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'cliente';

    public function ClienteStatus(){
        return $this->hasOne(ClienteStatus::class, 'id', 'status_id');
    }

    public function estado(){
        return $this->hasOnes(Estado::class, 'id', 'estado_id');
    }
}
