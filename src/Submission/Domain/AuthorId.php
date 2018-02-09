<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 09/02/2018
 * Time: 05:57
 */

namespace Vichansy\Submission\Domain;

use Ramsey\Uuid\UuidInterface;

final class AuthorId
{
    private $id;

    private function __construct(string $id)
    {
        $this->id = $id;
    }

    public static function fromUuid(UuidInterface $uuid): AuthorId
    {
        return new AuthorId($uuid->toString());
    }

    public function toString(): string
    {
        return $this->id;
    }
}