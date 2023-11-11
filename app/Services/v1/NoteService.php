<?php

declare(strict_types=1);

namespace App\Services\v1;

use App\Models\Note;
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
        $note = (new Note)->findOrFail($id);

        $note->update($data);

        return $note;
    }

    public function delete(string $id): Note
    {
        $note = (new Note)->findOrFail($id);

        $note->delete();

        return $note;
    }
}
