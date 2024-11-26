<?php

namespace App\Controller\Admin;

use App\Entity\Zonas;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin')]
class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'admin_dashboard')]
    public function dashboard(): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }

    #[Route('/zones/list', name: 'admin_zones')]
    public function zones(): Response
    {
        return $this->render('dashboard/zones/list.html.twig');
    }
    #[Route('/zones/create', name: 'admin_zones_create')]
    public function zonesCreateOne(): Response
    {
        return $this->render('dashboard/zones/new.html.twig');
    }
    #[Route('/zones/view/{id}', name: 'admin_zones_view')]
    public function zonesViewOne(Zonas $zona): Response
    {
        return $this->render('dashboard/zones/show.html.twig',[
            'zonaId' => $zona->getId()
        ]);
    }
}
