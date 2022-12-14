<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function manager()
    {
        return $this->belongsTo(User::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'flavours');
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'project_squad');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
