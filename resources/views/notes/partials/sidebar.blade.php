<aside class="w-80 border-r border-gray-200 bg-gray-100 overflow-y-auto">
    <h2 class="text-lg font-semibold px-2 py-2 border-b border-gray-200 flex items-center justify-between">
        {{ $notes->count() }}
        {{ Str::plural('Note', $notes->count()) }}

        <form action="{{ route('notes.store') }}" method="POST">
            @csrf
            <button type="submit" class="px-5 py-2 bg-amber-400 text-gray-900 rounded-lg font-medium hover:bg-amber-300">
                New
            </button>
        </form>
    </h2>

    <ul>
        @foreach ($notes as $note)
            <li>
                <a 
                    href="{{ route('notes.show', $note) }}" 
                    class="block p-2 {{ 
                        $selectedNote && $selectedNote->is($note) 
                        ? 'bg-gray-200' 
                        : 'text-gray-800 hover:bg-gray-200' 
                    }}"
                >
                    {{ $note->title ?? 'Untitled Note' }}
                    
                    <div class="text-xs">
                        <span>
                            {{ 
                                $note->updated_at->isToday() 
                                ? $note->updated_at->format('H:i') 
                                : $note->updated_at->format('M d, Y') 
                            }}
                        </span>

                        <span>
                            {{ Str::limit($note->content ?: 'No additional content', 80) }}
                        </span>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</aside>