<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Publisher::insert([
            [
                'name' => 'Gramedia Pustaka Utama',
                'slug' => 'gramedia-pustaka-utama',
            ],
            [
                'name' => 'Deepublish',
                'slug' => 'deepublish',
            ],
            [
                'name' => 'Bukunesia',
                'slug' => 'bukunesia',
            ],
            [
                'name' => 'Depok : Indonesia Heritage Foundation, s.a',
                'slug' => 'depok-indonesia-heritage-foundation-s-a',
            ],
            [
                'name' => 'Kepustakaan Populer Gramedia',
                'slug' => 'kepustakaan-populer-gramedia',
            ],
            [
                'name' => 'Pastel Books',
                'slug' => 'pastel-books',
            ],
            [
                'name' => 'Mizan Publishing',
                'slug' => 'mizan-publishing',
            ],
        ]);
    }
}
