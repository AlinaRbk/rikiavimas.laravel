<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Model\Author;
class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::factory(100)->create();
    }
}
