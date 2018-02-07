<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 07/02/2018
 * Time: 06:07
 */

namespace Vichansy\Submission\Presentation;

use Vichansy\Framework\Csrf\StoredTokenValidator;
use Vichansy\Framework\Csrf\Token;
use Vichansy\Submission\Application\SubmitLink;

final class SubmissionForm
{
    private $storedTokenValidator;
    private $token;
    private $title;
    private $url;

    public function __construct(
        StoredTokenValidator $storedTokenValidator,
        string $token,
        string $title,
        string $url
    ) {
        $this->storedTokenValidator = $storedTokenValidator;
        $this->token = $token;
        $this->title = $title;
        $this->url = $url;
    }

    /**
     * @return string[] */
    public function getValidationErrors(): array
    {
        $errors = [];
        if (!$this->storedTokenValidator->validate(
            'submission',
            new Token($this->token)
        )) {
            $errors[] = 'Invalid token';
        }
        if (strlen($this->title) < 1 || strlen($this->title) > 200) {
            $errors[] = 'Title must be between 1 and 200 characters';
        }
        if (strlen($this->url) < 1 || strlen($this->url) > 200) {
            $errors[] = 'URL must be between 1 and 200 characters';
        }
        return $errors;
    }

    public function hasValidationErrors(): bool
    {
        return (count($this->getValidationErrors()) > 0);
    }

    public function toCommand(): SubmitLink
    {
        return new SubmitLink($this->url, $this->title);
    }
}