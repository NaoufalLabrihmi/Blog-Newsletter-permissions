<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = collect([
            [
                'name' => 'Admin',
                'username' => 'admin',
                'password' => bcrypt('visiarch2020'),
                'email' => 'admin@visiarch.com',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Moderator',
                'username' => 'moderator',
                'password' => bcrypt('visiarch2020'),
                'email' => 'moderator@visiarch.com',
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Guest',
                'username' => 'guest',
                'password' => bcrypt('visiarch2020'),
                'email' => 'guest@visiarch.com',
                'email_verified_at' => now(),
            ]
        ]);

        $users->each(function ($c) {
            User::create($c);
        });
    }
}
