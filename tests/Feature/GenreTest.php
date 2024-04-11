<?php

namespace Tests\Feature;


use Tests\TestCase;

class GenreTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        var_dump('Setup Awal');
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        var_dump('Setup Akhir');
    }

    /**
     * A basic feature test example.
     */
    public function test_create_genre(): void
    {
        dd('Read Genre');
        $response = $this->get(route('apps.genre'));

        $response->assertStatus(200);
    }

    // public function test_create_genre(): void
    // {
    //     dd('Create Genre');
    //     $response = $this->get();

    //     $response->assertStatus(200);
    // }
}
