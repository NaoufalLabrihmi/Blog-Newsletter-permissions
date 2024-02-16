<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = collect([
            'super admin',
            'admin',
            'moderator',
            'guest'
        ]);

        $roles->each(function ($c) {
            Role::create([
                'name' => $c,
                'guard_name' => 'web',
            ]);
        });
    }
}
