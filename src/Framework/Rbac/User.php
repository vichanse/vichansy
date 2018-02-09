<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 09/02/2018
 * Time: 05:37
 */

namespace Vichansy\Framework\Rbac;


interface User
{
    public function hasPermission(Permission $permission): bool;
}