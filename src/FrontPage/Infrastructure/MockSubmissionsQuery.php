<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 02/02/2018
 * Time: 06:43
 */

namespace Vichansy\FrontPage\Infrastructure;


use Vichansy\FrontPage\Application\Submission;
use Vichansy\FrontPage\Application\SubmissionsQuery;
final class MockSubmissionsQuery implements SubmissionsQuery {
    private $submissions;
    public function __construct() {
        $this->submissions = [
            new Submission('https://duckduckgo.com', 'DuckDuckGo'),
            new Submission('https://google.com', 'Google'),
            new Submission('https://bing.com', 'Bing'),
        ];
    }
    public function execute(): array {
        return $this->submissions; }
}