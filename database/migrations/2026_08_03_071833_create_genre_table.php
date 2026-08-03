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
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique(); // e.g., "Sci-Fi", "Fantasy"
            $table->string('slug', 50)->unique()->nullable(); // Useful for clean URLs (e.g., /genres/sci-fi)
            $table->timestamps();
        });
        $genres = [
            'Romance',
            'Non-Fiction',
            'Sci-Fi',
            'Fantasy',
            'Mystery',
        ];
        foreach ($genres as $genre) {
            DB::table('genres')->insert([
                'name'       => $genre,
                'slug'       => Str::slug($genre),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('genres');
    }
};
