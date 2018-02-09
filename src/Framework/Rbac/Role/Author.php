<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 09/02/2018
 * Time: 05:35
 */

namespace Vichansy\Framework\Rbac\Role;

use Vichansy\Framework\Rbac\Permission\SubmitLink;
use Vichansy\Framework\Rbac\Role;

final class Author extends Role
{
    protected function getPermissions(): array
    {
        return [new SubmitLink()];
    }
}