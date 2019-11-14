<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    public function index()
    {
        return $this->render('index.html.twig');
    }

    public function about()
    {
        return $this->render('about.html.twig');
    }

    public function services() {
        return $this->render('services.html.twig');
    }

    public function login() {
        return $this->render('login.html.twig');
    }
}
