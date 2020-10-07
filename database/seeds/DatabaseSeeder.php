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
        $this->call(clientesSeeder::class);
        $this->call(expertosSeeder::class);
        $this->call(usuarioSeeder::class);
    }
}
