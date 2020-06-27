<?php

use Illuminate\Database\Seeder;

class UserStatusOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\UserStatusOrder::class, 10)->create();
    }
}
