<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMatiere extends Model
{
    use HasFactory;

    protected $table = "type_matieres";

    protected $fillable= [
        'name',
        'libelle'
    ];

    public function matieres()
    {
        return $this->hasMany(Matiere::class);
    }
}
