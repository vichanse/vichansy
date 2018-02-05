<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 05/02/2018
 * Time: 05:44
 */

namespace Vichansy\FrontPage\Infrastructure;

use Doctrine\DBAL\Connection;
use Vichansy\FrontPage\Application\Submission;
use Vichansy\FrontPage\Application\SubmissionsQuery;

final class DbalSubmissionQuery implements SubmissionsQuery
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function execute(): array
    {
        $qb = $this->connection->createQueryBuilder();

        $qb->addSelect('title');
        $qb->addSelect('url');
        $qb->from('submissions');
        $qb->orderBy('creation_date', 'DESC');

        $stmt = $qb->execute();
        $rows = $stmt->fetchAll();

        $submissions = [];
        foreach ($rows as $row) {
            $submissions[] = new Submission($row['url'], $row['title']);
        }
        return $submissions;
    }

}