<?php

namespace App\Http\Controllers;

use App\Interfaces\Controllers\NewsControllerInterface;
use App\Interfaces\Repositories\NewsRepositoryRepositoryInterface;
use App\Repositories\NewsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller implements NewsControllerInterface
{
    private readonly NewsRepositoryRepositoryInterface $newsRepository;

    public function __construct(NewsRepositoryRepositoryInterface $newsRepository = new NewsRepository())
    {
        $this->newsRepository = $newsRepository;
    }

    public function index(): JsonResponse
    {
        return response()->json(
            [
                'data' => $this->newsRepository->getAll()
            ],
            Response::HTTP_OK
        );
    }

    public function store(Request $request): JsonResponse
    {
        $details = $request->only([
            'name',
            'description',
            'publication_date',
            'category_id'
        ]);

        return response()->json(
            [
                'data' => $this->newsRepository->create($details),
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse
    {
        $id = $request->route('id');

        return response()->json(
            [
                'data' => $this->newsRepository->getById($id),
            ],
            Response::HTTP_OK
        );
    }

    public function showByUser(Request $request): JsonResponse
    {
        $userId = $request->route('id');

        return response()->json(
            [
                'data' => $this->newsRepository->getByUserId($userId),
            ],
            Response::HTTP_OK
        );
    }

    public function showByCategory(Request $request): JsonResponse
    {
        $categoryId = $request->route('id');

        return response()->json(
            [
                'data' => $this->newsRepository->getByCategoryId($categoryId),
            ],
            Response::HTTP_OK
        );
    }

    public function update(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $details = $request->only([
            'name',
            'description',
            'publication_date',
            'category_id'
        ]);

        return response()->json(
            [
                'data' => $this->newsRepository->update(id: $id, data: $details),
            ],
            Response::HTTP_OK
        );
    }

    public function destroy(Request $request): JsonResponse
    {
        $id = $request->route('id');
        $this->newsRepository->delete($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
