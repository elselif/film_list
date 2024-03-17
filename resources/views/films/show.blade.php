<div class="container">
    <h1>Filmler</h1>

    <a href="{{ route('films.create') }}" class="btn btn-primary mb-2">Yeni Film Ekle</a>
    <a href="{{ route('films.searchForm') }}" class="btn btn-primary mb-2">Arama Yap</a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>İsim</th>
                <th>Kategori</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($films as $film)
            <tr>
                <td>{{ $film->id }}</td>
                <td>{{ $film->name }}</td>
                <td>{{ $film->category->name }}</td>
                <td>

                    <a href="{{ route('films.edit', $film->id) }}" class="btn btn-warning btn-sm">Düzenle</a>
                    <form action="{{ route('films.destroy', $film->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Silmek istediğinizden emin misiniz?')">Sil</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
