<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $table = "classes";

    protected $fillable = [
        'name',
        'libelle'
    ];

    public function cours()
    {
        return $this->hasMany(Cours::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'users_classes')->withPivot('school_year_id');
    }
}
