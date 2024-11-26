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

        $data = array_map(function($zona) {
            return [
                'id' => $zona->getId(),
                'nombre' => $zona->getNombre(),
                'ubicacion' => $zona->getUbicacion(),
                'bloques' => count($zona->getBloques()),
                'totalAscensos' => $zona->getTotalAscensos() ?? 0,
                'acciones' => $zona->getId(), // Se utilizará para generar los botones
            ];
        }, $zonas);

        return new JsonResponse([
            'data' => $data,
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
            'draw' => intval(Request::createFromGlobals()->query->get('draw'))
        ]);
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

    #[Route('/details/{id}', name: 'api_zona_detail', methods: ['GET'])]
    public function getZonaDetail(Zonas $zona): JsonResponse
    {
        // Preparar los datos de la zona con sus relaciones
        $zonaData = [
            'id' => $zona->getId(),
            'nombre' => $zona->getNombre(),
            'ubicacion' => $zona->getUbicacion(),
            'descripcion' => $zona->getDescripcion(),
            'totalAscensos' => $zona->getTotalAscensos(),
            'bloques' => array_map(function($bloque) {
                return [
                    'id' => $bloque->getId(),
                    'nombre' => $bloque->getNombre(),
                    'descripcion' => $bloque->getDescripcion(),
                    'totalAscensos' => $bloque->getTotalAscensos(),
                    'vias' => array_map(function($via) {
                        return [
                            'id' => $via->getId(),
                            'nombre' => $via->getNombre(),
                            'gradoDificultad' => $via->getGradoDificultad(),
                            'totalAscensos' => $via->getTotalAscensos()
                        ];
                    }, $bloque->getVias()->toArray())
                ];
            }, $zona->getBloques()->toArray()),
            'restaurantes' => array_map(function($restaurante) {
                return [
                    'id' => $restaurante->getId(),
                    'nombre' => $restaurante->getNombre(),
                    'ubicacion' => $restaurante->getUbicacion(),
                    'contacto' => $restaurante->getContacto()
                ];
            }, $zona->getRestaurantes()->toArray())
        ];

        return new JsonResponse($zonaData);
    }
}
