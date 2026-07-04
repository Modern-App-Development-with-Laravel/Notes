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

    public function update(Note $note): RedirectResponse
    {
        $note->update(request()->only(['title', 'content']));

        return redirect()->route('notes.show', $note);
    }

    public function destroy(Note $note): RedirectResponse
    {
        $note->delete();

        return redirect()->route('notes.show');
    }

    private function notes(): Collection
    {
        return Note::latest('updated_at')->get();
    }
}
