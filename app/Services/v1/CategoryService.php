<?php

declare(strict_types=1);

namespace App\Services\v1;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function all(): Collection
    {
        return Category::all();
    }
    public function store(array $data): Category
    {
        return (new Category)->create($data);
    }

    public function show(string $id): Category
    {
        return (new Category)->findOrFail($id);
    }

    public function update(string $id, array $data): Category
    {
        $category = (new Category)->findOrFail($id);

        $category->title = $data['title'];

        $category->description = $data['description'];

        $category->save();

        return $category;
    }

    public function delete(string $id): Category
    {
        $category = (new Category)->findOrFail($id);

        $category->delete();

        return $category;
    }
}
