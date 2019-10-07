<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends ReadOnlyBase
{
    protected $tipos_array = [
        'Escritório', 
        'Espaço externo', 
        'Decoração'
    ];
}
