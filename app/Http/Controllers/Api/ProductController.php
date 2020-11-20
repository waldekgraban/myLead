<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use App\Services\ProductServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    private ProductServiceInterface $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Get the all products.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function getAllProducts(): JsonResponse
    {
        return new JsonResponse(
            $this->productService->getAllProducts()->toJson(JSON_PRETTY_PRINT),
            Response::HTTP_OK
        );
    }

    /**
     * Get a particular product by ID.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function getProduct(int $id): JsonResponse
    {
        $product = $this->productService->getProduct($id);

        if($product->exists()) {
            return new JsonResponse(
                $product->toJson(JSON_PRETTY_PRINT),
                Response::HTTP_OK
            );
        } else {
            return response()->json([
                "message" => "Product not found",
            ], 404);
        }
    }

    /**
     * Create a new product.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function createProduct(Request $request): JsonResponse
    {
        $product = $this->productService->createProduct($request);

        return new JsonResponse([
            "message" => "Product record created",
            Response::HTTP_OK
        ]);
    }

    /**
     * Update a product by ID.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request, $id): JsonResponse
    {
        $product = $this->productService->updateProduct($request, $id);

        return new JsonResponse([
            "message" => "Product record updated",
            Response::HTTP_OK
        ]);
    }

    /**
     * Delete a product by ID.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct(Request $request, $id)
    {
        $product = $this->productService->deleteProduct($id);

        return new JsonResponse([
            "message" => "Product record deleted",
            Response::HTTP_OK
        ]);
    }
}
