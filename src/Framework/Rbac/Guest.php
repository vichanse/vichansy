<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 09/02/2018
 * Time: 05:38
 */

namespace Vichansy\Framework\Rbac;


final class Guest implements user
{
    public function hasPermission(Permission $permission): bool
    {
        return false;
    }
}