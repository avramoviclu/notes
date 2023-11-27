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

    public function show(array $data): Note
    {
        return (new Note)->findOrFail($data['id']);
    }

    public function update(array $data): Note
    {
        $note = (new Note)->findOrFail($data['id']);

        $note->title = $data['title'];

        $note->description = $data['description'];

        $note->save();

        return $note;
    }

    public function delete(array $data): Note
    {
        $note = (new Note)->findOrFail($data['id']);

        $note->delete();

        return $note;
    }
}
