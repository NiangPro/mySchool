<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    protected $table = "cours";

    protected $fillable = [
        'debut',
        'fin',
        'jour',
        'user_id',
        'classe_id',
        'classroom_id',
        'matiere_id',
        'school_year_id',
    ];

    public function matiere()
    {
        return $this->belongsTo("App\Models\Matiere", "matiere_id");
    }

    public function enseignant()
    {
        return $this->belongsTo("App\Models\User", "user_id");
    }

    public function salle()
    {
        return $this->belongsTo("App\Models\Classroom", "classroom_id");
    }

    public function classe()
    {
        return $this->belongsTo("App\Models\Classe", "classe_id");
    }

    public function schoolYear()
    {
        return $this->belongsTo("App\Models\SchoolYear", "school_year_id");
    }
}
