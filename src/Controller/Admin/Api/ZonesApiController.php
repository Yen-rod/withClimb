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

    #[Route('/list', name: 'zones_list', methods: ['GET'])]
    public function list(EntityManagerInterface $em): JsonResponse
    {
        $zonas = $em->getRepository(Zonas::class)->findAll();

        $data = [
            'data' => array_map(function($zona) {
                return [
                    'id' => $zona->getId(),
                    'nombre' => $zona->getNombre(),
                    'ubicacion' => $zona->getUbicacion(),
                    'bloques' => $zona->getBloques()->toArray(),
                    'totalAscensos' => $zona->getTotalAscensos() ?? 0,
                ];
            }, $zonas)
        ];

        return new JsonResponse($data);
    }

    #[Route('/{id}', name: 'zones_delete', methods: ['DELETE'])]
    public function delete(Zonas $zona, EntityManagerInterface $em): JsonResponse
    {
        try {
            $em->remove($zona);
            $em->flush();

            return new JsonResponse(['status' => 'success']);
        } catch (\Exception $e) {
            return new JsonResponse(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }
}
