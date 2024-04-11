<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $asiaCountries = [
            ['name' => 'Afghanistan'],
            ['name' => 'Armenia'],
            ['name' => 'Azerbaijan'],
            ['name' => 'Bahrain'],
            ['name' => 'Bangladesh'],
            ['name' => 'Bhutan'],
            ['name' => 'Brunei'],
            ['name' => 'Cambodia'],
            ['name' => 'China'],
            ['name' => 'Cyprus'],
            ['name' => 'Georgia'],
            ['name' => 'India'],
            ['name' => 'Indonesia'],
            ['name' => 'Iran'],
            ['name' => 'Iraq'],
            ['name' => 'Israel'],
            ['name' => 'Japan'],
            ['name' => 'Jordan'],
            ['name' => 'Kazakhstan'],
            ['name' => 'Kuwait'],
            ['name' => 'Kyrgyzstan'],
            ['name' => 'Laos'],
            ['name' => 'Lebanon'],
            ['name' => 'Malaysia'],
            ['name' => 'Maldives'],
            ['name' => 'Mongolia'],
            ['name' => 'Myanmar'],
            ['name' => 'Nepal'],
            ['name' => 'North Korea'],
            ['name' => 'Oman'],
            ['name' => 'Pakistan'],
            ['name' => 'Palestine'],
            ['name' => 'Philippines'],
            ['name' => 'Qatar'],
            ['name' => 'Saudi Arabia'],
            ['name' => 'Singapore'],
            ['name' => 'South Korea'],
            ['name' => 'Sri Lanka'],
            ['name' => 'Syria'],
            ['name' => 'Taiwan'],
            ['name' => 'Tajikistan'],
            ['name' => 'Thailand'],
            ['name' => 'Timor-Leste'],
            ['name' => 'Turkmenistan'],
            ['name' => 'United Arab Emirates'],
            ['name' => 'Uzbekistan'],
            ['name' => 'Vietnam'],
            ['name' => 'Yemen'],
        ];

        Country::insert($asiaCountries);
    }
}
