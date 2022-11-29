<?php

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface DatabaseRepositoryInterface
{
    public function getAll(): Collection;
    public function getById($id): Builder|array|Collection|Model;
    public function delete($id): int;
    public function create(array $data): Model|Builder;
    public function update($id, array $data);
}
