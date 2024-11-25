<?php

namespace App\Controller\Admin\Api;

use App\Entity\Zonas;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/zones')]
class ZonesApiController extends AbstractController
{
    #[Route('/create', name: 'zones_create', methods: ['POST'])]
    public function createZone(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        try {
            $data = json_decode($request->getContent(), true);

            $zona = new Zonas();
            $zona->setNombre($data['nombre']);
            $zona->setUbicacion($data['ubicacion']);
            $zona->setDescripcion($data['descripcion']);
            $zona->setTotalAscensos(0);

            $entityManager->persist($zona);
            $entityManager->flush();

            return new JsonResponse([
                'status' => 'success',
                'id' => $zona->getId()
            ], Response::HTTP_CREATED);

        } catch (\Exception $e) {
            return new JsonResponse([
                'status' => 'error',
                'message' => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
