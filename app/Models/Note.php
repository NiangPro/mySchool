<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = "notes";

    protected $fillable = [
        'valeur',
        'appreciation',
        'apprenant_id',
        'matiere_id',
        'period_id',
        'classe_id',
        'enseignant_id',
        'school_year_id'
    ];

    public function student()
    {
        return $this->belongsTo(User::class, "apprenant_id");
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, "enseignant_id");
    }

    public function period()
    {
        return $this->belongsTo(Period::class, "period_id");
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class, "matiere_id");
    }

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class, "school_year_id");
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, "classe_id");
    }
}
