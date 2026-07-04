<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class NoteController extends Controller
{
    public function show(?Note $note = null): View
    {
        return view('notes.show', [
            'notes' => $this->notes(),
            'note' => $note,
        ]);
    }

    public function store(): RedirectResponse
    {
        $note = Note::create([
            'title' => null,
            'content' => null,
        ]);

        return redirect()->route('notes.show', $note);
    }

    private function notes(): Collection
    {
        return Note::latest('updated_at')->get();
    }
}
