<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Super Admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt('admin@123'),
            "user_type" => 1,
        ]);
    }
}
