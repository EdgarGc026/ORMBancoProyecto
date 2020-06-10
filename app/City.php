<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model{
    //agregando las referencias para verificar a que tabla pertenece
    protected $table = 'cities';
    protected $primaryKey = 'city_id';
}
