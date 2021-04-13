<?php

use Illuminate\Database\Seeder;

class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // création de 8 auteurs à partir de la factory
        factory(App\Author::class, 8)->create();
    }
}
