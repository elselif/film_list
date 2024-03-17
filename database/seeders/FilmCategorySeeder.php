<?php

namespace Database\Seeders;

use App\Models\FilmCategory;
use Illuminate\Database\Seeder;

class FilmCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        FilmCategory::create(['name' => 'Aksiyon' , 'status' => 'active']);
        FilmCategory::create(['name' => 'Komedi' , 'status' => 'active']);
        FilmCategory::create(['name' => 'Drama' , 'status' => 'active']);
    }
}
