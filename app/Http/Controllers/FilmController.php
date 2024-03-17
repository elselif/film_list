<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\FilmCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::with('category')->get();
        return view('films.show', ['films' => $films]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function create()
    {
        $categories = FilmCategory::all(); // Tüm kategorileri al
        return view('films.create', ['categories' => $categories]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:film_categories,id'
        ]);

        // Doğrulama başarısız olursa, hata mesajlarını döndür
        if ($validator->fails()) {
            return redirect('/films')->withErrors($validator)->withInput();
        }

        // Doğrulama başarılıysa, yeni filmi oluştur
        Film::create([
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id')
        ]);

        return redirect('/films')->with('success', 'Film başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        return view('films.show', ['films' => $film]);
    }

    public function edit(string $id)
    {
        $film = Film::findOrFail($id);
        $categories = FilmCategory::all();
        return view('films.edit', ['films' => $film, 'categories' => $categories]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:film_categories,id'
        ]);

        // Doğrulama başarısız olursa, hata mesajlarını döndür
        if ($validator->fails()) {
            return redirect('/films')->withErrors($validator)->withInput();
        }

        // Doğrulama başarılıysa, mevcut filmi güncelle
        $film = Film::findOrFail($id);
        $film->name = $request->input('name');
        $film->category_id = $request->input('category_id');
        $film->save();

        return redirect('/films')->with('success', 'Film başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::findOrFail($id);
        $film->delete();

        // Silme işlemi tamamlandıktan sonra istenilen bir sayfaya yönlendirme yapılabilir
        return redirect('/films')->with('success', 'Film başarıyla silindi.');
    }

    public function searchForm()
    {
        return view('films.search-form');
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $films = Film::search($keyword);

        return view('films.search-results', compact('films'));
    }
}
