<?php

use Illuminate\Database\Seeder;

class SendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Sends::class, 10)->create();
    }
}
