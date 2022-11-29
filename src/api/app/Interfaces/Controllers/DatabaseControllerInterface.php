<?php

namespace App\Interfaces\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface DatabaseControllerInterface
{
    public function index(): JsonResponse;
    public function store(Request $request): JsonResponse;
    public function show(Request $request): JsonResponse;
    public function update(Request $request): JsonResponse;
    public function destroy(Request $request): JsonResponse;
}
