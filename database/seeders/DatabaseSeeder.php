<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Invoice;
//use App\Models\Invoice;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Invoice::factory(300)->create();
    }
}
