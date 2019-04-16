<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function endereco()
    {
        return $this->hasOne('App\ClienteEndereco');
//        return $this->hasOne('App\ClienteEndereco', 'cliente_id','id');
    }
}
