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
        Schema::create('media', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('release_year');
            $table->enum('type', ['movie', 'series', 'game']);
            // $table->string('image')->nullable();
            // $table->foreignId('category_id')->constrained()->onDelete('cascade');
            // $table->enum('category', ['horror', 'Thriller', 'Fantasy', 'Action', 'Comedy', 'Post-Apocaliptic', 'Historical']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
