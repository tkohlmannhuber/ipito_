<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'country_title' => 'Spain',
            'country_title' => 'France',
            'country_title' => 'Portugal',

        ]);
    }
}
