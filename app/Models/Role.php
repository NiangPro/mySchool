<?php

namespace App\Models;

use App\Traits\HasUsers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, HasUsers;

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }

    public function allRolePermissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }
}
