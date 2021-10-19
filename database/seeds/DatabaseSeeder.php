<?php

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
        DB::table('users')->insert([
            'name' => 'DAISUKE SASAKI',
            'email' => 'tyatya1702@gmail.com',
            'password' => bcrypt('testpass'),
        ]);
    }
}
