<?php

namespace Prego;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;


class Project extends Model{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'prego_projects';


    public function scopePersonal($query){
        return $query->where('user_id', Auth::user()->id);
    }
}
