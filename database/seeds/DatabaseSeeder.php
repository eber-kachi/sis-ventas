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
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StoreSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(SendSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(StatusOrderSeeder::class);
        $this->call(UserStatusOrderSeeder::class);
        $this->call(RatingStoreSeeder::class);
    }
}
