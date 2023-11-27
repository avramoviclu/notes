<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Note\DeleteNoteRequest;
use App\Http\Requests\Api\v1\Note\ShowNoteRequest;
use App\Http\Requests\Api\v1\Note\StoreNoteRequest;
use App\Http\Requests\Api\v1\Note\UpdateNoteRequest;
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

    public function store(StoreNoteRequest $request): string
    {
        return $this->noteService->store($request->all())->toJson();
    }

    public function show(ShowNoteRequest $request): string
    {
        return $this->noteService->show($request->all())->toJson();
    }

    public function update(UpdateNoteRequest $request, string $id): string
    {
        return $this->noteService->update($request->all())->toJson();
    }

    public function delete(DeleteNoteRequest $request): string
    {
        return $this->noteService->delete($request->all())->toJson();
    }
}
