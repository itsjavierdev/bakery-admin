<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;


class Role extends SpatieRole
{
    protected $connection = 'admin_connection';
}