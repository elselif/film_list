<div class="container">
    <h1>Yeni Film Ekle</h1>
    <form action="{{ route('films.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Film İsmi:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="category_id">Film Kategorisi:</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Kaydet</button>
        <a href="{{ route('films.index') }}" class="btn btn-secondary">Geri</a>
    </form>
</div>
