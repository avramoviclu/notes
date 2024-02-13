<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Category\StoreCategoryRequest;
use App\Http\Requests\Api\v1\Category\UpdateCategoryRequest;
use App\Http\Resources\Api\v1\Category\CategoryCollection;
use App\Services\v1\CategoryService;
use App\Http\Resources\Api\v1\Category\CategoryResource;

class CategoryController extends Controller
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function all(): CategoryCollection
    {
        $data = $this->categoryService->all();

        return new CategoryCollection($data);
    }

    public function store(StoreCategoryRequest $request): CategoryResource
    {
        $data = $this->categoryService->store($request->all());

        return new CategoryResource($data);
    }

    public function show(string $id): CategoryResource
    {
        $data = $this->categoryService->show($id);

        return new CategoryResource($data);
    }

    public function update(UpdateCategoryRequest $request, string $id): CategoryResource
    {
        $data = $this->categoryService->update($id, $request->all());

        return new CategoryResource($data);
    }

    public function delete(string $id): CategoryResource
    {
        $data = $this->categoryService->delete($id);

        return new CategoryResource($data);
    }
}
