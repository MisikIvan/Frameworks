<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[Route('/api/client')]
#[IsGranted('ROLE_CLIENT')]
class ClientController extends AbstractController
{
    #[Route('/dashboard', name: 'client_dashboard', methods: ['GET'])]
    public function dashboard(): JsonResponse
    {
        return new JsonResponse(['message' => 'Welcome Client!']);
    }
}
