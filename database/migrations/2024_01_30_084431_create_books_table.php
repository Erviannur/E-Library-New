<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->string('slug');
            $table->foreignId('author_id');
            $table->foreignId('publisher_id');
            $table->year('publication_year')->nullable();
            $table->string('isbn')->nullable();
            $table->foreignId('genre_id');
            $table->text('synopsis');
            $table->string('page');
            $table->foreignId('country_id');
            $table->string('file');
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('authors')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
