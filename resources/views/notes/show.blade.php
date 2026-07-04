<x-layout>
    <div class="flex h-screen">
        @include('notes.partials.sidebar', ['notes' => $notes, 'selectedNote' => $note])

        @if ($note)
            @include('notes.partials.editor', ['note' => $note])
        @else
            <div class="flex-1 flex items-center justify-center">
                <p class="text-gray-400 text-xl font-semibold">Select a note to view or edit</p>
            </div>
        @endif
    </div>
</x-layout>