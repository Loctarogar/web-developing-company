<?php
declare(strict_types=1);

namespace App\Service\UserService;

use App\Entity\User;
use App\Form\Model\RegistrationFormModel;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserService
{
    public $userRepository;
    public $encoder;

    public function __construct(UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->userRepository = $userRepository;
        $this->encoder = $passwordEncoder;
    }

    /**
     * @param RegistrationFormModel $regUser
     */
    public function saveUser(RegistrationFormModel $regUser)
    {
        $user = new User();
        $user->setEmail($regUser->email);
        $user->setPassword($this->encoder->encodePassword($user, $regUser->password));
        $user->setFirstName($regUser->firstName);
        $user->setLastName($regUser->lastName);
        $user->setRoles(['ROLE_USER']);
        $this->userRepository->persist($user);
        $this->userRepository->flush();
    }
}
