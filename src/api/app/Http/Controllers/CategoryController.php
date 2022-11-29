<?php

namespace App\Http\Controllers;

use App\Interfaces\Controllers\CategoryControllerInterface;
use App\Interfaces\Repositories\CategoryRepositoryRepositoryInterface;
use App\Repositories\CategoryRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller implements CategoryControllerInterface
{
    private readonly CategoryRepositoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryRepositoryInterface $categoryRepository = new CategoryRepository())
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(): JsonResponse
    {
        return response()->json(
            [
                'data' => $this->categoryRepository->getAll(),
            ],
            Response::HTTP_OK
        );
    }

    public function store(Request $request): JsonResponse
    {
        $details = $request->only(['name']);

        return response()->json(
            [
                'data' => $this->categoryRepository->create($details),
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse
    {
        $id = $request->route('id');

        return response()->json(
            [
                'data' => $this->categoryRepository->getById($id),
            ],
            Response::HTTP_OK
        );
    }


    public function update(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $details = $request->only(['name']);

        return response()->json(
            [
                'data' => $this->categoryRepository->update(id: $id, data: $details)
            ]
        );
    }

    public function destroy(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $this->categoryRepository->delete($id);

        return response()->json([null, Response::HTTP_NO_CONTENT]);

    }
}
