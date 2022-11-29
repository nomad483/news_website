<?php

namespace App\Interfaces\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface NewsControllerInterface extends DatabaseControllerInterface
{
    public function showByUser(Request $request): JsonResponse;
    public function showByCategory(Request $request): JsonResponse;
}
