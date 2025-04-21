<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


#[Route('/api/manager')]
#[IsGranted('ROLE_MANAGER')]
class ManagerController extends AbstractController
{
    #[Route('/dashboard', name: 'manager_dashboard', methods: ['GET'])]
    public function dashboard(): JsonResponse
    {
        return new JsonResponse(['message' => 'Welcome Manager!']);
    }
}
