<?php

namespace Inferno\Foundation\Events\Permissions;

use Spatie\Permission\Models\Permission;

class PermissionDeleted
{
    private $permission;

    /**
     * PermissionDeleted constructor.
     */
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function getName()
    {
        return $this->permission->name;
    }
}
