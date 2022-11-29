<?php

namespace App\Repositories;

use App\Interfaces\Repositories\NewsRepositoryRepositoryInterface;
use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class NewsRepository implements NewsRepositoryRepositoryInterface
{

    public function getAll(): Collection
    {
        return News::all();
    }

    public function getById($id): Builder|array|Collection|Model
    {
        return News::query()->findOrFail($id);
    }

    public function getByCategoryId($categoryId): Builder|array|Collection|Model
    {
        return News::query()->where('category_id', $categoryId)->get()->toArray();
    }

    public function getByUserId($userId): Builder|array|Collection|Model
    {
        return News::query()->where('user_id', $userId);
    }

    public function delete($id): int
    {
        return News::destroy($id);
    }

    public function create(array $data): Model|Builder
    {
        return News::query()->create($data);
    }

    public function update($id, array $data): int
    {
        return News::query()->where('id', $id)->update($data);
    }
}
