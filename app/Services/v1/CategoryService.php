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

    public function show(array $data): Category
    {
        return (new Category)->findOrFail($data['id']);
    }

    public function update(array $data): Category
    {
        $Category = (new Category)->findOrFail($data['id']);

        $Category->title = $data['title'];

        $Category->description = $data['description'];

        $Category->save();

        return $Category;
    }

    public function delete(array $data): Category
    {
        $Category = (new Category)->findOrFail($data['id']);

        $Category->delete();

        return $Category;
    }
}
