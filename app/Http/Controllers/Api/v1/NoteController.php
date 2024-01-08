<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Note\DeleteNoteRequest;
use App\Http\Requests\Api\v1\Note\ShowNoteRequest;
use App\Http\Requests\Api\v1\Note\StoreNoteRequest;
use App\Http\Requests\Api\v1\Note\UpdateNoteRequest;
use App\Services\v1\NoteService;
use Illuminate\Http\JsonResponse;

class NoteController extends Controller
{
    private NoteService $noteService;

    public function __construct()
    {
        $this->noteService = new NoteService();
    }

    public function all(): JsonResponse
    {
        $data = $this->noteService->all();

        return response()->json($data);
    }

    public function store(StoreNoteRequest $request): JsonResponse
    {
        $data = $this->noteService->store($request->all());

        return response()->json($data);
    }

    public function show(ShowNoteRequest $request): JsonResponse
    {
        $data = $this->noteService->show($request->all());

        return response()->json($data);
    }

    public function update(UpdateNoteRequest $request): JsonResponse
    {
        $data = $this->noteService->update($request->all());

        return response()->json($data);
    }

    public function delete(DeleteNoteRequest $request): JsonResponse
    {
        $data = $this->noteService->delete($request->all());

        return response()->json($data);
    }
}
