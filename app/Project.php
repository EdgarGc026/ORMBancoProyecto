<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model{
    // referenciar a que tabla perteneces, se logra agregando las llaves del proyecto
    protected $table = 'projects';
    protected $primaryKey = 'project_id';

    protected $fillable = [
        'city_id', 
        'company_id', 
        'user_id', 
        'name', 
        'execution_date', 
        'is_active'
    ];

    protected $guarded = [];




}
