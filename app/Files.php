<?php

namespace Prego;

use Illuminate\Database\Eloquent\Model;

class Files extends Model{
    protected $table = "prego_files";

    public function scopeProject($query, $id){
        return $query->where('project_id', $id);
    }
}
