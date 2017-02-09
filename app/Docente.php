<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    //agrego los atributos para manipular el modelo
    protected $table = 'docente';
    protected $filltable = array('id', 'nombre', 'apellido', 'email');
}
