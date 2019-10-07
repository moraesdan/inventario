<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends ReadOnlyBase
{
    protected $status_array = [
        'Em uso', 
        'Disponível', 
        'Necessita manutenção'
    ];

}
