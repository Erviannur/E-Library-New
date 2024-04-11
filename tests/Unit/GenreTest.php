<?php

namespace Tests\Unit;

use App\Models\Genre;
use PHPUnit\Framework\TestCase;

class GenreTest extends TestCase
{
    public function test_create_genre()
    {
        $genre = Genre::create([
            'name' => 'Fiction',
        ]);

        $this->assertInstanceOf(Genre::class, $genre);
        $this->assertEquals('Fiction', $genre->name);
    }

    // public function testReadGenre()
    // {
    //     $genre = Genre::first();

    //     $this->assertNotNull($genre);
    // }

    // public function testUpdateGenre()
    // {
    //     $genre = Genre::first();
    //     $genre->name = 'Horror';
    //     $genre->save();

    //     $this->assertEquals('Horror', $genre->fresh()->name);
    // }

    // public function testDeleteGenre()
    // {
    //     $genre = Genre::first();
    //     $genre->delete();

    //     $this->assertDeleted($genre);
    // }
}
