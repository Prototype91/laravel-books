<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // $this->call(UsersTableSeeder::class);

        // d'abord on crée les Autheurs
        $this->call(AuthorTableSeeder::class);

        // puis dans le code des seeders on les associera 
        $this->call(BookTableSeeder::class);
    }
}
