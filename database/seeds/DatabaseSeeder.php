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
        $this->call(ContactTableSeeder::class);
        $this->call(PhoneTableSeeder::class);
        $this->call(EmailTableSeeder::class);
    }
}
