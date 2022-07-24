<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'employee');
    }

    public static function status()
    {
        return ['not_started', 'in_progress', 'stuck', 'on_hold', 'completed'];
    }
}
