<?php

namespace App\Repositories;

use App\Interfaces\Repositories\CategoryRepositoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository implements CategoryRepositoryRepositoryInterface
{

    public function getAll(): Collection
    {
        return Category::all();
    }

    public function getById($id): Builder|array|Collection|Model
    {
        return Category::query()->findOrFail($id);
    }

    public function delete($id): int
    {
        return Category::destroy($id);
    }

    public function create(array $data): Model|Builder
    {
        return Category::query()->create($data);
    }

    public function update($id, array $data): int
    {
        return Category::query()->where('id', $id)->update($data);
    }
}
