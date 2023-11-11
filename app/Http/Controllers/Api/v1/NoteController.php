<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Services\v1\NoteService;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    private NoteService $noteService;

    public function __construct()
    {
        $this->noteService = new NoteService();
    }

    public function all(): string
    {
        return $this->noteService->all()->toJson();
    }

    public function store(Request $request): string
    {
        return $this->noteService->store($request->all())->toJson();
    }

    public function show(string $id): string
    {
        return $this->noteService->show($id)->toJson();
    }

    public function update(Request $request, string $id): string
    {
        return $this->noteService->update($id, $request->all())->toJson();
    }

    public function delete(string $id): string
    {
        return $this->noteService->delete($id)->toJson();
    }
}
