<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private const PRODUCTS = [
        ['id' => 1, 'name' => 'Phone', 'price' => 999],
        ['id' => 2, 'name' => 'Laptop', 'price' => 1500],
    ];


    #[Route('/products', name: 'get_products', methods: [Request::METHOD_GET])]
    public function getProducts(): JsonResponse
    {
        return new JsonResponse(['data' => self::PRODUCTS], Response::HTTP_OK);
    }


    #[Route('/products/{id}', name: 'get_product_item', methods: [Request::METHOD_GET])]
    public function getProductItem(int $id): JsonResponse
    {
        $product = array_filter(self::PRODUCTS, fn($item) => $item['id'] === $id);

        if (empty($product)) {
            return new JsonResponse(
                ['error' => 'Product not found'],
                Response::HTTP_NOT_FOUND
            );
        }

        return new JsonResponse(['data' => array_values($product)[0]], Response::HTTP_OK);
    }


    #[Route('/products', name: 'post_products', methods: [Request::METHOD_POST])]
    public function createProduct(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $newProduct = [
            'id' => random_int(1000, 9999),
            'name' => $data['name'],
            'price' => $data['price'],
        ];


        return new JsonResponse(['data' => $newProduct], Response::HTTP_CREATED);
    }
}