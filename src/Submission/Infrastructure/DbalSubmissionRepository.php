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
        $this->connection->exec(" 
            INSERT INTO
                submissions (id, title, url, creation_date) 
            VALUES (
                '{$submission->getId()->toString()}', '' ||
                '{$submission->getTitle()}',
                '{$submission->getUrl()}',
                '{$submission->getCreationDate()->format('Y-m-d H:i:s')}'
            ); 
        ");
    }
}