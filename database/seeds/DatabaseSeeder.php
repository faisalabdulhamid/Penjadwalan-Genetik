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
        $this->call(AllSeed::class);
        $this->call(DosenSeedr::class);
        $this->call(MatkulSeeder::class);
        $this->call(KelasSeeder::class);
    }
}
