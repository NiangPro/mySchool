<?php

namespace App\Traits;

use App\Models\User;


trait HasUsers
{

    /**
     * @return mixed
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_roles');
    }
}
