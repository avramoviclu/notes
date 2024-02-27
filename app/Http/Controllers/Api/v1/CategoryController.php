<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Category\StoreCategoryRequest;
use App\Http\Requests\Api\v1\Category\UpdateCategoryRequest;
use App\Http\Resources\Api\v1\Category\CategoryCollection;
use App\Services\v1\CategoryService;
use App\Http\Resources\Api\v1\Category\CategoryResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Exception;

class CategoryController extends Controller
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function all(): CategoryCollection|JsonResponse
    {
        try{
            $data = $this->categoryService->all();

            return new CategoryCollection($data);

        } catch(Exception $e) {

            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function store(StoreCategoryRequest $request): CategoryResource|JsonResponse
    {
        try {
            $data = $this->categoryService->store($request->all());

            return new CategoryResource($data);

        } catch(Exception $e) {

            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function show(string $id): CategoryResource|JsonResponse
    {
        try {
            $data = $this->categoryService->show($id);

            return new CategoryResource($data);

        } catch(Exception $e) {

            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function update(UpdateCategoryRequest $request, string $id): CategoryResource|JsonResponse
    {
        try {
            $data = $this->categoryService->update($id, $request->all());

            return new CategoryResource($data);

        } catch(Exception $e) {

            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function delete(string $id): CategoryResource|JsonResponse
    {
        try {
            $data = $this->categoryService->delete($id);

            return new CategoryResource($data);

        } catch(Exception $e) {

            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }
}
