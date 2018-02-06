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

    private function __construct(
        UuidInterface $id,
        string $url,
        string $title,
        DateTimeImmutable $creationDate
    ){
        $this->id = $id;
        $this->url = $url;
        $this->title = $title;
        $this->creationDate = $creationDate;
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

    public static function submit(string $url, string $title): Submission {
        return new Submission(
            Uuid::uuid4(),
            $url,
            $title,
            new DateTimeImmutable()
        );
    }

}