<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function employeeDetails()
    {
        return $this->hasOne(Employee::class);
    }

    public function education()
    {
        return $this->hasMany(EmployeeEducation::class);
    }

    public function experience()
    {
        return $this->hasMany(EmployeeExperience::class);
    }

    public function projectsManaging()
    {
        return $this->hasMany(Project::class, 'manager');
    }

    public function projectsPartOf()
    {
        return $this->belongsToMany(Project::class, 'project_squad');
    }
}
