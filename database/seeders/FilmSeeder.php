<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Film::create([
            'name' => 'Film 1',
            'category_id' => 1,
        ]);

        Film::create([
            'name' => 'Film 2',
            'category_id' => 2,
        ]);


    }
}
