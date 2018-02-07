<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 07/02/2018
 * Time: 05:36
 */

namespace Vichansy\Submission\Application;

use Vichansy\Submission\Domain\SubmissionRepository;
use Vichansy\Submission\Domain\Submission;


final class SubmitLinkHandler
{
    private $submissionRepository;
    public function __construct(SubmissionRepository $submissionRepository)
    {
        $this->submissionRepository = $submissionRepository;
    }

    public function handle(SubmitLink $command): void
    {
        $submission = Submission::submit(
            $command->getUrl(),
            $command->getTitle()
        );
        $this->submissionRepository->add($submission);
    }
}