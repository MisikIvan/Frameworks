<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


#[Route('/api/admin')]
#[IsGranted('ROLE_ADMIN')]
class AdminController extends AbstractController
{
    #[Route('/dashboard', name: 'admin_dashboard', methods: ['GET'])]
    public function dashboard(): JsonResponse
    {
        return new JsonResponse(['message' => 'Welcome Admin!']);
    }
}
