<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 09/02/2018
 * Time: 05:31
 */

namespace Vichansy\Framework\Rbac;


abstract class Role
{
    public function hasPermission(Permission $permission): bool
    {
        return in_array($permission, $this->getPermissions());
    }

    /**
     * @return Permission[]
     */
    abstract protected function getPermissions(): array;
}