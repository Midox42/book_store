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
        $booksData = [
            [
                'title'       => 'Lord of the Mysteries',
                'description' => 'In a Victorian-esque world filled with steam engines, airships, and eldritch horrors, Klein Moretti awakens in the body of a suicide victim and uncovers the dangerous secrets of Beyonders.',
                'price'       => 19.99,
                'created_by'  => 'Cuttlefish That Loves Diving',
                'genres'      => ['Fantasy', 'Mystery'],
                'cover_image' => 'covers\LOTM.jpg'
            ],
            [
                'title'       => 'Omniscient Reader\'s Viewpoint',
                'description' => 'Kim Dokja is an ordinary office worker whose favorite web novel comes to life. Armed with sole knowledge of how the end of the world unfolds, he must survive the scenarios.',
                'price'       => 14.99,
                'created_by'  => 'singNsong',
                'genres'      => ['Sci-Fi', 'Fantasy'],
                'cover_image' => 'covers\ORV.jpg'
            ],
            [
                'title'       => 'Solo Leveling',
                'description' => 'When weak E-rank hunter Sung Jin-woo is left for dead in a double dungeon, he receives a mysterious quest log that grants him the unique ability to level up without limits.',
                'price'       => 12.99,
                'created_by'  => 'Chugong',
                'genres'      => ['Action', 'Fantasy'],
                'cover_image' => 'covers\SL.jpg'
            ],
            [
                'title'       => 'The Beginning After the End',
                'description' => 'King Grey achieves unmatched strength in a martial world, but leads a lonely life. Reborn into the magical world of Dicathen as Arthur Leywin, he sets out to correct past mistakes.',
                'price'       => 9.99,
                'created_by'  => 'TurtleMe',
                'genres'      => ['Fantasy', 'Action'],
                'cover_image' => 'covers\TBATE.jpg'
            ],
            [
                'title'       => 'Shadow Slave',
                'description' => 'Growing up in the poverty-stricken outskirts of a futuristic world, Sunny is infected by the Nightmare Spell and forced to fight for survival in a dangerous, ancient realm.',
                'price'       => 14.99,
                'created_by'  => 'Guilty30',
                'genres'      => ['Fantasy', 'Action'],
                'cover_image' => 'covers\Shadow_Slave.jpeg'
            ],
            [
                'title'       => 'Dune',
                'description' => 'Set on the desert planet Arrakis, young Paul Atreides must navigate politics, betrayal, and giant sandworms as his family assumes control of the universe\'s most valuable substance.',
                'price'       => 18.00,
                'created_by'  => 'Frank Herbert',
                'genres'      => ['Sci-Fi', 'Fiction'],
                'cover_image' => 'covers\Dune.jpg'
            ],
            [
                'title'       => 'The Perfect Run',
                'description' => 'Ryan "Quicksave" Romano can save his location and restart time upon death. Arriving in a chaotic city overrun by super-powered criminals, he aims to achieve a "perfect run."',
                'price'       => 10.99,
                'created_by'  => 'Maxime J. Durand',
                'genres'      => ['Sci-Fi', 'Action'],
                'cover_image' => 'covers\TPR.jpg'
            ],
            [
                'title'       => 'Pride and Prejudice',
                'description' => 'A classic turbulent relationship between Elizabeth Bennet, the daughter of a country gentleman, and Fitzwilliam Darcy, a rich aristocratic landowner.',
                'price'       => 7.99,
                'created_by'  => 'Jane Austen',
                'genres'      => ['Romance', 'Fiction'],
                'cover_image' => 'covers\PAP.jpg'
            ],
            [
                'title'       => 'The Silent Patient',
                'description' => 'Alicia Berenson’s life seems perfect until she shoots her husband five times and never speaks another word. A criminal psychotherapist becomes obsessed with uncovering her motive.',
                'price'       => 13.99,
                'created_by'  => 'Alex Michaelides',
                'genres'      => ['Mystery', 'Fiction'],
                'cover_image' => 'covers\TSP.jpg'
            ],
            [
                'title'       => 'Project Hail Mary',
                'description' => 'Ryland Grace is the sole survivor on a desperate, last-chance mission to save Earth from an extinction-level event, but he must figure out how to do it with amnesia.',
                'price'       => 16.50,
                'created_by'  => 'Andy Weir',
                'genres'      => ['Sci-Fi', 'Mystery'],
                'cover_image' => 'covers\PHM.jpg'
            ],
            [
                'title'       => 'Sapiens: A Brief History of Humankind',
                'description' => 'A non-fiction journey exploring how Homo sapiens came to dominate the world through cognitive, agricultural, and scientific revolutions.',
                'price'       => 17.99,
                'created_by'  => 'Yuval Noah Harari',
                'genres'      => ['Non-Fiction'],
                'cover_image' => 'covers\Sapiens.jpg'
            ],
        ];

        // 2. Fetch existing genre mapping from the database [id => name]
        $genresMap = DB::table('genres')->pluck('id', 'name')->toArray();

        // 3. Process and insert each book and its pivot relationships
        foreach ($booksData as $book) {
            $genresToAttach = $book['genres'];
            unset($book['genres']);

            // Insert book into the books table
            $bookId = DB::table('books')->insertGetId(array_merge($book, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));

            // Insert pivot entries into book_genre table
            foreach ($genresToAttach as $genreName) {
                // If genre doesn't exist yet in database, create it dynamically
                if (!isset($genresMap[$genreName])) {
                    $genreId = DB::table('genres')->insertGetId([
                        'name'       => $genreName,
                        'slug'       => Str::slug($genreName),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    $genresMap[$genreName] = $genreId;
                }

                // Attach book_id and genre_id in book_genre pivot table
                DB::table('book_genre')->insert([
                    'book_id'  => $bookId,
                    'genre_id' => $genresMap[$genreName],
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
