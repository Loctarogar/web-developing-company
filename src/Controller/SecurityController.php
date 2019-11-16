<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\Model\RegistrationFormModel;
use App\Service\UserService\UserService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use App\Form\Type\RegistrationFormModelType;

class SecurityController extends AbstractController
{
    /**
     * @var UserService
     */
    public $userService;

    /**
     * SecurityController constructor.
     *
     * {@inheritDoc}
     *
     * @param UserService $userService\
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param AuthenticationUtils $authenticationUtils
     *
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function register(Request $request)
    {
        $user = new RegistrationFormModel();
        $form = $this->createForm(RegistrationFormModelType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            $this->userService->saveUser($user);

            return $this->redirectToRoute('base_index');
        }

        return $this->render('security/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     *
     * @throws Exception
     */
    public function logout()
    {
        throw new \RuntimeException('This method can be blank - it will be intercepted by the logout key on your firewall');
    }
}
