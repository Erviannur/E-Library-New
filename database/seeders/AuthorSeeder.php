<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::insert([
            [
                'name' => 'Tere Liye',
                'slug' => 'tere-liye',
            ],
            [
                'name' => 'Andrea Hirata',
                'slug' => 'andrea-hirata',
            ],
            [
                'name' => 'Chairil Anwar',
                'slug' => 'chairil-anwar',
            ],
            [
                'name' => 'Lukman M. Nurdin',
                'slug' => 'lukman-m-nurdin',
            ],
            [
                'name' => 'Leila S. Chudori',
                'slug' => 'leila-s-chudori',
            ],
            [
                'name' => 'Pidi Baiq',
                'slug' => 'pidi-baiq',
            ],
        ]);
    }
}
