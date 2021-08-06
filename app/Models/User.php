<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\HasRolesAndPermissions;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRolesAndPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'prenom',
        'nom',
        'username',
        'nationalite',
        'sexe',
        'adresse',
        'datenais',
        'lieunais',
        'tel',
        'photo',
        'email',
        'password',
        'father_name',
        'mother_name',
        'parent_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // return one level of child items
    public function enfants()
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    // recursive relationship
    public function tuteur()
    {
        return $this->belongsTo("App\Models\User", 'parent_id');
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['datenais'])->age;
    }

    public function cours()
    {
        return $this->hasMany(Cours::class);
    }

    public function isAdmin()
    {
        foreach (Auth::user()->roles as $role) {
            if ($role->slug === "admin")
                return true;
        }
        return false;
    }

    public function isTutor()
    {
        foreach (Auth::user()->roles as $role) {
            if ($role->slug === "tuteur")
                return true;
        }
        return false;
    }

    public function isTeacher()
    {
        foreach (Auth::user()->roles as $role) {
            if ($role->slug === "enseignant")
                return true;
        }
        return false;
    }

    public function isStudent()
    {
        foreach (Auth::user()->roles as $role) {
            if ($role->slug === "apprenant")
                return true;
        }
        return false;
    }
}
