<?php

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface NewsRepositoryRepositoryInterface extends DatabaseRepositoryInterface
{
    public function getByCategoryId($categoryId): Builder|array|Collection|Model;
    public function getByUserId($userId): Builder|array|Collection|Model;
}
