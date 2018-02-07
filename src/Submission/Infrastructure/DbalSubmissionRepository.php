<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 07/02/2018
 * Time: 05:45
 */

namespace Vichansy\Submission\Infrastructure;

use Doctrine\DBAL\Connection;
use Vichansy\Submission\Domain\Submission;
use Vichansy\Submission\Domain\SubmissionRepository;

final class DbalSubmissionRepository implements SubmissionRepository
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }
    public function add(Submission $submission): void
    {
        $qb = $this->connection->createQueryBuilder();
        $qb->insert('submissions');
        $qb->values([
            'id' => $qb->createNamedParameter($submission->getId()->toString()),
            'title' => $qb->createNamedParameter($submission->getTitle()),
            'url' => $qb->createNamedParameter($submission->getUrl()),
            'creation_date' => $qb->createNamedParameter(
                $submission->getCreationDate(),
                'datetime'
            ),
        ]);

        $qb->execute();
    }
}