<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UsuariosController extends AbstractController
{
    #[Route('/usuarios/perfil', name: 'usuarios_perfil')]
    public function index(): Response
    {
        return $this->render('user/view-routes.html.twig', [
            'controller_name' => 'UsuariosControllerPhpController',
        ]);
    }
}
