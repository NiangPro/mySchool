<?php

namespace App\Traits;

use App\Models\Classe;
use App\Models\Role;
use App\Models\Permission;
use App\Models\SchoolYear;

trait HasRolesAndPermissions
{

    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    /**
     * @return mixed
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }

    /**
     * @return mixed
     */
    public function classes()
    {
        return $this->belongsToMany(Classe::class, 'users_classes')->withPivot('school_year_id');
    }

    /**
     * @return mixed
     */
    public function schoolyears()
    {
        return $this->belongsToMany(SchoolYear::class, 'users_classes')->withPivot('classe_id');
    }
}
