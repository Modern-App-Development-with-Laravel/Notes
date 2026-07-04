<main class="flex-1 flex flex-col h-full">
    <form id="update-note" action="{{ route('notes.update', $note) }}" method="POST" class="flex flex-col h-full">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ old('title', $note->title) }}" placeholder="Title" class="w-full p-2 text-xl font-semibold border-b border-gray-200 focus:outline-none focus:ring-0">

        <textarea name="content" placeholder="Content" class="w-full h-full p-2 resize-none focus:outline-none focus:ring-0">{{ old('content', $note->content) }}</textarea>        
    </form>

    <div class="flex items-center justify-between px-4 py-2 border-t border-gray-200">
        <form action="{{ route('notes.destroy', $note) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this note?');">
            @csrf
            @method('DELETE')

            <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-700">
                Delete
            </button>
        </form>

        <div>
            <button type="submit" form="update-note" class="px-5 py-2 bg-amber-400 text-gray-900 rounded-lg font-medium hover:bg-amber-300">
                Save
            </button>
        </div>
    </div>    
</main>