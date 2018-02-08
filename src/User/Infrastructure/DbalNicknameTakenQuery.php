<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 08/02/2018
 * Time: 06:03
 */

namespace Vichansy\User\Infrastructure;

use Doctrine\DBAL\Connection;
use Vichansy\User\Application\NicknameTakenQuery;

final class DbalNicknameTakenQuery implements NicknameTakenQuery
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function execute(string $nickname): bool
    {
        $qb = $this->connection->createQueryBuilder();

        $qb->select('count(*)');
        $qb->from('users');
        $qb->where("nickname = {$qb->createNamedParameter($nickname)}"); $qb->execute();

        $stmt = $qb->execute();
        return (bool)$stmt->fetchColumn();
    }
}