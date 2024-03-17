<h1>Film Arama Sonuçları</h1>
<div>
    @if ($films->isEmpty())
    <p>Aradığınız kriterlere uygun film bulunamadı.</p>
    @else
    <ul>
        @foreach ($films as $film)
        <li>
            <h2>{{ $film->name }}</h2>
            <p>{{ $film->category->name }}</p>
        </li>
        @endforeach
    </ul>
    @endif
</div>
