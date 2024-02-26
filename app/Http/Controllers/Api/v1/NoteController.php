<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Note\StoreNoteRequest;
use App\Http\Requests\Api\v1\Note\UpdateNoteRequest;
use App\Http\Resources\Api\v1\Note\NoteCollection;
use App\Services\v1\NoteService;
use App\Http\Resources\Api\v1\Note\NoteResource;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    private NoteService $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    public function all(): NoteCollection|JsonResponse
    {
        try {
            $data = $this->noteService->all();

            return new NoteCollection($data);

        } catch(Exception $e) {

            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function store(StoreNoteRequest $request): NoteResource|JsonResponse
    {
        try {
            DB::beginTransaction();

            $data = $this->noteService->store($request->all());

            DB::commit();

            return new NoteResource($data);

        } catch(Exception $e) {

            DB::rollBack();

            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function show(string $id): NoteResource|JsonResponse
    {
        try {
            $data = $this->noteService->show($id);

            return new NoteResource($data);

        } catch(Exception $e) {

            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function update(UpdateNoteRequest $request, string $id): NoteResource|JsonResponse
    {
        try {
            DB::beginTransaction();

            $data = $this->noteService->update($id, $request->all());

            DB::commit();

            return new NoteResource($data);

        } catch(Exception $e) {

            DB::rollBack();

            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }

    public function delete(string $id): NoteResource|JsonResponse
    {
        try {
            DB::beginTransaction();

            $data = $this->noteService->delete($id);

            DB::commit();

            return new NoteResource($data);

        } catch(Exception $e) {

            DB::rollBack();

            return response()->json(['message' => $e->getMessage()], $e->getCode());
        }
    }
}
