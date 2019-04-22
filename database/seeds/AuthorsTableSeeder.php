<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Library\Author::class, 30)
            ->create()
            ->each(function($author){
                $author->books()->save(factory(App\Models\Library\Book::class)->make());
            });
    }
}
