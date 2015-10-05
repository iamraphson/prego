<?php

namespace Prego;

use Illuminate\Database\Eloquent\Model;

class Task extends Model{

    protected $table = 'prego_tasks';

    public function scopeProject($query, $id){
        return $query->where('project_id', $id);
    }
}
