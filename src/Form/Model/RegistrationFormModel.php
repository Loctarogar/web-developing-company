<?php
declare(strict_types=1);

namespace App\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

class RegistrationFormModel
{
    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     * @Assert\Length(max="255")
     *
     * @var string
     */
    public $email;

    /**
     * @var string[]
     */
    public $roles;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max="255")
     *
     * @var string
     */
    public $firstName;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max="255")
     *
     * @var string
     */
    public $lastName;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max="255")
     * @Assert\NotCompromisedPassword()
     *
     * @var string
     */
    public $password;
}