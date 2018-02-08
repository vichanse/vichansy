<?php declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: vichanse
 * Date: 08/02/2018
 * Time: 05:18
 */

namespace Vichansy\User\Application;

use Vichansy\User\Domain\UserRepository;
use Vichansy\User\Domain\User;

final class RegisterUserHandler
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function handle(RegisterUser $command): void
    {
        $user = User::register(
            $command->getNickname(),
            $command->getPassword()
        );
        $this->userRepository->add($user); }

}