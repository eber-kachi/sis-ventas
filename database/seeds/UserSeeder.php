<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'full_name' => 'Admin',
            'ci' => '1321654',
            'phone' => '1321654',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            // 'activo' => true,
            'role_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
