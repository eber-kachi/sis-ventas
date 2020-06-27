<?php

use Illuminate\Database\Seeder;

class RatingStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\RaitingStore::class, 10)->create();
    }
}
