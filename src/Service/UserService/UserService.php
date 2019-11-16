<?php
declare(strict_types=1);

namespace App\Service\UserService;

use App\Entity\User;
use App\Form\Model\RegistrationFormModel;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class UserService
{
    public $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param RegistrationFormModel $regUser
     */
    public function saveUser(RegistrationFormModel $regUser)
    {
        $user = new User();
        $user->setEmail($regUser->email);
        $user->setPassword($regUser->password);
        $user->setFirstName($regUser->firstName);
        $user->setLastName($regUser->lastName);
        $this->userRepository->persist($user);
        $this->userRepository->flush();
    }
}
