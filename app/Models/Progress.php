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
        return [
            'not-started' => 'bg-gray-500',
            'in-progress' => 'bg-purple-500',
            'hold' => 'bg-pink-500',
            'stuck' => 'bg-red-500',
            'completed' => 'bg-green-500'
        ];
    }

    public static function getClass($status)
    {
        return self::status()[$status];
    }
}
