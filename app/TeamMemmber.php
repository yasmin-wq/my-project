<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMemmber extends Model
{
    protected $fillable = [
        'team_id', 'user_id',
    ];

    // علاقة الانتماء إلى الفريق
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    // علاقة الانتماء إلى المستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
