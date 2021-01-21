<?php

namespace Database\Seeders;

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
        try {
            \App\Models\User::factory(1000)->create();
        } catch (\PDOException $exception) {
            if ($exception->getCode() != 23000) {
                throw $exception;
            }
        }
    }
}
