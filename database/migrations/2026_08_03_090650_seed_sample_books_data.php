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
            ],
            [
                'title'       => 'Re:Zero − Starting Life in Another World',
                'description' => 'Subaru Natsuki is suddenly summoned to another world. Lacking magical powers or extraordinary strength, his only ability is Return by Death, forcing him to relive tragic events.',
                'price'       => 11.50,
                'created_by'  => 'Tappei Nagatsuki',
                'genres'      => ['Fantasy', 'Mystery'],
            ],
            [
                'title'       => 'The Legendary Mechanic',
                'description' => 'A veteran gamer transmigrates into a sci-fi game world years before its official launch, utilizing his meta-knowledge to become a legendary master mechanic.',
                'price'       => 15.00,
                'created_by'  => 'Chao Shen Ji Xie Shi',
                'genres'      => ['Sci-Fi', 'Action'],
            ],
            [
                'title'       => 'Mother of Learning',
                'description' => 'Zorian is a quiet, reluctant mage student dragged into a one-month time loop right before a catastrophic invasion of his academy city. He must master magic to survive.',
                'price'       => 8.99,
                'created_by'  => 'Domagoj Kurmaić',
                'genres'      => ['Fantasy', 'Mystery'],
            ],
            [
                'title'       => 'The Greatest Estate Developer',
                'description' => 'Civil engineering student Suho Kim wakes up inside a fantasy web novel as Lloyd Frontera, a lazy nobleman in debt. He uses engineering knowledge to rescue his family.',
                'price'       => 13.50,
                'created_by'  => 'BK_Moon',
                'genres'      => ['Fiction', 'Fantasy'],
            ],
            [
                'title'       => 'Trash of the Count\'s Family',
                'description' => 'Kim Roksu transmigrates into a novel as Cale Henituse, a minor trash noble destined to get beaten up. He resolves to live a peaceful, rich life, but keeps getting dragged into epic events.',
                'price'       => 10.99,
                'created_by'  => 'Yoo Ryeo Han',
                'genres'      => ['Fantasy', 'Fiction'],
            ],
            [
                'title'       => 'Atomic Habits',
                'description' => 'A practical non-fiction framework for improving every day through small, incremental systems and habit loops rather than relying solely on willpower.',
                'price'       => 16.99,
                'created_by'  => 'James Clear',
                'genres'      => ['Non-Fiction'],
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
