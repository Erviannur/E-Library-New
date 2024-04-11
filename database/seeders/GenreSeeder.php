<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::insert([
            [
                'name' => 'Fiksi',
                'slug' => 'fiksi',
            ],
            [
                'name' => 'Fantasi',
                'slug' => 'fantasi',
            ],
            [
                'name' => 'Romance',
                'slug' => 'romance',
            ],
            [
                'name' => 'Cerita Anak',
                'slug' => 'cerita-anak',
            ],
        ]);
    }
}
