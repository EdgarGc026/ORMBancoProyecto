<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController{
    // Para traer los registros de la tabla
    public function getAllProjects(){
        $projects = Project::all();
        
        return $projects;
    }
    
    public function getTenProjects(){
        $projects = Project::take(10)->get();
        return $projects;
    }

// Si deseamos agregar un registro, utilizamos este metodo, en este caso
//son datos estaticos.

/*     public function insertProject(){
        $project = new Project;
        $project->city_id = 1;
        $project->company_id = 1;
        $project->user_id = 1;
        $project->name = 'Nombre del proyecto';
        $project->execution_date = '2020-06-09';
        $project->is_active = 1;
        $project->save();

        return "Ha sido guardado";
    } */

    //Es el mismo metodo, sin embargo, se utiliza la variable request, el cual guarda los datos dinamicos
    // de un formulario, por ejemplo.

    public function insertProject(Request $request){
        $project = new Project;
        

        $project->city_id = $request->cityId;
        $project->company_id = $request->companyId;
        $project->user_id = $request->userId;
        $project->name = $request->name;
        $request->execution_date = $request->executionDate;
        $request->is_active = $request->isActive; 
        $project->save();

        return "Ha sido guardado";
    }

// De manera estatica
    /* public function updateProject(){
        $project = Project::find(1);
        $project->name = 'Proyecto de C++';
        $project->save();

        return "Ha sido actualizado";
    } */

    // De manera dinamica
    public function updateProject(Request $request, $id){
        
        $project = Project::findOrFail($id);

        $project->city_id = $request->cityId;
        $project->company_id = $request->companyId;
        $project->user_id = $request->userId;
        $project->name = $request->name;
        $request->execution_date = $request->executionDate;
        $request->is_active = $request->isActive; 
        $project->save();

        return "Ha sido actualizado";
    }


    public function freezeProject(){
        Project::where('is_active', 0)->update(['name' =>'I am freeze, sorry']);

        return "Actualizado, Freezeado";
    }

    public function deleteProject(){
        // $project = Project::find(1);
        $project = Project::where('project_id', '>', 15)->delete();
        return "El registro ha sido eliminado";
        
    }

    public function deleteByIdProject(){
        $project = Project::findOrFail(1);
        $project->delete();

        return "Eliminado el registro por id";
    }

    public function deleteFreezeProject(){
        $project = Project::where('is_active', 0)->delete();
        return "Eliminado los proyectos inactivos";
        
    }

    // Eliminar los primeros 10
    public function deleteTenProject(){
       $project = Project::take(10)->delete();

       return "Los primeros 10 registros han sido eliminados";
    }

    // Global scope, aquellas que pueden restringuir cantidad
    // o valores que los modelos retornan a una condicion especifica

    public function scopeActive($query){

        Project::active()->get();
        return $query->where('is_active', 1);
    }
    
    // Query builder, interfaz para trabajar con las consultas de bd
    // de manera que, sea mas facil y evitar inyeccion de codigo
    // algunos ejemplos

/*     public function queryBuilders(){
        
        DB::table('projects')->get();
        DB::table('projects')->where('name', 'test')->fisrt();

        // Si queremos obtener directamente de la llave primaria
        DB::table('projects')->find(10);

        // Solo trae una columna
        DB::table('projects')->pluck('name');

        //Si deseas traer 2 columnas
        $project = DB::table('projects')->select('name', 'title as title_name')->get();


    } */
    

}