<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 09/02/2018
 * Time: 04:48
 */

namespace Vichansy\User\Application;

use Vichansy\User\Domain\UserRepository;

final class LogInHandler
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(LogIn $command): void
    {
        $user = $this->userRepository->findByNickname($command->getNickname());
        if ($user === null) {
            return;
        }
        $user->logIn($command->getPassword());
        $this->userRepository->save($user);
    }
}