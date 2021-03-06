<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteEndereco extends Model
{
    protected $primaryKey = 'cliente_id';

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

}
