
    <!-- Order your soul. Reduce your wants. - Augustine -->
    <form action="{{ route('games.attachToCollection', $game->id) }}" method="POST">
        @csrf
        <label for="collection_id">Select Collection:</label>
        <select name="collection_id" id="collection_id" required>
            @foreach($collections as $collection)
                <option value="{{ $collection->id }}">{{ $collection->name }}</option>
            @endforeach
        </select>
        <button type="submit">Add to Collection</button>
    </form>
    