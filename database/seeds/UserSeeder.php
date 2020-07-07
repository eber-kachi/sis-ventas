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
//        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name' => 'Admin',
            'ci' => '1321653',
            'phone' => '132216354',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            // 'activo' => true,
            'role_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('users')->insert([
            'name' => 'Eric',
            'ci' => '132165243',
            'phone' => '13221654',
            'email' => 'eric@gmail.com',
            'password' => bcrypt('123456'),
            // 'activo' => true,
            'role_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('users')->insert([
            'name' => 'Raul',
            'ci' => '133216542',
            'phone' => '133216544',
            'email' => 'raul@gmail.com',
            'password' => bcrypt('123456'),
            // 'activo' => true,
            'role_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('users')->insert([
            'name' => 'Karla',
            'ci' => '13212654',
            'phone' => '13321654',
            'email' => 'karla@gmail.com',
            'password' => bcrypt('123456'),
            // 'activo' => true,
            'role_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('users')->insert([
            'name' => 'assiel',
            'ci' => '13221654',
            'phone' => '13213654',
            'email' => 'assiel@gmail.com',
            'password' => bcrypt('123456'),
            // 'activo' => true,
            'role_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('users')->insert([
            'name' => 'ana',
            'ci' => '123321654',
            'phone' => '13216354',
            'email' => 'ana@gmail.com',
            'password' => bcrypt('123456'),
            // 'activo' => true,
            'role_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
