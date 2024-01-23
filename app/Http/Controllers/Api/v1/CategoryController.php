<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Category\DeleteCategoryRequest;
use App\Http\Requests\Api\v1\Category\ShowCategoryRequest;
use App\Http\Requests\Api\v1\Category\StoreCategoryRequest;
use App\Http\Requests\Api\v1\Category\UpdateCategoryRequest;
use App\Http\Resources\Api\v1\CategoryCollection;
use App\Services\v1\CategoryService;
use App\Http\Resources\Api\v1\CategoryResource;

class CategoryController extends Controller
{
    private CategoryService $CategoryService;

    public function __construct()
    {
        $this->CategoryService = new CategoryService();
    }

    public function all(): CategoryCollection
    {
        $data = $this->CategoryService->all();

        return new CategoryCollection($data);
    }

    public function store(StoreCategoryRequest $request): CategoryResource
    {
        $data = $this->CategoryService->store($request->all());

        return new CategoryResource($data);
    }

    public function show(ShowCategoryRequest $request): CategoryResource
    {
        $data = $this->CategoryService->show($request->all());

        return new CategoryResource($data);
    }

    public function update(UpdateCategoryRequest $request): CategoryResource
    {
        $data = $this->CategoryService->update($request->all());

        return new CategoryResource($data);
    }

    public function delete(DeleteCategoryRequest $request): CategoryResource
    {
        $data = $this->CategoryService->delete($request->all());

        return new CategoryResource($data);
    }
}
