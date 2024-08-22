<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class companies extends Model
{

    protected $fillable = [
        'name',

         'manager_id',







    ];
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    // علاقة الشركة بالمدير
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

}
