<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    protected $fillable = [
        'name', 'project_id', 'leader_id',
    ];

    // علاقة الانتماء إلى المشروع
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // علاقة الانتماء إلى القائد
    public function leader()
    {
        return $this->belongsTo(User::class, 'leader_id');
    }

    // علاقة الانتماء إلى أعضاء الفريق
    public function members()
    {
        return $this->hasMany(TeamMember::class);
    }
}
