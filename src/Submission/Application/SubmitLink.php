<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 07/02/2018
 * Time: 05:34
 */

namespace Vichansy\Submission\Application;

use Ramsey\Uuid\UuidInterface;

final class SubmitLink
{
    private $url;
    private $title;
    private $authorId;

    public function __construct(
        UuidInterface $auhorId,
        string $url,
        string $title
    ) {
        $this->url = $url;
        $this->title = $title;
        $this->authorId = $auhorId;
    }

    public function getAuthorId(): UuidInterface
    {
        return $this->authorId;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}