<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Note\DeleteNoteRequest;
use App\Http\Requests\Api\v1\Note\ShowNoteRequest;
use App\Http\Requests\Api\v1\Note\StoreNoteRequest;
use App\Http\Requests\Api\v1\Note\UpdateNoteRequest;
use App\Http\Resources\Api\v1\NoteCollection;
use App\Services\v1\NoteService;
use App\Http\Resources\Api\v1\NoteResource;

class NoteController extends Controller
{
    private NoteService $noteService;

    public function __construct()
    {
        $this->noteService = new NoteService();
    }

    public function all(): NoteCollection
    {
        $data = $this->noteService->all();

        return new NoteCollection($data);
    }

    public function store(StoreNoteRequest $request): NoteResource
    {
        $data = $this->noteService->store($request->all());

        return new NoteResource($data);
    }

    public function show(ShowNoteRequest $request): NoteResource
    {
        $data = $this->noteService->show($request->all());

        return new NoteResource($data);
    }

    public function update(UpdateNoteRequest $request): NoteResource
    {
        $data = $this->noteService->update($request->all());

        return new NoteResource($data);
    }

    public function delete(DeleteNoteRequest $request): NoteResource
    {
        $data = $this->noteService->delete($request->all());

        return new NoteResource($data);
    }
}
