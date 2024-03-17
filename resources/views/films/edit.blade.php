<div class="container">
    <h1>Film Düzenle</h1>
    <form action="{{ route('films.update', $films->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Film İsmi:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $films->name }}">
        </div>
        <div class="form-group">
            <label for="category_id">Film Kategorisi:</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $films->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Güncelle</button>
        <a href="{{ route('films.index') }}" class="btn btn-secondary">Geri</a>
    </form>
</div>
