<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    protected $fillable = [
        'project_name',

         'description',

          'user_id',

           'budget',

           'status',

           'Value_Status',

           'start_date',
           
           'end_date',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // علاقة الانتماء إلى المدير
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
    public function phases()
    {
        return $this->hasMany(ProjectPhase::class);
    }

    // علاقة الموارد للمشروع
    public function resources()
    {
        return $this->hasMany(ProjectResource::class);
    }
}
