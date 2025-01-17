<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ContatoTableSeeder::class);
        $this->call(MensagemTableSeeder::class);
    }
}
