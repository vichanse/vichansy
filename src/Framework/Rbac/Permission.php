<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 09/02/2018
 * Time: 05:30
 */

namespace Vichansy\Framework\Rbac;


abstract class Permission
{
    public function equals(Permission $permission): bool
    {
        return (get_class() === get_class($permission));
    }
}