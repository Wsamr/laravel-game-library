<div>
    <!-- He who is contented is rich. - Laozi -->
</div>
<form action="{{ route('games.detachFromCollection', $game->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <label for="collection_id">Select Collection:</label>
    <select name="collection_id" id="collection_id" required>
        @foreach($game->collections as $collection)
            <option value="{{ $collection->id }}">{{ $collection->name }}</option>
        @endforeach
    </select>
    <button type="submit">Remove from Collection</button>
</form>
