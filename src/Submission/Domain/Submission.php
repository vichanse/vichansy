<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 06/02/2018
 * Time: 05:50
 */

namespace Vichansy\Submission\Domain;

use DateTimeImmutable;
use Ramsey\Uuid\UuidInterface;
use Ramsey\Uuid\Uuid;

final class Submission
{
    private $id;
    private $url;
    private $title;
    private $creationDate;
    private $authorId;

    private function __construct(
        UuidInterface $id,
        AuthorId $authorId,
        string $url,
        string $title,
        DateTimeImmutable $creationDate
    ) {
        $this->id = $id;
        $this->url = $url;
        $this->title = $title;
        $this->creationDate = $creationDate;
        $this->authorId = $authorId;
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCreationDate(): DateTimeImmutable
    {
        return $this->creationDate;
    }

    public function getAuthorId(): AuthorId
    {
        return $this->authorId;
    }

    public static function submit(
        UuidInterface $authorId,
        string $url,
        string $title
    ): Submission {
        return new Submission(
            Uuid::uuid4(),
            AuthorId::fromUuid($authorId),
            $url,
            $title,
            new DateTimeImmutable()
        );
    }

}