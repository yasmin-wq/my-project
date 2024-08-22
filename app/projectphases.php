<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class projectphases extends Model
{
    protected $fillable = [
        'project_id', 'name', 'description', 'start_date', 'end_date',
    ];

    // علاقة الانتماء إلى المشروع
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
