<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    protected $table = "matieres";

    protected $fillable = [
        'name',
        'libelle',
        'type_matiere_id',
        'coefficient',
    ];

    public function typeMatiere()
    {
        return $this->belongsTo("App\Models\TypeMatiere", "type_matiere_id");
    }

    public function cours()
    {
        return $this->hasMany(Cours::class);
    }
}
