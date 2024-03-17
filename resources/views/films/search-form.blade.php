<h1>Film Arama Formu</h1>
    <form action="{{ route('films.search') }}" method="POST">
        @csrf
        <label for="keyword">Arama Kelimesi:</label>
        <input type="text" name="keyword" id="keyword">
        <button type="submit">Ara</button>
    </form>
