<?php

declare(strict_types=1);

namespace App\Services\v1;

use App\Models\Note;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class NoteService
{
    public function all(): Collection
    {
        return Note::all();
    }
    public function store(array $data): Note
    {
        return (new Note)->create($data);
    }

    public function show(string $id): Note
    {
        return (new Note)->findOrFail($id);
    }

    public function update(string $id, array $data): Note
    {
        $note = (new Note)->find($id);

        if ($note === null) {
            throw new Exception('Note not found', 404);
        }

        $note->title = $data['title'];

        $note->description = $data['description'];

        $note->save();

        return $note;
    }

    public function delete(string $id): Note
    {
        $note = (new Note)->find($id);

        if ($note === null) {
            throw new Exception('Note not found', 404);
        }

        $note->delete();

        return $note;
    }
}
